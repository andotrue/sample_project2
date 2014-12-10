<?php
namespace pm;

Class common{
	//コンストラクタ
	public function __construct(){
	}
	
	public function common_views($template){
				
		$template->js = isset($template->js)? $template->js : array(); 
		array_unshift($template->js, 'jquery.min.js');

		$template->js2 = isset($template->js2)? $template->js2 : array(); 
		array_unshift($template->js2, '');

		$template->css = isset($template->css)? $template->css : array(); 
		array_unshift($template->css, 'bootstrap.css','pm/common.css');

		//ヘッダー表示
		//header.phpをテンプレートの$headerとbindさせる。
		$header['title'] = 'header';
		$template->header = \View::forge('layouts/header',$header);
		
		//サブヘッダーヘッダー表示
		$subheader = "";
		$template->subheader = \View::forge('layouts/subheader',$subheader);
		
		// データ取得
		$magazines = Model_Magazine::find('all');//結果はモデルクラスのオブジェクトとして返ります。
		//Debug::dump($magazines);
		$menu["magazines"] = $magazines;
		
		//メニュー表示	
		$template->menu = \View::forge('layouts/menu',$menu);
		
		//メニューフッター表示
		$template->menufooter = \View::forge('layouts/menufooter',$menu);
		
		//フッター表示		
		//footer.phpをテンプレートの$footerとbindさせる。
		$footer = "";
		$template->footer = \View::forge('layouts/footer',$footer);
		
	}
}