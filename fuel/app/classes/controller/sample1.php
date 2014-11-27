<?php
 class Controller_Sample1 extends Controller
 {
	 public function action_index()
	 {
		 //静的メソッドの呼び出し
		 $view=View::forge('sample1/index');
	 	//データベース接続
	 	$query = DB::select()->from('dvd')->execute();
	 	//データベース情報の引き渡し
	 	$view->set_global('query',$query->as_array());
	 	//基本データのセット
	 	$view->set_global('title','WinRoad徒然草');
	 	$view->set_global('description','FuelPHPのテストサイトです');
	 	//ビューファイルのネスト
	 	$view->header=View::forge('sample1/header');
	 	$view->content=View::forge('sample1/content');
	 	$view->footer=View::forge('sample1/footer');
	 	return $view;

	 }
	 public function action_dbtest()
	 {
	 	//データベース接続
	 	$query = DB::select()->from('dvd')->execute();
	 	foreach($query as $row):
	 	echo $row['title']."<br>";
	 	endforeach;
	 }
 }