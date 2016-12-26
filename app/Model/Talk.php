<?php
App::uses('AppModel', 'Model');

class Talk extends AppModel
{
    public function getTalkAll (/*$userId, */$roomId)
    {
        $attr = array(
			'conditions' => array(
                //'user_id' => $userId,
                'room_id' => $roomId,
            ));
		return $this->find('all', $attr);
    }
    
    
}


?>