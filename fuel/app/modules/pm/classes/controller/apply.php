<?php
namespace pm;
require_once realpath(__DIR__.'/common.php');

 class Controller_Apply extends Controller_Public
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!
		
		$this->template->js2 = isset($this->template->js2)? $this->template->js2 : array();
		array_push($this->template->js2, 'FlowupLabels/jquery.FlowupLabels.min.js'
											,'FlowupLabels/main.js'
		);
		
		$this->template->css = isset($this->template->css)? $this->template->css : array();
		array_push($this->template->css, 'FlowupLabels/jquery.FlowupLabels.min.css'
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
	
	public function action_login() 
	{
		$this->template->title = "懸賞に応募｜パズルメイト";

		$content = array();
		$content['username'] = "";
		$content['login_error'] = "";
		if ($_POST)
		{
			// Authのインスタンス化
			//config/auth.php ファイルのキー"driver"でロードする Login ドライバを設定。
			//最初のドライバが Auth::instance() のデフォルト返り値にもなります。
			$auth = \Auth::instance();
			// 資格情報の確認
			if ($auth->login($_POST['email'],$_POST['password']))
			{
				// 認証OKならトップページへ
				\Response::redirect(\Uri::create("pm/apply/form/",array(),array(),true));
			}
			else
			{
				//認証が失敗したときの処理
				$content['username'] = $_POST['email'];
				$content['login_error'] = 'ユーザー名かパスワードが違います。再入力して下さい。';
			}
		}
		
		// ログインフォームの表示
		$content['article'] = "";
		$this->template->content = \View::forge('apply/login',$content);
	}

	public function action_form()
	{
		$this->template->title = "懸賞に応募｜パズルメイト";

		$content['article'] = "";
		$this->template->content = \View::forge('apply/form',$content);
	}
}
