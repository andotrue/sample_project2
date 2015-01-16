<?php
namespace pm;

 class Controller_Reminder extends Controller_Public
{
	public $template = 'layouts/template';
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
	
	public function action_index() 
	{
		$this->template->title = "パスワードお忘れの方｜パズルメイト";

		$content = array();
		$content['username'] = "";
		$content['error_msg'] = "";
		$content['success_msg'] = "";
		
		$email = \Input::post('email');
		if ($email)
		{
			//usernameの存在チェック
			$same_users = \DB::select()->from('users')->where('username', $email)->execute();
			if($same_users->count() > 0)
			{
				$post['to'] = $email;
				$post['to_name'] = '';
				
				// 存在してたらならメール送信
				//メールの送信
				try{
					$mail = new Model_Mail();//Mailモデルをインスタンス化
					$mail->send($post);
					$this->template->title = ('コンタクトフォーム:　送信完了');
					$content['success_msg'] = 'パスワード再発行の案内を送信しました。メールに記載された方法でパスワードを再発行してください。';
				}
				catch (EmailValidationFailedException $e)
				{
					\Log::error('メール検証エラー:　' . $e->getMessage(), __METHOD__);
					$content['error_msg'] = 'メールアドレスに誤りがあります。';	
				}
				catch (EmailSendingFailedException $e)
				{
					\Log::error('メール送信エラー:　' . $e->getMessage(), __METHOD__);
					$content['error_msg'] = 'メールを送信できませんでした。';
				}
			}
			else
			{
				// 存在してなければ戻す
				$content['username'] = "";
				$content['error_msg'] = '指定されたメールアドレスは登録されておりません。';
			}
		}
		
		$this->template->content = \View::forge('reminder/index',$content);
	}

	public function action_send()
	{
		$this->template->title = "パスワードお忘れの方｜パズルメイト";
	
		$content = array();
		$content['username'] = "";
		$content['error_msg'] = "";
		$content['success_msg'] = "";
	
		$key = \Input::get('key');
		if ($key)
		{
			$email = \Crypt::decode($key, false);
			//usernameの存在チェック
			$same_users = \DB::select()->from('users')->where('username', $email)->execute();
			if($same_users->count() > 0)
			{
			}
			else
			{
				// 存在してなければ戻す
				$content['username'] = "";
				$content['error_msg'] = '不正なアクセスです。';
			}
		}
		else
		{
			$content['error_msg'] = '不正なアクセスです。';
		}
	
		$this->template->content = \View::forge('reminder/send',$content);
	}

	
	public function action_regist()
	{
		$this->template->title = "パスワードお忘れの方｜パズルメイト";
		$content = array();
		$content['username'] = "";
		$content['error_msg'] = "";
		$content['success_msg'] = "";
		
		$val = $this->forge_validation()->add_callable('MyValidationRules');//add 20141210 by ando
		
		if( ! $val->run())
		{
			$content['error_msg'] = $val->show_errors();
//			\Debug::dump($content);
			$this->template->content = \View::forge('reminder/regist',$content);
			return;
		}
		else
		{
			$password = \Input::post('password');
			$passwordrm = \Input::post('passwordrm');
			$key = \Input::post('key');
		}
//		\Debug::dump($_POST);
		
		if ($password && $passwordrm && $key)
		{
			$email = \Crypt::decode($key, false);
			//usernameの存在チェック
			$same_users = \DB::select()->from('users')->where('username', $email)->execute();
			if($same_users->count() > 0)
			{
				$auth = \Auth::instance();// Authのインスタンス化
				$enc_password=$auth->hash_password((string) $password);
				
				try{
					$query = \DB::update('users')->value("password", $enc_password)->where('username', '=', $email)->execute();
//					echo \DB::last_query();
					$content['success_msg'] = 'パスワードを更新しました';
				}
				catch(Exception $e)
				{
					$content['error_msg'] = 'パスワード更新エラー'.__LINE__;
				}
			}
			else
			{
				// 存在してなければ戻す
				$content['username'] = "";
				$content['error_msg'] = '不正なアクセスです。'.__LINE__;
			}
		}
		else
		{
			$content['error_msg'] = '不正なアクセスです。'.__LINE__;
		}
	
		$this->template->content = \View::forge('reminder/regist',$content);
	}

	/*
	 *検証ルール
	*/
	public function forge_validation()
	{
		$val = \Validation::forge();
	
		//パスワード
		$val->add('password','パスワード')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',10);
		//パスワード(確認)
		$val->add('passwordrm','パスワード（確認）')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',10);
	
		return $val;
	}
	
}
