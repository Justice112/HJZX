<?php
class RepliesController extends AppController {
    public $scaffold = 'admin';
    public $uses = array (
        'Reply',
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

    public function Mobile_replylist ($id = null){
        $this->layout = 'mobile';
        $this->checkSession('学生');
        $user = $this->User->findById($this->Session->read('user_id'));
        $post = $this->Post->findById($id);
        $replies = $this->Reply->findAllByPostId($id);
        $this->set('post',$post);
        $this->set('replies',$replies);
    }


    public function Mobile_createreply($id = null){
        $this->layout = 'mobile';
        $this->set('post_id',$id);
        $post = $this->Post->findById($id);
        if($this->request->is('post')){
            $floor = $this->Reply->find('first',array(
                'conditions'=>array('Reply.post_id'=>$id),
                'fields'=>array('floor'),
                'order'=>array('floor'=>'desc')
            )) ;
            $this->Reply->create();
            $reply = $this->request->data;
            $reply['Reply']['user_id'] = $this->Session->read('user_id');
            $reply['Reply']['post_id'] = $id;
            if(!empty($floor)){
                $reply['Reply']['floor'] =
                    $floor['Reply']['floor'] + 1;
            }
            else{
                $reply['Reply']['floor'] = 1;
            }
            $this->Reply->save($reply);
            $this->redirect('/Mobile/Replies/replylist/'.$post['Post']['id']);
        }
    }
}
?>