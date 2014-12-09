<?php
namespace pm;
require_once realpath(__DIR__.'/common.php');

 class Controller_Pm extends \Controller_Template
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!
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
	
	/*
	 * http://fuelphp.jp/docs/1.7/general/controllers/template.html
	 */
	public function action_notemplate() {
		// Response オブジェクトが返されると、それが優先され、テンプレートなしのコンテンツが表示される
		return new Response(\View::forge('index', $content));
	}
	
	public function action_index() {
		$this->template->title = "パズルメイト｜ (株)マガジン・マガジンのパズル総合サイト";

		$content['article'] = 'TOPページです';
		$this->template->content = \View::forge('index',$content);
	}

}
