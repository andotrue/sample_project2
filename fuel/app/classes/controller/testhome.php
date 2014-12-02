<?php
use \Model\Testhome;

class Controller_Testhome extends Controller {
	/*
	 * http://tips.recatnap.info/wiki//FuelPHPでviewsを使った簡単なサンプル
	 */
	public function action_index() {
		$data = array();
		
		$data['username'] = 'Joe14';
		$data['title'] = 'Home';
		Debug::dump($data);
		
		//assign the view to browser output
		return View::forge('testhome/index', $data);
	}
	
	/*
	 * http://tips.recatnap.info/wiki/FuelPHPでviewsとmodelを使った簡単なサンプル
	 */
	public function action_zebra() {
		$data = Testhome::get_zebra_test();
	
		//assign the view to browser output
		return View::forge('testhome/zebra', $data);
	}
	
	/*
	 * http://tips.recatnap.info/wiki/FuelPHPでViewModelを使った簡単なサンプル
	 */
	public function action_zebra2() {
		$data = Testhome::get_zebra_test();
	
		return ViewModel::forge('testhome/zebra2')->set("data", $data);
	}
	
	/*
	 * http://tips.recatnap.info/wiki/FuelPHPでMySQLと連携
	 */
	public function action_food() {
		// viewを準備
		$view = View::forge('testhome/food');
	
		// modelでデータを取ってくる
		$foodsObj = Testhome::get_food();
	
		// viewに値をセット
		$view->set("foods", $foodsObj->as_array());
	
		return $view;
	}
	
	/*
	 * http://tips.recatnap.info/wiki/FuelPHPでMySQLと連携・ViewModelを使用
	 */
	public function action_food2() {
		// ViewModelを準備
		$viewmodel = ViewModel::forge('testhome/food2');
	
		// modelでデータを取ってくる
		$foodsObj = Testhome::get_food();
	
		// viewmodelに値をセット
		$viewmodel->set("title", "串メニュー");
		$viewmodel->set("foods", $foodsObj->as_array());
	
		return $viewmodel;
	}
	
	/*
	 * http://tips.recatnap.info/wiki/FuelPHPでヘッダとかを別ファイルにする
	 */
	public function action_food3() {
		// HTMLのベースを作成（ViewModelにするとset_global()が使えないっぽい）
		$layout = View::forge('common/layout');
	
		// グローバル変数(すべてのビューがアクセスできる)を割り当てる
		$layout->set_global("sitename", "焼き鳥・サバンナ");
	
		// メインコンテンツ以外の各パーツをセット
		$layout->head = View::forge("common/head", array("pagetitle"=>"サバンナの焼き鳥メニューの紹介"));
		$layout->header = View::forge("common/header", array("h1"=>"焼き鳥メニュー"));
		$layout->footer = View::forge("common/footer");
	
		// メインコンテンツのデータを取得し、セットする
		$foodsObj = Testhome::get_food();
		$layout->contents = ViewModel::forge("testhome/food3");
		$layout->contents->set("foods", $foodsObj->as_array());
	
		return $layout;
	}
	
	
}