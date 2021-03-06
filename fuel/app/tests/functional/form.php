<?php

/**
 * contact Form Functional Tests
 * 		[command]# oil test --group=Functional
 * 
 * @group Functional
 */
class Test_Functional_Form extends FunctionalTestCase
{
	public static function setUpBeforeClass()
	{
		parent::setUpBeforeClass();
		
		DbFixture::load('forms', 'form');
	}
	
	public function test_入力ページにアクセス()
	{
		try
		{
			static::$crawler = static::$client->request('GET',static::open('bookForm/index2/'));
		}
		catch(Exception $e)
		{
			echo $e->getMessage(), PHP_EOL, 'Error: レスポンスエラーです。', PHP_EOL;
			exit;
		}
		
//		var_dump(static::$client->getResponse()->getContent());
//		exit;

		//$this->assertNotNullメソッドはPHPUnitのアサーションメソッドの一つで、引数nullでないことを検証
		$this->assertNotNull(static::$crawler);
	}
	
	public function test_レスポンスコードが200であることを確認()
	{
		//static::$client->getResponse()->getStatus()メソッドでレスボンスコードを取得できる
		$this->assertEquals(200, static::$client->getResponse()->getStatus());
	}
	
	public function test_レスポンスヘッダのContentTypeを確認()
	{
		$test = static::$client->getResponse()->getHeader('Content-Type');
		$expected = 'text/html; charset=UTF-8';
		$this->assertEquals($expected, $test);
	}
	
	public function test_titleとh1の確認()
	{
		$test = 'コンタクトフォーム';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
		
		$this->assertEquals('お問い合わせ', static::$crawler->filter('h1')->text());
	}
	
	public function test_空欄のまま確認ボタンを押すエラー()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$crawler = static::$client->submit($form);
	
		$test = 'コンタクトフォーム: エラー';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		$test = static::$crawler->filter('li')->text();
		$expected = '『名前』は必須項目です';
		$this->assertEquals($expected, $test);
	
		$test = static::$crawler->filter('li')->eq(1)->text();
		$expected = '『メールアドレス』は必須項目です';
		$this->assertEquals($expected, $test);
	
		$test = static::$crawler->filter('li')->eq(2)->text();
		$expected = '『コメント』は必須項目です';
		$this->assertEquals($expected, $test);
	}
	
	public function test_タブに名前を含めるとエラー()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$crawler = static::$client->submit($form, array(
			'name' => "abc\txyz",
			'email' => "",
			'comment' => '',
		));
		
		$test = 'コンタクトフォーム: エラー';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
		
		$test = static::$crawler->filter('li')->text();
		$expected = '名前 欄にはタブや改行コードを含めないでください。';
		$this->assertEquals($expected, $test);
	}

	public function test_メールアドレスに改行を含めるとエラー()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$crawler = static::$client->submit($form, array(
				'name' => '',
				'email' => "foo@example.jp\nbar",
				'comment' => '',
		));
	
		$test = 'コンタクトフォーム: エラー';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		$test = static::$crawler->filter('li')->eq(1)->text();
		$expected = 'メールアドレス 欄にはタブや改行コードを含めないでください。';
		$this->assertEquals($expected, $test);
	}

	public function test_最大文字数を超えて入力するとエラー()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$crawler = static::$client->submit($form, array(
				'name' => str_repeat('あ',51),
				'email' => str_repeat('a',90) . '@example.jp',
				'comment' => str_repeat('あ',401),
		));
	
		$test = 'コンタクトフォーム: エラー';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		$test = static::$crawler->filter('li')->text();
		$expected = '『名前』は『50』文字以下の必要があります';
		$this->assertEquals($expected, $test);

		$test = static::$crawler->filter('li')->eq(1)->text();
		$expected = '『メールアドレス』は『100』文字以下の必要があります';
		$this->assertEquals($expected, $test);
		
		$test = static::$crawler->filter('li')->eq(2)->text();
		$expected = '『コメント』は『400』文字以下の必要があります';
		$this->assertEquals($expected, $test);
	}
	
	public function test_最大文字数まで入力()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$post = array(
				'name' => str_repeat('あ',50),
				'email' => str_repeat('a',64) . '@' . str_repeat('b',24) . '.example.jp',
				'comment' => str_repeat('あ',400),
		);
		static::$crawler = static::$client->submit($form, static::$post);
	
		$test = 'コンタクトフォーム: 確認';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	}

	public function test_修正ボタンを押すとフォームに戻り入力値が維持される()
	{
		$form = static::$crawler->selectButton('form_submit1')->form();
		static::$crawler = static::$client->submit($form);
	
		$test = 'コンタクトフォーム';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		$test = static::$crawler->filter('input')->eq(0)->attr('value');
		$this->assertEquals(static::$post['name'], $test);
	
		$test = static::$crawler->filter('input')->eq(1)->attr('value');
		$this->assertEquals(static::$post['email'], $test);
	
		$test = static::$crawler->filter('textarea')->text();
		$this->assertEquals(static::$post['comment'], $test);
	}

	public function test_正常データを確認ページに送信()
	{
		$form = static::$crawler->selectButton('form_submit')->form();
		static::$post = array(
				'name' => 'foo',
				'email' => 'foo@example.jp',
				'comment' => '正常データを確認ページに送信。'."\n".'正常データを確認ページに送信。'."\n".'『'.__METHOD__.'』より送信',
		);
		static::$crawler = static::$client->submit($form, static::$post);
			
		$test = 'コンタクトフォーム: 確認';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		//$this->assertRegExpメソッドは、第一引数の正規表現が第二引数の文字列にマッチするかテストするPHPUnitのアサーションメソッド
		//正規表現の中でメタ文字が含まれる可能性のある部分をpreg_quote()関数でエスケープ処理
		$test = static::$crawler->filter('p')->eq(0)->text();
		$pattern = '/' . preg_quote(static::$post['name'], '/') . '/u';
		$this->assertRegExp($pattern, $test);
	
		$test = static::$crawler->filter('p')->eq(1)->text();
		$pattern = '/' . preg_quote(static::$post['email'], '/') . '/u';
		$this->assertRegExp($pattern, $test);

		$test = static::$crawler->filter('p')->eq(2)->text();
		$pattern = '/' . preg_quote(static::$post['comment'], '/') . '/u';
		$this->assertRegExp($pattern, $test);
	}

	public function test_送信ボタンを押すと送信完了()
	{
		$form = static::$crawler->selectButton('form_submit2')->form();
		static::$crawler = static::$client->submit($form);
	
		$test = 'コンタクトフォーム:　送信完了';
		$this->assertEquals($test, static::$crawler->filter('title')->text());
	
		$test = static::$crawler->filter('p')->text();
		$expected = '送信完了しました。';
		$this->assertEquals($expected, $test);
	}
	
	public function test_送信したデータの検証()
	{
		$form = Model_Form::find(4);
		foreach (static::$post as $field => $value)
		{
			$this->assertEquals($value, $form[$field]);
		}
	}
	
}