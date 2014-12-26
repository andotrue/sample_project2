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
				$post['from'] = "hoge@hoge.jp";
				$post['from_name'] = "パズルメイト（テスト）";
				$post['to'] = $email;
				$post['to_name'] = '';
				$post['subject'] = 'コンタクトフォーム';
				$post['comment'] = 'ご利用ありがとうございます。（株）マガジン・マガジンのパズル誌総合サイト、パズルメイトよりパスワード再発行のお知らせです。';
				
				// 存在してたらならメール送信
				//メールの送信
				try{
					$mail = new Model_Mail();//Mailモデルをインスタンス化
					$mail->send($post);
					$this->template->title = ('コンタクトフォーム:　送信完了');
					$content['success_msg'] = 'パスワード再発行の案内を送信しました。メールに記載された方法でパスワードを再発行してください。';
					$this->template->content = \View::forge('reminder',$content);
					return;
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
		
		$this->template->content = \View::forge('reminder',$content);
	}

}
