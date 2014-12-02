<?php
 class Controller_Pmtest1 extends Controller_Template
{
	public $template = 'pmtest1/layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!
		
		//header.phpをテンプレートの$headerとbindさせる。
		$header['title'] = 'header';
		$this->template->header = View::forge('pmtest1/layouts/header',$header);
		
		$subheader = "";
		$this->template->subheader = View::forge('pmtest1/layouts/subheader',$subheader);
		
		//footer.phpをテンプレートの$footerとbindさせる。
		$footer = "";
		$this->template->footer = View::forge('pmtest1/layouts/footer',$footer);
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
	
	/*
	 * http://fuelphp.jp/docs/1.7/general/controllers/template.html
	 */
	public function action_notemplate() {
		// Response オブジェクトが返されると、それが優先され、テンプレートなしのコンテンツが表示される
		return new Response(View::forge('pmtest1/index', $content));
	}
	
	public function action_index() {
		$this->template->title = "index";

		//$magazines = Model_Magazine::find_all();
		//$magazines = DB::select('title','discription')->from('magazines')->execute()->get('title');
		$magazines = DB::select()->from('magazines')->execute()->as_array();
		//var_dump($magazines);
		$menu["magazines"] = $magazines;
		$this->template->menu = View::forge('pmtest1/layouts/menu',$menu);

		$content['article'] = '記事です';
		$this->template->content = View::forge('pmtest1/content',$content);
	}

}
