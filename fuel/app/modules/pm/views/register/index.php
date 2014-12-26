<?php //Debug::dump(Input::post('gender')); ?>

<div>
<div style="border-radius: 5px 5px 0px 0px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">
会員登録</div>
<p style="border-radius: 0px 0px 5px 5px; background-color: white; text-align:center; font-size:11px; color:black; border:1px solid; margin-bottom:0;">
※一度会員登録すれば、次回からはメールアドレスとパスワードを入力するだけで応募ができます。</p>
</div>

<?php if(isset($html_error)): ?>
<?php echo $html_error; ?>
<?php endif; ?>
	<div id='container'>
		<form method="post" name="form1" id="form1" action="<?= Uri::create(MODULE_NAME."/register/confirm/",array(),array(),true); ?>" role="form" class='FlowupLabels'>
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
				<input name='birthdate' value='<?=Input::post('birthdate')?>' class='fl_input validate[required],custom[number],minSize[8] birthdate' type='text' id='birthdate' style="width:100%;" size=8 maxlength=8 />
			</div>
<!-- 
			<div style="margin: 10px 105px 5px;" class="form-group">
				<label for="birthdate">生年月日（必須） 例)19760619</label>
				<input type="text" class="form-control validate[required,custom[number]]" style="width:80%" id="birthdate" placeholder="1976-06-19">
			</div>
 -->
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='age'>年齢 <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='age' value='<?=Input::post('age')?>' class='fl_input validate[required,custom[number]]' type='text' id='age' style="width:100%;" size=2 maxlength=2 placeholder=""/>
			</div>
			
			<div style="margin: 10px 105px 0px;" class="form-group">
				<label for='gender'>性別 <span style="font-size:small;color:red">※必須</span>:</label>
					<label class="radio-inline">
						<input name="gender" class="validate[required]" type="radio" id="inlineRadio1" value="male"   <?= (Input::post('gender') === "male")? "checked" : ""; ?>> 男
					</label>
					<label class="radio-inline">
					 	<input name="gender" class="validate[required]" type="radio" id="inlineRadio2" value="female" <?= (Input::post('gender') === "female")? "checked" : ""; ?>> 女
					</label>
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='zipcode'>郵便番号 <span style="font-size:small;color:red">※必須　 例)1400002</span>:</label>
				<input name="zipcode" value='<?=Input::post('zipcode')?>' class='fl_input validate[required,custom[number],minSize[7]]' type='text' id='zipcode' style="width:100%;" size=7 maxlength=7 onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
				</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='address'>住所 <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='address' value='<?=Input::post('address')?>' class='fl_input validate[required]' type='text' id='address' style="width:100%;">
				</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='biulding'>建物 :</label>
				<input name='building' value='<?=Input::post('building')?>' class='fl_input' type='text' id='building' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='tel'>TEL <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='tel' value='<?=Input::post('tel')?>' class='fl_input validate[required,custom[number],minSize[10],maxSize[11]]' type='text' id='tel' style="width:100%;" size=11 maxlength=11 placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='email'>Eメール <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='email' value='<?=Input::post('email')?>' class='fl_input validate[required,custom[email]]' type='email' id='email' style="width:100%;" placeholder=""/>
			</div>
			
			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='password'>パスワード <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='password' value='' class='fl_input validate[required]' type='password' id='password' style="width:100%;" />
			</div>

			<div style="margin: 0px 100px;" class='fl_wrap'>
				<label class='fl_label' for='passwordrm'>パスワード（確認） <span style="font-size:small;color:red">※必須</span>:</label>
				<input name='passwordrm' value='' class='fl_input validate[required],equals[password]' type='password' id='passwordrm' style="width:100%;" />
			</div>
			
			<p style="margin: 10px;">
				<input class='rf_submit' type='submit' value='送信' />
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

<!-- ヴァリデーションチェック -->
<script type="text/javascript">
$(function(){
	jQuery("#form1").validationEngine();
});
</script>

<!-- 生年月日から年齢を取得 -->
<script type="text/javascript">
$(function(){

    $("input").change( function() {
        var cls = $(this).attr("class");

        if ( cls.match(/birthdate/)  ) {
            birthday_ymd = $('#birthdate').val();
            retBirth = birthday_ymd;
            y = parseInt(birthday_ymd.substr(0,4), 10);
            m = parseInt(birthday_ymd.substr(4,2), 10);
            d = parseInt(birthday_ymd.substr(6,2), 10);
        }

        myNow = new Date();    // 現在
        myBirth = new Date( 1970, 0, d );    // 基準日
        myBirth.setTime( myNow.getTime() - myBirth.getTime() );

        // 求めた年月日から基準日を引く
        myYear  = myBirth.getUTCFullYear() - y;
        myMonth = myBirth.getUTCMonth() - ( m - 1 );

        // 月がマイナスなので年から繰り下げ
        if( myMonth < 0 ){
            myYear --;
            myMonth += 12;
        }

        myDate = myBirth.getUTCDate();

        if( cls.match(/birthdate/) ){
            //$('#nowAge').text( myYear+"才 "+myMonth+"ヶ月 "+myDate+"日目" );
            $('#age').val( myYear );
		}
    });
});
</script>
	