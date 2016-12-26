<!-- コンテンツ開始 -->
<div id="wrapper">
	<div id="contentsArea">
		<form>
			<div class="contentsBox">
				<div id="progressBar">
				</div>
				<h2 class="title01">ユーザー削除</h2>
				<p>以下ユーザーを削除します。良ければ削除ボタンを押してください。</p>
				<div id="formBox">
<?php 
                foreach ($userInfo as $uData) {
?>
					<dl class="cf">
						<dt>ユーザー名</dt>
						<dd><?php echo $uData['name'];?></dd>
					</dl>
					<dl class="cf">
						<dt>フリガナ</dt>
						<dd><?php echo $uData['ponetic'];?></dd>
					</dl>
					<dl class="cf">
						<dt>ログインID</dt>
						<dd><?php echo $uData['login_id'];?></dd>
					</dl>
					<dl class="cf">
						<dt>電話番号</dt>
						<dd><?php echo $uData['tel'];?></dd>
					</dl>
					<dl class="cf">
						<dt>メールアドレス</dt>
						<dd><?php echo $uData['mail'];?></dd>
					</dl>
<?php               
                }
?>
				</div>

					<ul class="cf">
<?php
                    echo '<button type="button" class="button_red_su" value="delete" onclick="location.href=\'/Users/delete_complete/'.$userInfo['User']['user_id'].'\'">削除</button>';
                    echo '<button type="button" class="button_red_su" value="back" onClick="history.go(-1);">戻る</button>';
?>
					</ul>
			</div> <!-- /contentsBox -->
		</form>
	</div> <!-- /contentsArea -->
</div> <!-- /wrapper -->
<!-- コンテンツ終了 -->

