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
		<? if($success_msg != ""): ?>
			<div style="text-align:center; color:red; font-size:10px; padding:10px">
			<?= $success_msg ?>
			</div>
		<? endif; ?>
	</div>

