<p style="border-radius: 3px 3px; background-color: #00AEEF; text-align:center; color:white; border:1px solid">会員登録</p>

	<div id='container'>
		<!form id='formBody' class='FlowupLabels'>
		<form name="form1" id="form1" action="" role="form" class='FlowupLabels'>
			<div class='fl_wrap'>
				<label class='fl_label' for='rf_name'>Name:</label>
				<input class='fl_input validate[required]' type='text' id='rf_name' />
			</div>

			<div class='fl_wrap'>
				<label class='fl_label' for='rf_email'>Email:</label>
				<input class='fl_input validate[required,custom[email]]' type='' style="width:80%;" id='rf_email'  placeholder=""/>
			</div>
			
			<div class='fl_wrap'>
				<label class='fl_label' for='rf_company'>Company:</label>
				<input class='fl_input validate[required]' type='text' id='rf_company' />
			</div>

			<div class='fl_wrap'>
				<label class='fl_label' for='rf_phone'>Phone:</label>
				<input class='fl_input validate[required]' type='tel' id='rf_phone' />
			</div>
			
			<p>
				<input class='rf_submit' type='submit' value='Send' />
			</p>
		</form>
	</div>

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
		<br><br>
	</div>
	
	<script>
	$(function(){
	jQuery("#form1").validationEngine();
	});
	</script>	
	
	</div>
	
	