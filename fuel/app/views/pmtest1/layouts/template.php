<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>

<div class="container">
	<?/****ヘッダー****/ ?>
	<?php echo $header; ?>

	<?/****サブヘッダー****/ ?>
	<?php echo $subheader; ?>
	
	<div class="col-md-12">
<?php if (Session::get_flash('success')): ?>
		<div class="alert alert-success">
			<strong>Success</strong>
			<p><?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?></p>
		</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
		<div class="alert alert-danger">
			<strong>Error</strong>
			<p><?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?></p>
		</div>
<?php endif; ?>
	</div>

	<section>
	<div class="row">
		<div class="col-sm-2" style="background-color: blue;">
			<?/****メニュー****/ ?>
			<?php echo $menu; ?>
		</div>
		<div class="col-sm-10" style="background-color: red;">
			<?/****メインコンテンツ****/ ?>
			<?php echo $content; ?>
		</div>
	</div>
	</section>

	

	<?/****フッター****/ ?>
	<?php echo $footer; ?>
		
</div>
</body>
</html>
