<?php //Debug::dump($input); ?>

<div>
<div style="border-radius: 5px 5px 0px 0px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">
会員登録　確認</div>
<p style="border-radius: 0px 0px 5px 5px; background-color: white; text-align:center; font-size:11px; color:black; border:1px solid; margin-bottom:0;">
※一度会員登録すれば、次回からはメールアドレスとパスワードを入力するだけで応募ができます。</p>
</div>

<div id='container'>
	<p style="text-align:center;">下記の内容で登録します。よろしいですか？</p>

	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>お名前:</label>
		<span style="border-bottom: 1px solid #555;"><?=Input::post('name')?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>フリガナ:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['furigana']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>生年月日:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['birthdate']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>年齢:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['age']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>性別:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo ($input['gender'] === "male")? "男" : "女"; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>郵便番号:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['zipcode']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>住所:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['address']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>建物:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['building']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>TEL:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['tel']; ?></span>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>Eメール:</label>
		<span style="border-bottom: 1px solid #555;"><?php echo $input['email']; ?></span>
	</div>
</div>

<?php 
echo Form::open(Uri::create(MODULE_NAME."/register/index/",array(),array(),true));
//CSRF対策
echo Form::csrf();

echo Form::hidden('name', $input['name']);
echo Form::hidden('furigana',$input['furigana']);
echo Form::hidden('birthdate',$input['birthdate']);
echo Form::hidden('gender',$input['gender']);
echo Form::hidden('age',$input['age']);
echo Form::hidden('zipcode',$input['zipcode']);
echo Form::hidden('address',$input['address']);
echo Form::hidden('building',$input['building']);
echo Form::hidden('tel',$input['tel']);
echo Form::hidden('email',$input['email']);
?>
<div class="actions">
	<?php echo Form::submit('submit1','修正', array("class"=>"rf_submit")); ?>
</div>
<?php echo Form::close(); ?>


<?php 
echo Form::open(Uri::create(MODULE_NAME."/register/send/",array(),array(),true));

//CSRF対策
echo Form::csrf();

echo Form::hidden('name', $input['name']);
echo Form::hidden('furigana',$input['furigana']);
echo Form::hidden('birthdate',$input['birthdate']);
echo Form::hidden('gender',$input['gender']);
echo Form::hidden('age',$input['age']);
echo Form::hidden('zipcode',$input['zipcode']);
echo Form::hidden('address',$input['address']);
echo Form::hidden('building',$input['building']);
echo Form::hidden('tel',$input['tel']);
echo Form::hidden('email',$input['email']);
echo Form::hidden('password',$input['password']);
echo Form::hidden('passwordrm',$input['passwordrm']);
?>
<div class="actions">
	<?php echo Form::submit('submit2','送信', array("class"=>"rf_submit")); ?>
</div>
<?php echo Form::close(); ?>