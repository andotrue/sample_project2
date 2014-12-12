<?php
namespace pm;

/*
 * Publicコントローラ
 */
class Controller_Public extends \Controller_Template
{
	public $template = 'layouts/template';
	
	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!
		$this->template->js=array(
				'jquery.min.js',
		);
		$this->template->js2=array(
				'',
		);
		$this->template->css=array(
				'bootstrap.css',
				'pm/common.css',
		);
		
		//ヘッダー表示
		//header.phpをテンプレートの$headerとbindさせる。
		$header['title'] = 'header';
		$this->template->header = \View::forge('layouts/header',$header);
		
		//サブヘッダーヘッダー表示
		$subheader = "";
		$this->template->subheader = \View::forge('layouts/subheader',$subheader);
		
		// データ取得
		$magazines = Model_Magazine::find('all');//結果はモデルクラスのオブジェクトとして返ります。
		//Debug::dump($magazines);
		$menu["magazines"] = $magazines;
		
		//メニュー表示
		$this->template->menu = \View::forge('layouts/menu',$menu);
		
		//メニューフッター表示
		$this->template->menufooter = \View::forge('layouts/menufooter',$menu);
		
		//フッター表示
		//footer.phpをテンプレートの$footerとbindさせる。
		$footer = "";
		$this->template->footer = \View::forge('layouts/footer',$footer);
		
		
		$this->response = \Response::forge();
		$this->response->set_header('X-FRAME-OPTIONS', 'SAMEORIGINE');
		
	}
	
	public function after($response)
	{
		$response = $this->response;
		$response->body = $this->template;
		return parent::after($response);
	}
}