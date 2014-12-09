<?php
 class Controller_Andotest extends Controller_Template
{
	public function action_index() {
		$this->template->title = "Andotest";
		$this->template->set_global('title2', 'Andotest2');//どのビューファイルでも利用できる変数の定義
		$this->template->content = View::forge('andotest/index');
	}
	
	public function action_dbtest(){
		$this->template->set_global('title', 'Andotest');//どのビューファイルでも利用できる変数の定義
		$this->template->set_global('content', 'Andotest');//どのビューファイルでも利用できる変数の定義
		
		/*
		 * データ取得
		 * http://blog.a-way-out.net/blog/2014/07/09/fuelphp-database/
		 *	FuelPHPのモデルとデータベース操作方法の選択
		 */
		//1. DB::query()メソッド（DBクラス）
		//$magazines = DB::query('SELECT * FROM magazines')->execute()->as_array();//結果を連想配列で受け取る
		//$magazines = DB::query('SELECT * FROM magazines')->as_object()->execute()->as_array();//結果をオブジェクトで受け取る
		//2. クエリビルダー（DBクラス）
		//$magazines = DB::select()->from('magazines')->execute()->as_array();//結果を連想配列で受け取る
		//$magazines = DB::select()->from('magazines')->as_object()->execute()->as_array();//結果をオブジェクトで受け取る
		//$magazines = DB::select('id', 'title')->from('magazines')->execute()->as_array();
		//4. ORMパッケージ
		$magazines = Model_Magazine::find('all');//結果はモデルクラスのオブジェクトとして返ります。
		
		Debug::dump($magazines);
	}
}
