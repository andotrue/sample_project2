<?php

/**
 * Model Mail class Tests
 * テスト実行コマンド
 * 		oil test --group=App
 * 
 * @group App---
 */
class Model_Mail_Test extends TestCase
{
	public function setUp()
	{
		$this->post = array(
			'email' => 'andotrue@gmail.com',
			'name' => '送信者',
			'comment' => 'メール送信のテスト',
		);
	}
	
	public function test_メールを送信するとmail関数が呼ばれる()
	{
		//mail()関数からデータをリセットしておく
		Config::set('_test.mail.data', array());
		
		$mail = new Model_Mail();
		$mail->send($this->post);
		
		//mail()関数からデータを代入
		$mail_data = Config::get('_tests.mail.data');
//		var_dump($mail_data);
//		exit;
		
		$this->assertNotEquals(array(), $mail_data);
	}
	
	public function test_メールヘッダを確認()
	{
		//mail()関数からのデータを代入
		$mail_data = Config::get('_tests.mail.data');
		
		//管理者 <info@example.jp>
		//MIMEエンコードされた値を期待される結果で指定してる
		$expected = '"=?UTF-8?B?566h55CG6ICF?=" <andotrue@gmail.com>';
		$this->assertEquals($expected, $mail_data['to']);
		
		//コンタクトフォーム
		$expected = '=?UTF-8?B?44Kz44Oz44K/44Kv44OI44OV44Kp44O844Og?=';
		$this->assertEquals($expected, $mail_data['subject']);
		
		//From: 送信者<foo@example.com>
		//assertRegExp()メソッドにより正規表現での文字列一致をテストする場合は、正規表現の中でメタ文字が含まれる可能性のある部分をpreg_quote()関数でエスケープ処理する
		$pattern = '/' . preg_quote('From: "=?UTF-8?B?6YCB5L+h6ICF?=" <andotrue@gmail.com>', '/') . '/u';
		$this->assertRegExp($pattern, $mail_data['additional_headers']);
	}
	
	public function test_メール本文を確認()
	{
		//mail()関数からのデータを代入
		$mail_data = Config::get('_tests.mail.data');
		
		$pattern = '/名前: ' . preg_quote($this->post['name'], '/') . '/u';
//		print("/".$pattern."/");
//		var_dump($mail_data);
//		exit;
		$this->assertRegExp($pattern, $mail_data['message']);
		
		$pattern = '/メールアドレス: ' . preg_quote($this->post['email'], '/') . '/u';
		$this->assertRegExp($pattern, $mail_data['message']);
		
		$pattern = '/' . preg_quote($this->post['comment'], '/') . '/u';
		$this->assertRegExp($pattern, $mail_data['message']);
	}
	
	public function test_追加パラメータを確認()
	{
		//mail()関数からのデータを代入
		$mail_data = Config::get('_tests.mail.data');
		
		$pattern = '/-oi -f ' . preg_quote($this->post['email'], '/') . '/u';
		$this->assertRegExp($pattern, $mail_data['additional_parameters']);
	}
}