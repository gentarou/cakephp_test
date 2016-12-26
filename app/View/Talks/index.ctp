<?php
    echo $this->Html->meta(array(
        'content' => 
            'width=device-width',
            'initial-scale=1',
            'minimum-scale=1',
            'maximum-scale=1',
            'user-scalable=no'
    ));
?>

<?php
    if (isset($userMessage)){
        foreach ($userMessage as $Key=> $data) {
            $i = 0;
            $i++;
            debugger::dump($userMessage[$i]['Talk']['created']);
            debugger::dump($userMessage);
            if (min($userMessage[$i]['Talk']['created']))
            echo $data['Talk']['message'];
            echo '<br>';
        }
    }
?>
<br>
<?php
    if (isset($friendMessage)){
        foreach ($friendMessage as $Key=> $data) {
            echo $data['Talk']['message'];
            echo '<br>';
        }
    }
?>

<?php
    echo $this->Form->create(false, array(
        'type'   => 'post',
        'action' => 'save',
    ));
    echo $this->Form->input('message', array(
        'type' => 'text',
        'div' => false,
        'label' => false,
    ));
    echo $this->Form->hidden('friend_id', array(
        'value' => $roomId,
    ));
    echo $this->Form->button('PUT', array());
    echo $this->Form->end();
?>