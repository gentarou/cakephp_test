<?php
App::uses('AppModel', 'Model');

class Friend extends AppModel
{
    public function getFriendId($id)
    {
        $attr = array(
            'conditions' => array(
                'user_id' => $id,
        ));
        return $this->find('all', $attr);
    }
}
?>