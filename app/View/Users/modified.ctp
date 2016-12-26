<!-- コンテンツ開始 -->
<h1>ユーザー編集</h1>
<p>ユーザー情報編集</p>
<body>
<?php
    if (empty($errmsg)) {
        echo $this->Form->create(false, array(
            'type' => 'post',
            'action' => "add_confirm/$userId",
        ));
        echo $this->Form->input('name', array(
            'type'=>'text', 
            'label'=>'名前',
            'required'   => true,
        ));
        echo $this->Form->input('ponetic', array(
            'type'=>'text', 
            'label'=>'フリガナ'
        ));
        if ($master == true) {
            echo $this->Form->input('login_id', array(
                'type'=>'text', 
                'label'=>'ログインID', 
                'pattern'=>"^[a-zA-Z0-9!$&*.=^`|~#%'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$", 
                'required'   => true,
            ));
        }
        echo $this->Form->input('tel', array(
            'type'=>'text', 
            'label'=>'電話番号', 
            'pattern'=>'\d{2,4}-\d{3,4}-\d{3,4}', 'title'=>"電話番号は、「123-456-789」のように入力して下さい。"
        ));
        echo $this->Form->submit('次へ', array(
            'class'=>'button_red_su',
            'value'=>$userId,
        ));
        echo $this->Form->end();
?>
<?php   
        echo '<button type="button" class="button_gray_user" value="delete" onclick="location.href=\'/Users/ps_edit/'.$userId.'\'">パスワード変更</button>';
	    echo '<button type="button" class="button_gray_user" value="delete" onclick="location.href=\'/Users/index/'.'\'">ユーザー一覧へ</button>';
        if ($master == true) {
	        echo '<button type="button" class="button_delete" value="delete" onclick="location.href=\'/Users/delete_confirm/'.$userId.'\'">ユーザー削除</button>';
	    }
    } else {
        echo '<h2 class="errmsg">'.$errmsg.'</h2>';
    }
?>
</body>
