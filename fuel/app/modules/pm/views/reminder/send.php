<?php //Debug::dump(Input::post('gender')); ?>

<div>
<div style="border-radius: 5px 5px 0px 0px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">
パスワードをお忘れの方</div>
</div>

<div style="text-align:center;">
<p style="color:red; font-weight:bold">パスワードをお忘れの方はこちらから再登録をお願い致します。</p>
</div>

<? if($error_msg != ""): ?>
	<div style="text-align:center; color:red; font-size:10px; border:solid 1px; border-color:red; padding:10px">
	<?= $error_msg ?>
	</div>
<? endif; ?>

	<div id='container'>
		<form method="post" name="form1" id="form1" action="<?= Uri::create(MODULE_NAME."/reminder/regist",array(),array(),true); ?>" role="form" class='FlowupLabels'>
			<input name='key' value='<?=Input::get('key')?>' type='hidden'>
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='password'>新しいパスワード :</label>
				<input name='password' value='' class='fl_input validate[required]' type='password' id='password' style="width:100%;"　/>
			</div>
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='passwordrm'>確認:</label>
				<input name='passwordrm' value='' class='fl_input validate[required],equals[password]' type='password' id='passwordrm' style="width:100%;" />
			</div>
			
			<p style="margin: 10px;">
				<input class='rf_submit' type='submit' value='送信' />
			</p>
		</form>

		<? if($success_msg != ""): ?>
			<div style="text-align:center; color:red; font-size:10px; padding:10px">
			<?= $success_msg ?>
			</div>
		<? endif; ?>
	</div>

<!-- ヴァリデーションチェック -->
<script type="text/javascript">
$(function(){
	jQuery("#form1").validationEngine();
});
</script>
	

	