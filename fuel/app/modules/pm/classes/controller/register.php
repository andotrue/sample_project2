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
		$this->template->content = \View::forge('register/index',$content);
	}

	public function action_confirm()
	{
		\Log::debug(__METHOD__ . "/" . __LINE__);
		$this->template->title = "会員登録｜パズルメイト";
		$to=\Input::post('name');
		\Debug::dump($_POST);
		\Log::debug(__METHOD__ . "/" . __LINE__);
		
		//$val = $this->forge_validation();
		$val = $this->forge_validation()->add_callable('MyValidationRules');
		\Log::debug(__METHOD__ . "/" . __LINE__);
		
		if($val->run()){
		\Log::debug(__METHOD__ . "/" . __LINE__);
			$data['input'] = $val->validated();
			$this->template->title = 'コンタクトフォーム: 確認';
			$this->template->content = \View::forge('register/confirm', $data);
		}
		else{
		\Log::debug(__METHOD__ . "/" . __LINE__);
			$this->template->title = 'コンタクトフォーム: エラー';
			$this->template->content = \View::forge('register/index');
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
	}

	/*
	 *検証ルール
	 */
	public function forge_validation()
	{
		$val = \Validation::forge();
	
		$val->add('name','名前')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')	//add 20141210 by ando
		->add_rule('max_length',50);
		$val->add('email','メールアドレス')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')	//add 20141210 by ando
		->add_rule('max_length',100)
		->add_rule('valid_email');
	
		return $val;
	}
	
	
	
}
