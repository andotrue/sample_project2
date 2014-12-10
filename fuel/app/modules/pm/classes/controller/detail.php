<?php
namespace pm;
require_once realpath(__DIR__.'/common.php');

 class Controller_Detail extends \Controller_Template
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!

		$this->template->js=array('CaptionerJs.min.js');
		$this->template->css=array('CaptionerJs.min.css');
		$common = new Common();
		$common->common_views($this->template);
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
		$id = \Input::get("id");
		
		//データ取得
		$article = Model_Magazine::find($id);//結果はモデルクラスのオブジェクトとして返ります。
		//Debug::dump($article);

		$this->template->title = "各紙紹介　詳細　｜パズルメイト" . $article['title'];

		$content['article'] = $article;
		$this->template->content = \View::forge('detail',$content);


	}

}
