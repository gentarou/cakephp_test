<!-- コンテンツ開始 -->
<h1>ユーザー登録</h1>
<p><font size=4px>ユーザー情報入力<font color="red"> (※赤文字は必須事項です)</font></font></p>
    <body>
    <?php
        if (empty($errmsg)) {
            echo $this->Form->create(false, array(
                'action' => 'add_confirm'
            ));
            echo $this->Form->input('user_name', array(
                'type'        => 'text', 
                'label'       => array(
                    'text'  => 'ユーザーネーム(※必須)',
                    'style' => 'color:red',
                ),
                'placeholder' => '',
                'required'    =>  true,
            ));
            echo $this->Form->input('login_id', array(
                'type'        => 'text',     
                'label'       => array(
                    'text'  => 'メールアドレス(※必須)',
                    'style' => 'color:red',
                ),
                'pattern'     => "^[a-zA-Z0-9!$&*.=^`|~#%'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$",
                'placeholder' => 'ログインに使用するメールアドレス',
                'required'    => true,
            ));
            echo $this->Form->input('password', array(
                'type'        => 'password',
                'placeholder' => '半角英数字で8文字以上', 
                'label'       => array(
                    'text'  => 'パスワード(※必須)',
                    'style' => 'color:red',
                ),
                'required'    =>  true,
            ));
            echo $this->Form->input('chk_pass', array(
                'type'        => 'password',
                'placeholder' => '半角英数字で8文字以上',
                'label'       => array(
                    'text'  => '確認用(※再度入力をお願いします)',
                    'style' => 'color:red',
                ),
                'required'    =>  true,
            ));
            echo $this->Form->input('birthday',array(
                'type'  => 'text',
                'label' => array(
                    'text' => '生年月日',
                    'style' => 'color:red',
                ),
                'pattern' => '\d{4}/\d{2}/\d[2}',
                'placeholder' => '生年月日は「XXXX/YY/ZZ」のように入力して下さい',
                'required'    =>  true,
            ));
            echo $this->Form->input('tel',array(
                'type'        => 'text', 
                'label'       => '電話番号', 
                'pattern'     => '\d{2,4}-\d{3,4}-\d{3,4}', 
                'placeholder' => '電話番号は、「123-456-789」のように入力して下さい',
                'style'       => 'width:320px', 
            ));
            echo $this->Form->hidden('add',array(
                'value' => 'add',
            ));
            echo $this->Form->submit('次へ', array(
                'class' => 'button_red_su',
            ));
            echo $this->Form->end();
        } else {
            echo '<h2 class="errmsg">'.$errmsg.'</h2>';
        }
    ?>
        <input type="button" class="button_red_su" value="戻る" onClick="history.go(-1);">
        <input type="button" class="button_red_su" onclick="location.href='/Users/index'" value="ユーザー一覧へ">
    </body>
