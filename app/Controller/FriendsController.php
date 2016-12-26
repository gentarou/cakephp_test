<?php
App::uses('AppController', 'Controller');

class FriendsController extends AppController
{
    public function index ()
    {
        $friendId = $this->Friend->getFriendId($this->Session->read('userInfo.user_id'));
        debugger::dump($this->Session->read('userInfo'));
        debugger::dump($friendId);
        $this->set(compact('friendId'));
    }
    
    public function save() 
    {
        try {
            $data = $this->request->data;
            if (!empty($data['user_id'])) {
                
                $this->Friend->save($data);
            } else {
                unset($data['message']);
            }
            $this->redirect(array(
                'controller' => $this->name,
                'action'     => 'index',
            ));
        } catch (Exception $e) {
            $this->_sendError($e);
        }
    }
    
}