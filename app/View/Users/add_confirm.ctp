<!-- コンテンツ開始 -->
<div id="wrapper">
	<div id="contentsArea">
		<div class="contentsBox">
			<h2 class="title01">登録確認</h2>
				<p>以下の内容で登録します。よろしければ下記、登録ボタンを押してください。</p>
				<div id="formBox">
					<dl class="cf">
						<dt>ユーザーネーム</dt>
						<dd><?php echo $data['user_name'];?></dd>
					</dl>
					<dl class="cf">
						<dt>メールアドレス</dt>
						<dd><?php echo $data['login_id'];?></dd>
					</dl>
                    <dl class="cf">
						<dt>生年月日</dt>
						<dd><?php echo $data['birthday'];?></dd>
					</dl>
					<dl class="cf">
						<dt>電話番号</dt>
						<dd><?php echo $data['tel'];?></dd>
					</dl>
				</div>
				<ul class="cf">
<?php
                echo $this->Form->create(false, array(
                    'action' => '/save/',
                ));
                foreach ($data as $key => $value) {
                    echo $this->Form->hidden("$key", array(
                        'value' =>"$value", 
                    ));
                }
                echo $this->Form->button('登録', array(
                    'type'=>'submit',
                    'class'=>'button_red_su',
                ));
                echo $this->Form->end();
                echo '<button type="button" class="button_red_su" value="back" onClick="history.go(-1);">戻る</button>';
?>
				</ul>
		</div> <!-- /contentsBox -->
	</div> <!-- /contentsArea -->
</div> <!-- /wrapper -->
<!-- コンテンツ終了 -->

