<?php
App::import ( 'vendor', 'getCourses' );
class UsersController extends AppController {
	public $scaffold = 'admin';
	public $uses = array (
			'User',
			'Course',
			'CourseInfo',
			'CourseUserShip' 
	);
	public $helpers = array (
			'Html',
			'Form',
			'Ajax',
			'Javascript' 
	);
	public $components = array (
			'Session',
			'Email',
			'RequestHandler' 
	);


	public function register() {
        if($this->is_mobile()){
            $this->redirect('/Mobile/Users/register');
        }
		if ($this->request->is ( 'post' )) {
			$this->User->create ();
			$this->request->data ['User'] ['password'] = md5 ( $this->request->data ['User'] ['password'] );
			// 保存课程
			if ($this->User->save ( $this->request->data )) {
				$gc = new getCourses ();
				$gc->setStudent ( $this->request->data ['jwcName'], $this->request->data ['jwcPwd'], '学生' );
				$gc->run ();
				$courseArray = $gc->getCourseArray ();
				$newCourses = null;
				foreach ( $courseArray as $oneCourse ) {
					$courses = $this->Course->findAllByNameAndTeacherName ( $oneCourse [0], $oneCourse [7] );
					if (! empty ( $courses )) {
						$newCourseInfo ['day'] = $oneCourse [3];
						$newCourseInfo ['begin_section'] = $oneCourse [4];
						$newCourseInfo ['section_num'] = $oneCourse [5];
						$newCourseInfo ['single'] = $oneCourse [6];
						$newCourseInfo ['begin_week'] = $oneCourse [1];
						$newCourseInfo ['end_week'] = $oneCourse [2];
						if (! empty ( $newCourses )) {
							foreach ( $newCourses as $newCourse ) {
								if ($oneCourse [0] == $newCourse ['name']) {
									$this->CourseInfo->create ();
									$newCourseInfo ['course_id'] = $newCourse ['id'];
									$this->CourseInfo->save ( $newCourseInfo );
									break;
								}
							}
						} else {
							$hasAdd = false;
							foreach ( $courses as $course ) {
								if (! empty ( $this->CourseInfo->findByDayAndBeginSectionAndCourseId ( $newCourseInfo ['day'], $newCourseInfo ['begin_section'], $course ['Course'] ['id'] ) )) {
									$this->CourseUserShip->create ();
									$newCourseUserShip ['user_id'] = $this->User->id;
									$newCourseUserShip ['course_id'] = $course ['Course'] ['id'];
									$newCourseUserShip ['permission'] = 1;
									$this->CourseUserShip->save ( $newCourseUserShip );
									$hasAdd = true;
									break;
								}
							}
							if (! $hasAdd) {
								$newCourses = $this->newCourse ( $newCourses, $oneCourse );
							}
						}
					} else {
						$newCourses = $this->newCourse ( $newCourses, $oneCourse );
					}
				}
				
				$this->redirect ( '/users/login' );
			} else {
				$this->Session->setFlash ( 'Unable to add your post.' );
			}
		}
	}
	public function newCourse($newCourses, $oneCourse) {
		$this->Course->create ();
		$newCourse ['name'] = $oneCourse [0];
		$newCourse ['attibute'] = 1;
		$newCourse ['teacher_name'] = $oneCourse [7];
		$this->Course->save ( $newCourse );
		$newCourse ['id'] = $this->Course->id;
		$newCourses [] = $newCourse;
		// 添加课程信息
		$this->CourseInfo->create ();
		$newCourseInfo ['day'] = $oneCourse [3];
		$newCourseInfo ['begin_section'] = $oneCourse [4];
		$newCourseInfo ['section_num'] = $oneCourse [5];
		$newCourseInfo ['single'] = $oneCourse [6];
		$newCourseInfo ['begin_week'] = $oneCourse [1];
		$newCourseInfo ['end_week'] = $oneCourse [2];
        $newCourseInfo ['room'] = $oneCourse [8];
		$newCourseInfo ['course_id'] = $newCourse ['id'];
		$this->CourseInfo->save ( $newCourseInfo );
		// 用户添加课程
		$this->CourseUserShip->create ();
		$newCourseUserShip ['user_id'] = $this->User->id;
		$newCourseUserShip ['course_id'] = $newCourse ['id'];
		$newCourseUserShip ['permission'] = 1;
		$this->CourseUserShip->save ( $newCourseUserShip );
		return $newCourses;
	}

