<div>
<?php
    /*echo $this->Form->create(false, array(
        'method' => 'post',
        'action' => 'save',
        'inputDefaults' => array(
            'label' => false,
        ),
    ));
    echo $this->Form->input('user_id', array(
        'label' => 'ログインID',
        'type'  => 'text',
        'value' => '',
    ));
    echo $this->Form->input('friend_id', array(
        'label' => 'パスワード',
        'type'  => 'text',
        'value' => '',
    )); 
    echo $this->Form->input('friend_name', array(
        'label' => 'パスワード',
        'type'  => 'text',
        'value' => '',
    )); 
    echo $this->Form->submit('ログイン', array(
        'class' => 'button_red_su',
        'type'  => 'submit',
        'value' => '',
    ));
    echo $this->Form->end();*/
    if (isset($friendId)){
        foreach ($friendId as $Key=> $data) {
            echo $this->Html->link($data['Friend']['friend_name'],array(
                    'controller' => 'Talks',
                    'action' => '',
                    '?' => array(
                        'friend_id' => $data['Friend']['friend_id']
                    ),
                ));
            echo '<br>';
        }
    }
?>
</div>