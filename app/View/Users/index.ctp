<div id="wrapper">
        <?php 
            echo $this->Form->create('Users', array(
                'method' => 'post',
                'action' => 'login',
                'inputDefaults' => array(
                    'label' => false,
                ),
            ));
            echo $this->Form->input('login_id', array(
                'label' => 'ログインID',
                'type'  => 'text',
                'value' => '',
            ));
            echo $this->Form->input('password', array(
                'label' => 'パスワード',
                'type'  => 'password',
                'value' => '',
            )); 
            echo $this->Form->submit('ログイン', array(
                'class' => 'button_red_su',
                'type'  => 'submit',
                'value' => '',
            ));
            echo $this->Form->end();
        ?>
    <input type="button" class="button_add" onclick="location.href='/Users/add'" value="新規登録">
    </div>
