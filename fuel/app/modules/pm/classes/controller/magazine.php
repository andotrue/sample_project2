<?php
namespace pm;

 class Controller_Magazine extends \Controller_Template
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!
		
		//header.phpをテンプレートの$headerとbindさせる。
		$header['title'] = 'header';
		$this->template->header = \View::forge('layouts/header',$header);
		
		$subheader = "";
		$this->template->subheader = \View::forge('layouts/subheader',$subheader);
		
		//footer.phpをテンプレートの$footerとbindさせる。
		$footer = "";
		$this->template->footer = \View::forge('layouts/footer',$footer);
	}
	
	/*
     * $response をパラメータとして追加し、after() を Controller_Template 互換にする
	　*/
	public function after($response)
	{
		$response = parent::after($response); // あなた自身のレスポンスオブジェクトを作成する場合は必要ありません。
		// do stuff		
		return $response; // after() は確実に Response オブジェクトを返すように
	}
	
	public function action_index() {
		$this->template->title = "magazine";

		/*データ取得
		 */
		$magazines = Model_Magazine::find("all");//結果はモデルクラスのオブジェクトとして返ります。
		//Debug::dump($article);

		$menu["magazines"] = $magazines;
		$this->template->menu = \View::forge('layouts/menu',$menu);

		$content = "";
		$this->template->content = \View::forge('magazine',$content);

		$this->template->menufooter = \View::forge('layouts/menufooter',$menu);
	}

}
