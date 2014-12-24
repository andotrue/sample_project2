<footer>
	<hr>
	<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
	<p>
		<?php echo Html::anchor('http://fuelphp.com/', 'FuelPHP'); ?> is released under the MIT license.<br>
		<small>Version: <?php echo e(Fuel::VERSION); ?></small>
	</p>
	<p>
		<div>
			定数
			<table class="table table-condensed table-bordered" style="font-size:small">
				<tr><td>DOCROOT</td><td></td><td><?php echo DOCROOT; ?></td></tr>
			</table>
			Uriクラス
			<table class="table table-condensed table-bordered" style="font-size:small">
				<tr><td>Uri::base()</td><td>[サイトURL]</td><td><?php echo Uri::base(); ?></td></tr>
				<tr><td>Uri::create("pm/register/",array(),array(),true)</td><td>[URLを生成]</td><td><?php echo Uri::create("pm/register/",array(),array(),true); ?></td></tr>
				<tr><td>Uri::current()</td><td>[現在表示されているページURL]</td><td><?php echo Uri::current(); ?></td></tr>
				<tr><td>Uri::main()</td><td>[現在表示されているページURL]</td><td><?php echo Uri::main(); ?></td></tr>
				<tr><td>Uri::string()</td><td>[現在表示されているページURL(ホストを入れない)]</td><td><?php echo Uri::string(); ?></td></tr>
				<tr><td>Uri::segment(1)</td><td>[指定した位置にあるセグメント]</td><td><?php echo Uri::segment(1); ?></td></tr>
				<tr><td>Uri::update_query_string(array('three' => 3))</td><td>[現在表示されているページURLのパラメーター修正 ]</td><td><?php echo Uri::update_query_string(array('three' => 3)); ?></td></tr>
			</table>
			Requestクラス
			<table class="table table-condensed table-bordered" style="font-size:small">
				<tr><td>Request::main()->controller</td><td>[コントローラー名の取得]</td><td><?php echo Request::main()->controller; ?></td></tr>
				<tr><td>Request::main()->action</td><td>[最初に実行されたアクション]</td><td><?php echo Request::main()->action; ?></td></tr>
				<tr><td>Request::active()->action</td><td>[現在実行中のアクション ]</td><td><?php echo Request::active()->action; ?></td></tr>
			</table>
			Inputクラス
			<table class="table table-condensed table-bordered" style="font-size:small">
				<tr><td>Input::extension()</td><td></td><td><?php echo Input::extension(); ?></td></tr>
			</table>
		</div>
	</p>
		
	
	<hr>
	<center>© Copyright マガジン・マガジン Magazine Magazine Publishing Co.,Ltd.All Rights Reserved. </center>
	
</footer>
