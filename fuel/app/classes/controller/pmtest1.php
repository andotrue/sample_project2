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

		/*データ取得
		 *http://blog.a-way-out.net/blog/2014/07/09/fuelphp-database/
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

		$menu["magazines"] = $magazines;
		$this->template->menu = View::forge('pmtest1/layouts/menu',$menu);

		$content['article'] = '記事です';
		$this->template->content = View::forge('pmtest1/content',$content);
	}

}
