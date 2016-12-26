<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
    public function index()
    {
    }
    
    public function add() {
    }
        // 登録確認画面
    public function add_confirm($userId = null) {
        $this->layout = 'login';
        $data = $this->request->data;
        //ユーザーIDの有無で登録・編集を判断　
        if (empty($data['password'])) {
            $this->set('errmsg', 'パスワードを入力してください');
            $this->render('/Logins/add');
        } elseif (empty($data['chk_pass'])) {
            $this->set('errmsg', '確認用パスワードを入力してください');
            $this->render('/Logins/add');
        } elseif (mb_strlen($data['password']) <= 7) {
            $this->set('errmsg', 'パスワードは8文字以上で入力してください');
            $this->render('/Logins/add');
        } elseif ($data['password'] !== $data['chk_pass']) {
            $this->set('errmsg', '入力されたパスワードが一致しません');
            $this->render('/Logins/add');
        }
        $this->set('data', $data);
        $this->Session->delete('data.User.chk_pass');
    }
        // 登録完了画面
    public function add_complete() {
        $this->Session->delete('data');
    }
    
    public function login ()
    {
        $this->autoRender = false;
        //POST値取得＆DB接続
		$row = $this->User->logins($this->request->data('Users.login_id'),
               $this->_getCryptModel()->createHash($this->request->data('Users.password'))->getHash());
        //正誤判定
        
		if (!empty($row)) {
        	$this->User->save(array(
                'Users' => array(
                    'user_id'   => $row['user_id'],
            )));
            
			$this->Session->write('userInfo', $row);
            $this->redirect(array(
				'controller' => 'Friends',
				'action'     => 'index',
			));
			exit();
		}
		$this->redirect(array(
			'controller' => 'Users',
			'action'     => 'index',
		));
		exit();
    }
    
    public function logout()
    {
		$this->Session->delete('userInfo');
        $this->Session->destroy();
		$this->redirect(array(
			'controller' => $this->name,
			'action'     => 'logout_complete',
		));
		exit;
    }
    public function logout_complete()
    {
        $this->set('msg', 'ログアウトしました');
    }
    
    public function save($data = null, $userId = null) 
    {
        $data = $this->request->data;
        if (isset($userId)){
            $key  = $this->User->find('first', array(
                'conditions' => array(
                    'User.user_id' => $userId,
                ),
            ));
        }
        if (!empty($data['password'])) {
            if (!isset($data['add'])) {
                //パスワード変更
                $data['password'] = 
                    $this->_getCryptModel()->createHash($data['password'])->getHash();
                $this->User->save(array(
                    'user_id'   => $key['User']['user_id'],
                    'password'   => $data['password'],
                ));
            } else {
                //新規作成
                $data['password'] = 
                    $this->_getCryptModel()->createHash($data['password'])->getHash();
                $data['create_user_id'] = $this->Session->read('userInfo.user_id');
                $this->User()->save($data);            
            }
        } else {
            //ユーザー変更
            $data = array_merge($data, array(
                'user_id' => $key['User']['user_id'],
                'password' => $key['User']['password'],
            ));
            $data['modify_user_id'] = $this->Session->read('userInfo.user_id');
            $this->User->save($data);
        }
        $this->redirect(array(
            'controller' => $this->name,
            'action'     => 'add_complete',
        ));
    }
    
    protected function _getCryptModel()
	{
		$this->loadModel('Crypts');
		if (!$this->_cryptModel instanceof Crypts) {
			$this->_cryptModel = new Crypts();
		}
		return $this->_cryptModel;
	}
}


?>