<footer>
	<hr>
	<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
	<p>
		<?php echo Html::anchor('http://fuelphp.com/', 'FuelPHP'); ?> is released under the MIT license.<br>
		<small>Version: <?php echo e(Fuel::VERSION); ?></small>
	</p>
	<p>
		<small>
			Uriクラス
			<ul>
				<li><?php echo Uri::base(); ?></li>
				<li><?php echo Uri::current(); ?></li>
				<li><?php echo Uri::main(); ?></li>
				<li><?php echo Uri::string(); ?></li>
			</ul>
			Requestクラス
			<ul>
				<li><?php echo Request::main()->controller; ?></li>
				<li><?php echo Request::main()->action; ?></li>
				<li><?php echo Request::active()->action; ?></li>
			</ul>
			Inputクラス
			<ul>
				<li><?php echo Input::extension(); ?></li>
			</ul>

					</small>
	</p>
		
	
	<hr>
	<center>© Copyright マガジン・マガジン Magazine Magazine Publishing Co.,Ltd.All Rights Reserved. </center>
	
</footer>
