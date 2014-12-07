<!doctype html>
<html lang="jp">
<head>
	<meta charset="UTF-8" />
	<title><?= $title ?></title>
</head>

<body>
	<h1>お問い合わせ</h1>
	<div id="wrapper">
		<?= $content ?>
		<hr>
		<p class="footer">
			Powered by <?= Html::anchor('http://fuelphp.com/', 'FuelPHP') ?>
		</p>
	</div>
</body>
</html>
