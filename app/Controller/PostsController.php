<?php
class PostsController extends AppController {
    public $scaffold = 'admin';
    public $uses = array (
        'Post',
        'Course',
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

    public function Mobile_postlist ($id = null){
        $this->layout = 'mobile';
        $this->checkSession('学生');
        $user = $this->User->findById($this->Session->read('user_id'));
        $course = $this->Course->findById($id);
        $posts = $this->Post->findAllByCourseId($id);
        $this->set('course',$course);
        $this->set('posts',$posts);
    }

    public function Mobile_createpost($id = null){
        $this->layout = 'mobile';
        $this->set('course_id',$id);
        if($this->request->is('post')){
            $this->Post->create();
            $post = $this->request->data;
            $post['Post']['user_id'] = $this->Session->read('user_id');
            $post['Post']['course_id'] = $id;
            $this->Post->save($post);
            $this->redirect('/Mobile/Posts/postlist/'.$id);
        }
    }
}
?>