<p style="border-radius: 3px 3px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">会員登録　確認</p>
<?php Debug::dump($input); ?>

<div id='container'>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>お名前:</label>
		<?=Input::post('name')?>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>フリガナ:</label>
		<?php echo $input['furigana']; ?>
	</div>
	<div style="margin: 0px 100px;" class='fl_wrap'>
		<label class='fl_label'>生年月日:</label>
		<?php echo $input['birthdate']; ?>
	</div>
</div>

<?php 
echo Form::open(Uri::segment(1).'/register/index/');
echo Form::hidden('name', $input['name']);
echo Form::hidden('furigana',$input['furigana']);
echo Form::hidden('birthdate',$input['birthdate']);
?>
<div class="actions"></div>
	<?php echo Form::submit('submit1','修正'); ?>
</div>
<?php echo Form::close(); ?>

<?php 
echo Form::open(Uri::segment(1).'/register/send/');

//CSRF対策
echo Form::csrf();

echo Form::hidden('name',$input['name'],array('id'=>'name'));
echo Form::hidden('furigana',$input['furigana'],array('id'=>'furigana'));
echo Form::hidden('birthdate',$input['birthdate'],array('id'=>'birthdate'));
?>
<div class="actions">
	<?php echo Form::submit('submit2','送信'); ?>
</div>
<?php echo Form::close(); ?>