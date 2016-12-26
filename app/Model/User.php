<?php
App::uses('AppModel', 'Model');

class User extends AppModel
{
    public function logins($id, $pass)
	{
		$row = $this->find('first', array(
            'conditions' => array(
                'login_id' => $id,
                'password'  => $pass,
            ),
		));        
            return $row[$this->name];
	}
    
    public function getUserTable(){
		$attr = array(
            'conditions' => array(
                'del' => false,
            ),
			'order' => array(
                'user_id',
			),
		);
		return $this->find('first', $attr);
    }
}

?>