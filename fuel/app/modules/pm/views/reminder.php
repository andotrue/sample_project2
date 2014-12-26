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
		<form method="post" name="form1" id="form1" action="<?= Uri::create(MODULE_NAME."/reminder/",array(),array(),true); ?>" role="form" class='FlowupLabels'>
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='email'>登録済みメールアドレス :</label>
				<input name='email' value='<?=Input::post('email')?>' class='fl_input' type='email' id='email' style="width:100%;" placeholder=""/>
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


	