<?php //Debug::dump(Input::post('gender')); ?>

<div>
<div style="border-radius: 5px 5px 0px 0px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">
懸賞に応募</div>
</div>

<div style="text-align:center;">
<p style="color:red; font-weight:bold">懸賞に応募される方はこちらからログインしてください</p>

<p style="font-size:12px; margin:0px">※懸賞に応募するには会員登録が必要です。</p>
<p style="font-size:12px; margin:0px">※一度会員登録すれば、次回からはメールアドレスとパスワードを入力するだけで応募ができます。</p>
</div>

<? if($login_error != ""): ?>
	<div style="text-align:center; color:red; font-size:10px; border:solid 1px; border-color:red; padding:10px">
	<?= $login_error ?>
	</div>
<? endif; ?>

	<div id='container'>
		<form method="post" name="form1" id="form1" action="<?= Uri::create("pm/apply/login/",array(),array(),true); ?>" role="form" class='FlowupLabels'>
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='email'>Eメール :</label>
				<input name='email' value='<?=Input::post('email')?>' class='fl_input' type='email' id='email' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='password'>パスワード :</label>
				<input name='password' value='' class='fl_input validate[required]' type='password' id='password' style="width:100%;" />
			</div>

			<p style="margin: 10px;">
				<input class='rf_submit' type='submit' value='ログイン' />
			</p>
		</form>
	</div>

<!-- ヴァリデーションチェック -->
<script type="text/javascript">
$(function(){
	jQuery("#form1").validationEngine();
});
</script>

	