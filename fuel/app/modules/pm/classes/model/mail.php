<?php
namespace pm;

class Model_Mail extends \Model
{
	/**
	 * メールを作成し送信する
	 * 
	 * @param array $post
	 * @return void
	 * @throws \EmailValidationFailedException
	 * @throws \EmailSendingFailedException
	 * @throws \FuelException
	 */
	public function send($post){
		$data = $this->build_mail($post);
		$this->sendmail($data);
	}
	
	//メールの作成
	protected function build_mail($post)
	{
		\Config::load('mail_reminder', true);//設定ファイルをロードする
		
		$data['from'] = \Config::get('mail_reminder.admin_email');
		$data['from_name'] = \Config::get('mail_reminder.admin_name');
		$data['to'] = $post['to'];
		$data['to_name'] = '';
		$data['subject'] = \Config::get('mail_reminder.subject');
			
		$body = \Config::get('mail_reminder.body');
		$encode_to = \Crypt::encode($post['to'], false);
		$url = \Uri::create(MODULE_NAME."/reminder/send",array(),array("key"=>$encode_to),true);
		$data['body'] = \Str::tr($body, array('url' => $url));
	
		return $data;
	}
	
	//メールの送信
	protected function sendmail($data)
	{
		\Package::load('email');
	
		$email = \Email::forge();
		$email->from($data['from'], $data['from_name']);
		$email->to($data['to'], $data['to_name']);
		$email->subject($data['subject']);
		$email->body($data['body']);
	
		$email->send();
	}
	
}