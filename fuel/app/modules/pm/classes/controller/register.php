<?php
namespace pm;

 class Controller_Register extends Controller_Public
{
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!

		$this->template->js = isset($this->template->js)? $this->template->js : array();
		array_push($this->template->js, 'validationEngine/jquery.validationEngine.js'
											,'validationEngine/jquery.validationEngine-ja.js'
		);
		
		$this->template->js2 = isset($this->template->js2)? $this->template->js2 : array();
		array_push($this->template->js2, 'FlowupLabels/jquery.FlowupLabels.min.js'
											,'FlowupLabels/main.js'
		);
		
		$this->template->css = isset($this->template->css)? $this->template->css : array();
		array_push($this->template->css, 'validationEngine/validationEngine.jquery.css'
											,'FlowupLabels/jquery.FlowupLabels.min.css'
											,'FlowupLabels/main.css'
		);
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
