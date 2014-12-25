<? if(Auth::check()){ ?>
	会員情報はこちら<br />
	<?=Html::anchor(Uri::create("pm/logout/",array(),array(),false), "ログアウトはこちら");?><br />
<? }else{ ?>
	<?=Html::anchor(Uri::create("pm/register/",array(),array(),true), "会員登録");?><br />
	<?=Html::anchor(Uri::create("pm/apply/login/",array(),array(),true), "ログイン");?><br />
<? } ?>

<ul class="nav nav-tabs nav-justified">
    <li><?=Html::anchor(Uri::base().Uri::segment(1).'/magazine/', "各紙紹介");?></li>
    <li><a href="#">懸賞応募</a></li>
    <li><a href="#">定期購読</a></li>
</ul>