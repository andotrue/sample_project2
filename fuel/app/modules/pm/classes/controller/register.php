<?php
namespace pm;
require_once realpath(__DIR__.'/common.php');

 class Controller_Register extends \Controller_Template
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!

		$this->template->js=array('jquery.validationEngine.js','jquery.validationEngine-ja.js');
		$this->template->css=array('validationEngine.jquery.css');
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
		$this->template->title = "会員登録｜パズルメイト";

		$content['article'] = "";
		$this->template->content = \View::forge('register',$content);
	}

}
