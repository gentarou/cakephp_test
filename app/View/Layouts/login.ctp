<!DOCTYPE HTML>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires-Control" content="-1">
	<title><?php echo $pageTitle; ?></title>
	<?php
			echo '<link rel="shortcut icon" href="/54323e4c96d00.ico">';
			echo $this->Html->css('default.css', null, array('inline' => false));
            echo $this->Html->css('header.css', null, array('inline' => false));
            echo $this->Html->css('jquery-ui-1.8.4.custom.css', null, array('inline' => false));
			echo $this->Html->css('start/jquery.ui.theme.css', null, array('inline' => false));
			echo $this->Html->css('start/jquery.ui.core.css', null, array('inline' => false));
			echo $this->Html->css('start/jquery.ui.datepicker.css', null, array('inline' => false));
			echo $this->Html->css('default.css', null, array('inline' => false));
		echo $this->Html->script("/js/timeline/jquery-2.1.1.min.js", array("inline" => true));
		if (!empty($FolderCss)) {
            $this->Html->css($FolderCss, null, array('inline' => false));
		}
        echo $this->Html->css('/css/validationEngine.jquery.css', null, array('inline' => false));
        echo $this->Html->css('/css/validationEngine_comp.css', null, array('inline' => false));
        echo $this->Html->css('modernizr_component.css', null, array('inline' => false));
        echo $this->Html->css('modernizr_default.css', null, array('inline' => false));
        echo $this->Html->css('jquery.mCustomScrollbar.css', null, array('inline' => false));
		echo $this->fetch('css');
		echo $this->Html->script('jquery.dropdown.js', array('inline' => false));
		echo $this->Html->script('jquery.sticky.js', array('inline' => false));
		echo $this->Html->script('jquery.ui.core.min.js', array('inline' => false));
		echo $this->Html->script('jquery.ui.datepicker.min.js', array('inline' => false));
		echo $this->Html->script('jquery.ui.datepicker-ja.min.js', array('inline' => false));
		echo $this->Html->script('footer.js', array('inline' => false));
		echo $this->Html->script('halfSizeFont.js', array('inline' => false));
		echo $this->Html->script('flowtype.js', array('inline' => false));
        echo $this->Html->script("/js/jquery.validationEngine.js", array("inline" => false));
        echo $this->Html->script("/js/jquery.validationEngine-ja.js", array("inline" => false));
        echo $this->Html->script('modernizr.custom.js', array('inline' => false));
		echo $this->fetch('css-append');
		echo $this->fetch('script');
	?>
    <script type="text/javascript" src="/js/loading.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/loading.css">
	<script src="/js/scrolltopcontrol.js"></script>
	<!-- ページトップ -->
	<script src="/js/selectivizr-min.js"></script>
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- ドロップダウンメニュー -->
	<script type="text/javascript">
	$(document).ready(function() {
		$("#MenuList").dropdown({
		textClass : 'arrow',
		textOpenClass : 'open',
		animate : 'direct'
		});
	}); 
	</script>

	<?php if (!isset($nonSticker)) { ?>
	<script>

    $(window).load(function(){
        $("#sticker").sticky({ topSpacing: 0, center:true, className:"hey" });
    });

  $(function() {
   $(window).scroll(function () {
    var s = $(this).scrollTop();
    var m = 200;
    if(s > m) {
     $(".xxx").fadeIn(300);
    } else if(s < m) {
     $(".xxx").fadeOut(300);
    }
   });
  });

$(function(){
    //入力値チェック
    $('form').submit(function(){
        var valFlg = false;
        $(this).find('.valChk').each(function(){
            if($(this).val().indexOf('<') != -1
            || $(this).val().indexOf('>') != -1){
                valFlg = true;
            }
        });
    });
});
function netAlertConfirm(){
	if (confirm('未処理一覧から削除しますか？')) {
		return true;
	}
	return false;
}

$(document).ready(function(){
    var uiW = $('.user-info').outerWidth(true);
    var userW = $('#user').outerWidth(true);
    var userMW = 0;
    var mailW = $('.untreated').outerWidth(true);
    var dateW = $('#hizuke').outerWidth(true);
    var logoW = $('#logo-box').outerWidth(true);
    var resW = $('.btn-newres').outerWidth(true);
    var shopW = $('#header h1').outerWidth(true);
    var shopMW = uiW - (userW + mailW + dateW + logoW + resW + 20);
    var minW = 0;

    $('#header h1').css('max-width', shopMW);
    if($('#header h1').size() == 0){
        $('#user').css('max-width', '90%');
    }
    if(shopW < shopMW){
        userMW = $('#user').outerWidth() + (shopMW - shopW);
        $('#user').css('max-width', userMW);
    }
    if($(window).width() <= 700){
        userMW = uiW - (mailW + logoW);
        $('#user').css('max-width', userMW);
    }else if($(window).width() <= 1200){
        minW = (uiW - (mailW + dateW + logoW + 30)) / 2;
        $('#user').css('max-width', minW);
        $('#header h1').css('max-width', minW);
    }
});
</script>
<?php } ?>
</head>
<body>
<!--ローディング-->
<div id="loading">
	<div class="spinner loadbar"></div>
</div>
<div id="loading-bg"></div>

<!--ヘッダー-->
<header>
    <div id="header">
        <div class="header-wrap">

            <div class="user-info">
            <!--ロゴ-->
                <div id="logo-box">
                    <p><img src="/img/social_img.png" alt="ソーシャル監視"></p>
                </div>
                <ul style="float:left;color: #FFFFFF;font-size: 20pt;margin:5px 50px 20px -40px">ソーシャル監視</ul>
            <!--新規予約登録-->
            <?php
            if ($isResList) {
				if (isset($_fncs[$USER_ADDRESERVE])) {
                    if ('mobile' === $UserAgent['device']) {
                        echo '<a class="btn-newres" href="/Reserve/spreserve/'.$shopinfo['shopID'].'/'.$shopinfo['shopNo'].'/'.$setY.'/'.$setM.'/'.$setD.'">新規予約登録</a>';
                    } else if ('tablet' === $UserAgent['device']) {
                        echo '<a class="btn-newres" href="/Reserve/rd_pad/0/'.$shopinfo['shopID'].'/'.$shopinfo['shopNo'].'/'.$setY.'/'.$setM.'/'.$setD.'">新規予約登録</a>';
                    } else {
                        echo '<a href="#editBoxWrap" class="fancybox_edit2 noSelect btn-newres" onclick="setReserveId(0)">新規予約登録</a>';
                    }
                }
            }
            ?>
            </div><!--/.user-info-->

        </div><!--/.header-wrap-->
    </div><!--/#header-->
</header>

<!-- ヘッド終了 -->

<div id="content">
	<?php echo $this->fetch('content'); ?>
</div>


<!-- フッター開始 -->
<!--新規予約登録-->
<footer id="ft">
<div id="footer">
	<div class="footer-wrap">
    	<div class="footer-menu">
            <ul>
				<li>
					<a href="https://support.tottokun.com" class="mr08 ml08">サポート</a>
				</li>
				<li>
					<a href="/Privacy" class="mr08 ml08">プライバシーポリシー</a>
				</li>
				<li>
					<a href="/Rule/" class="mr08 ml08">推奨環境</a>
				</li>
            </ul>
        </div>
        <div class="copyright">
            <p>Copyright idearecord. All Rights Reserved</p>
        </div>
	</div> <!-- /footer-wrap -->
</div> <!-- /footer -->
</footer>
<!-- フッター終了 -->
<?php
	echo $this->fetch('endscript');
?>
</body>
</html>
<!-- -->


