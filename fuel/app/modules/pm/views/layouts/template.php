<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css($css); ?>
	<?php echo Asset::js($js)?>	
</head>
<body>

<div class="container">
	<?/****ヘッダー****/ ?>
	<?php echo $header; ?>

	
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
		<?/****サブヘッダー****/ ?>
		<div class="col-sm-12" style="background:#FFFF00; border:1px solid">
			<?php echo $subheader; ?>
		</div>

		<?/****メニュー****/ ?>
		<div class="col-sm-3" style="background-color: #FFFF00; border:1px solid">
			<?php echo $menu; ?>
		</div>
		
		<?/****メインコンテンツ & メニューフッター****/ ?>
		<div class="col-sm-9" style="background-color: #FFFF00; border:1px solid">
			<div class="row">
				<div class="col-sm-12" style="background-color: #FFFF00; border:1px solid">
				<?php echo $content; ?>
				</div>
				<div class="col-sm-12" style="background-color: white; border:1px solid">
				<?php echo $menufooter; ?>
				</div>
			</div>
		</div>
		
		
	</div>
	</section>

	

	<?/****フッター****/ ?>
	<?php echo $footer; ?>
		
</div>

<?php echo Asset::js($js2)?>	

</body>
</html>
