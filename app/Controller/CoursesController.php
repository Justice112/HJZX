<?php
class CoursesController extends AppController {
    public $uses = array (
        'Course',
        'CourseInfo',
        'CourseUserShip',
        'User'
    );
    public $helpers = array (
        'Html',
        'Form',
        'Ajax',
        'Javascript' ,
        'Time'
    );
    public $components = array (
        'Session',
        'Email',
        'RequestHandler'
    );

    public function Mobile_courselist(){
        $this->layout = 'mobile';
        $this->checkSession('学生');
        $user = $this->User->findById($this->Session->read('user_id'));
        $courseinfos = null;
        foreach($user['CourseUserShip'] as $course_user_ship){
            foreach($this->CourseInfo->findAllByCourseId($course_user_ship['course_id']) as $course_info ){
                $courseinfos[] = $course_info;
            }
        }
        $this->set('courseinfos',$courseinfos);
    }

}
?>