	public function login() {
        if($this->is_mobile()){
            $this->redirect('/Mobile/Users/login');
        }
		if ($this->request->is ( 'post' )) {
			$results = $this->User->findByEmail ( $this->data ['User'] ['email'] );
			if ($results && $results ['User'] ['password'] == md5 ( $this->data ['User'] ['password'] )) {
				$this->Session->setFlash ( '登录成功 ' );
				$this->Session->write ( 'user', $this->data ['User'] ['name'] );
				$this->redirect ('/users/coursesList');
			} else {
				$this->Session->setFlash ( '登录失败！' );
				$this->set ( 'error', true );
			}
		}
	}

    public function logout() {
        $this->Session->destroy();
        $this->redirect('/Mobile/Users/login');
    }

	public function emailIsOne($email = null) {
		$this->layout = 'ajax';
		if ($email) {
			if ($this->request->is ( 'ajax' )) { // 判断是否是ajax请求
				if (! empty ( $this->User->findByEmail ( $email ) )) {
					$this->response->body ( json_encode ( 'unique' ) );
					return $this->response;
				} else {
					$this->response->body ( json_encode ( 'not unique' ) );
					return $this->response;
				}
			} else {
				$this->redirect ( array (
						'action' => 'register' 
				), null, true );
			}
		} else {
			$this->Session->setFlash ( '重试' );
			$this->redirect ( array (
					'action' => 'register' 
			), null, true );
		}
	}

    public function Mobile_register() {
        $this->layout = 'mobile';
        if ($this->request->is ( 'post' )) {
            $this->User->create ();
            $this->request->data ['User'] ['password'] = md5 ( $this->request->data ['User'] ['password'] );
            // 保存课程
            if ($this->User->save ( $this->request->data )) {
                $gc = new getCourses ();
                $gc->setStudent ( $this->request->data ['jwcName'], $this->request->data ['jwcPwd'], '学生' );
                $gc->run ();
                $courseArray = $gc->getCourseArray ();
                $newCourses = null;
                foreach ( $courseArray as $oneCourse ) {
                    $courses = $this->Course->findAllByNameAndTeacherName ( $oneCourse [0], $oneCourse [7] );
                    if (! empty ( $courses )) {
                        $newCourseInfo ['day'] = $oneCourse [3];
                        $newCourseInfo ['begin_section'] = $oneCourse [4];
                        $newCourseInfo ['section_num'] = $oneCourse [5];
                        $newCourseInfo ['single'] = $oneCourse [6];
                        $newCourseInfo ['begin_week'] = $oneCourse [1];
                        $newCourseInfo ['end_week'] = $oneCourse [2];
                        $newCourseInfo ['room'] = $oneCourse [8];
                        if (! empty ( $newCourses )) {
                            foreach ( $newCourses as $newCourse ) {
                                if ($oneCourse [0] == $newCourse ['name']) {
                                    $this->CourseInfo->create ();
                                    $newCourseInfo ['course_id'] = $newCourse ['id'];
                                    $this->CourseInfo->save ( $newCourseInfo );
                                    break;
                                }
                            }
                        } else {
                            $hasAdd = false;
                            foreach ( $courses as $course ) {
                                if ( empty ( $this->CourseUserShip->findByUserIdAndCourseId ( $this->User->id,$course ['Course'] ['id'] ))){
                                    $this->CourseUserShip->create ();
                                    $newCourseUserShip ['user_id'] = $this->User->id;
                                    $newCourseUserShip ['course_id'] = $course ['Course'] ['id'];
                                    $newCourseUserShip ['permission'] = 1;
                                    $this->CourseUserShip->save ( $newCourseUserShip );
                                    $hasAdd = true;
                                    break;
                                }
                            }
                            if (! $hasAdd) {
                                $newCourses = $this->newCourse ( $newCourses, $oneCourse );
                            }
                        }
                    } else {
                        $newCourses = $this->newCourse ( $newCourses, $oneCourse );
                    }
                }

                $this->redirect ( '/Mobile/users/login' );
            } else {
                $this->Session->setFlash ( 'Unable to add your post.' );
            }
        }
    }

    public function Mobile_login() {
        $this->layout = 'mobile';
        if ($this->request->is ( 'post' )) {
            $results = $this->User->findByEmail ( $this->data ['User'] ['email'] );
            if ($results && $results ['User'] ['password'] == md5 ( $this->data ['User'] ['password'] )) {
                $this->Session->setFlash ( '登录成功 ' );
                $this->Session->write ( 'user_name', $results ['User'] ['name'] );
                $this->Session->write ( 'user_id', $results ['User'] ['id'] );
                $this->Session->write ( 'user_role', '学生' );
                $this->redirect ('/Mobile/Courses/courselist');
            } else {
                $this->Session->setFlash ( '登录失败！' );
                $this->set ( 'error', true );
            }
        }
    }
}
?>