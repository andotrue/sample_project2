<p style="border-radius: 3px 3px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">会員登録</p>
<?php if(isset($html_error)): ?>
<?php echo $html_error; ?>
<?php endif; ?>
	<div id='container'>
		<form method="post" name="form1" id="form1" action="confirm" role="form" class='FlowupLabels'>
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='name'>お名前 <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='name' value='<?=Input::post('name')?>' class='fl_input validate[required]' type='text' id='name' style="width:100%;" />
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='furigana'>フリガナ <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='furigana' value='<?=Input::post('furigana')?>' class='fl_input validate[required]' type='text' id='furigana' style="width:100%;" />
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='birthdate'>生年月日 <span style="font-size:small;color:red">※必須　 例)19760619</span>:</label>
				<input name='birthdate' value='<?=Input::post('birthdate')?>' class='fl_input validate[required],custom[number],minSize[8]' type='text' id='birthdate' style="width:100%;" size=8 maxlength=8 />
			</div>
			
<!-- 
			<div style="margin: 10px 105px 5px;" class="form-group">
				<label for="birthdate">生年月日（必須） 例)19760619</label>
				<input type="text" class="form-control validate[required,custom[number]]" style="width:80%" id="birthdate" placeholder="1976-06-19">
			</div>
 -->
			<div style="margin: 10px 105px 0px;" class="form-group">
				<label for='gender'>性別 <span style="font-size:small;color:red">※必須</span>:</label>
					<label class="radio-inline">
						<input class="validate[required]" type="radio" name="gender" id="inlineRadio1" value="male"> 男
					</label>
					<label class="radio-inline">
					 	<input class="validate[required]" type="radio" name="gender" id="inlineRadio2" value="female"> 女
					</label>
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='age'>年齢 <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='age' class='fl_input validate[required,custom[number]]' type='text' id='age' style="width:100%;" size=2 maxlength=2 placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='zipcode'>郵便番号 <span style="font-size:small;color:red">※必須　 例)1400002</span>:</label>
				<input name='zipcode' class='fl_input validate[required,custom[number],minSize[7]]' type='text' id='zipcode' style="width:100%;" size=7 maxlength=7 placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='address'>住所 <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='address' class='fl_input validate[required]' type='text' id='address' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='biulding'>建物 :</label>
				<input name='biulding' class='fl_input' type='text' id='building' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='tel'>TEL <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='tel' class='fl_input validate[required,custom[number],minSize[10],maxSize[11]]' type='text' id='tel' style="width:100%;" size=11 maxlength=11 placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='email'>Eメール <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='email' class='fl_input validate[required,custom[email]]' type='email' id='email' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='password'>パスワード <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='password' class='fl_input validate[required]' type='password' id='password' style="width:100%;" />
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='passwordrm'>パスワード（確認） <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='passwordrm' class='fl_input validate[required],equals[password]' type='password' id='passwordrm' style="width:100%;" />
			</div>
			
			<p style="margin: 10px;">
				<input class='rf_submit' type='submit' value='Send' />
			</p>
		</form>
	</div>

	<!-- 
	<div class="container">
		<form name="form1" id="form1" action="" role="form">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="" class="form-control validate[required,custom[email]]" style="width:30%;" id="exampleInputEmail1" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control validate[required]" style="width:30%;" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group">
				<input type="password" class="form-control validate[required,equals[exampleInputPassword1]]" style="width:30%;" id="exampleInputPassword2" placeholder="Password confirmation">
			</div>
			<div class="radio">
				<label><input class="validate[required]" type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
				male
				</label>
			</div>
			<div class="radio">
				<label>
				<input class="validate[required]" type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				female
				</label>
			</div>
			<div class="checkbox">
			<label>
			<input type="checkbox" class="validate[required]" id="check" name="check"> Check me out
			</label>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	 -->
	
	<script>
	$(function(){
	jQuery("#form1").validationEngine();
	});
	</script>	
	
	</div>
	
	