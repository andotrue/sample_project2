<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
<title><?=$title?></title>
<?php echo Asset::css($css)?>
<?php echo Asset::js($js)?>
<body>
	<div data-role="page" id="page1" data-theme="c">
		 <div data-role="header" data-theme="c">
			 <h1><?=$site_name?></h1>
		 </div>
		 
		<form action="" method="post">
			 <div data-role="content">
				 <fieldset data-role="">
					 <label for="name">名前</label>
					 <input type="text" name="name" id="name" value="">

					 <label for="kana">読み（カタカナ）</label>
					 <input type="text" name="kana" id="kana" value="">

					 <label for="email">メールアドレス</label>
					 <input type="text" name="email" id="email" value="">

					 <label for="password">パスワード</label>
					 <input type="password" name="password" id="password" value="">

					 <label for="repassword">パスワードの再入力</label>
					 <input type="password" name="repassword" id="repassword" value="">
				 </fieldset>
				 
				 <fieldset data-role="controlgroup" data-type="horizontal" data-theme="c">
					 <legend>性別</legend>
					 <span class="chkradio" id="gender">
					 <input type="radio" name="gender" id="gender-male" value="男性">
					 <label for="gender-male">男性</label>
					 <input type="radio" name="gender" id="gender-female" value="女性">
					 <label for="gender-female">女性</label>
					 </span>
				 </fieldset>
				 <input type="submit" value="登録" data-theme="c">
			 </div>
		</form>
		
		 <div data-role="footer">
			 <h4><?=$footer?></h4>
		 </div>
	</div>

	<script type="text/javascript">
	 var validation = $("form")
	 .exValidation({
	 rules: {
	 name: "chkrequired",
	 kana: "chkrequired chkkatakana",
	 email: "chkrequired chkemail chkhankaku",
	 password: "chkrequired chkmin6 chkmax16",
	 repassword: "chkrequired chkretype-password",
	 },
	 errInsertPos: 'before',
	 errPosition: 'fixed'
	 });
	 var selectable = $('#pref').selectable({
	 callback: function() {
	 validation.laterCall('#pref');
	 }
	 });
	</script>
</body>
</html>