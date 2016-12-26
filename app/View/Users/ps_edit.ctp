<!-- コンテンツ開始 -->
<h1>パスワード変更</h1>
<p>パスワード情報編集</p>
<body>
    <?php 

    if (empty($errmsg)) {
        if (isset($key)) {
            echo '名前'.'　　'.$key['User']['name'];    
        }
        echo $this->Form->create(false, array(
            'method' => 'post',
            'action' => "ps_edit/$userId",
        ));
        echo $this->Form->input('password',array(
            'type'=>'password', 
            'label'=>'更新するパスワード',
            'pattern'    =>"^[a-zA-Z0-9]+$", 
            'placeholder'=>'半角英数字8文字以上',
            'required'   => true,
        ));
        echo $this->Form->input('chk_pass',array(
            'type'=>'password', 
            'label'=>'更新するパスワード(確認入力)',
            'pattern'    =>"^[a-zA-Z0-9]+$", 
            'placeholder'=>'半角英数字8文字以上',
            'required'   => true,
        ));
    ?>
    <ul class="cf">
    <?php 
        echo $this->Form->submit('登録', array(
            'type'  => 'submit',
            'value'=>$userId,
            'class'  => 'button_red_su',
        ));
        echo $this->Form->end();
    } else {
        echo '<h2 class="errmsg">'.$errmsg.'</h2>';
    }
    ?>
    </ul>
    <input type="button" class="button_red_su" value="戻る" onClick="history.go(-1);">
</body>
