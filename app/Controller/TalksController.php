<?php
App::uses('AppController', 'Controller');

class TalksController extends AppController
{
    public function index () 
    {
        //ログイン中ユーザID
        $userId = $this->Session->read('userInfo.user_id');
        
        //フレンドユーザID
        if (isset($this->params['url']['friend_id'])) {
            $friendId = $this->params['url']['friend_id'];
            $this->Session->write('talkInfo', $friendId);
        } else {
            $friendId = $this->Session->read('talkInfo');
        }
        //トークルームID
        $roomId = $userId + $friendId;
        //$messageTime = $this->Talk->getTalkTime($userId);
        //メッセージ取得
        $userMessage = $this->Talk->getTalkAll(/*$userId, */$roomId);
        //$friendMessage = $this->Talk->getTalkAll($friendId,$roomId);
        foreach ($userMessage as $key => $data)
        {
            $MessageTime = $data['Talk']['created']
        }
        debugger::dump($MessageTime);
        $this->set(compact('userMessage', 'friendMessage', 'roomId'));
    }
    public function save() 
    {
        try {
            $data = $this->request->data;
            if (!empty($data['message'])) {
                $data = $data + array(
                    'user_id' => $this->Session->read('userInfo.user_id')
                ) + array(
                    'room_id' => $data['friend_id']
                );
                $this->Talk->save($data);
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
    
    protected function _getFriendModel()
	{
		$this->loadModel('Friend');
		if (!$this->_friendModel instanceof Friend) {
			$this->_friendModel = new Friend();
		}
		return $this->_friendModel;
	}
}



?>