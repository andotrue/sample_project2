<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),// hello/ando
	
	/*
	//正規表現によるルーティング
	'bbs/(:any)' => 'book/routingtest/entry$1',// bbs/abc, bbs/about
	'(:segment)/about' => 'book/routingtest/about/$1',// seles/about
	'([0-9]{3})/detail' => 'book/routingtest/id/$1',// 123/detail
	
	//名前付きパラメータによるルーティング
	'cal/:year/:month/:day/:any' => 'welcome/404',// cal/2014/02/22/abc
	'cal/:year/:month/:day' => 'book/routingtest/cal',// cal/2014/02/22
	'cal/:year/:month' => 'book/routingtest/cal',// cal/2014/02
	'cal/:year' => 'book/routingtest/cal',// cal/2014
	
	// HTTPメソッドによるルーティング
	'api/(:any)' => array(
		array('GET', new Route('book/routingtest/get/$1')),// api/abc にGETメソッドでアクセスした場合
		array('POST', new Route('book/routingtest/post/$1'))// api/abc にPOSTメソッドでアクセスした場合
	),
		
	//名前付きルート
	'dashboard' => array('book/admin/index', 'name' => 'admin'),// dashboard
	'admin/dashboard' => array('book/admin/index', 'name' => 'admin'),// admin/dashboard
	*/
);