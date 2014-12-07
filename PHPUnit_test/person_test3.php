<?php
/*
 * データプロバイダ
 * 	テストデータコメントで
 * 		@dataProvider provider_人データ
 * 	とデータプロバイダのメソッド名を指定する。
 * 	これを「@dataProviderアノテーション」と呼ぶ
 * command
 * # fuel/vendor/bin/phpunit ./PHPUnit_test/person_test3.php
----
PHPUnit 3.7.38 by Sebastian Bergmann.

...

Time: 142 ms, Memory: 4.00Mb

OK (3 tests, 3 assertions)
----
 */
require __DIR__ . '/person.php';

class Person_Test3 extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider provider_人データ
	 */
	public function test_設定した性別は取得した性別と一致する($name, $gender, $birthdate)
	{
		$person = new Person($name, $gender, $birthdate);
		
		$test = $person->get_gender();
		$expected = $gender;
		
		$this->assertEquals($expected, $test);
	}
	
	public function provider_人データ()
	{
		return array(
			array('Rintaro', 'male', '1991/12/14'),
			array('Mayuri',  'female', '1994/2/1'),
			array('Suzuha',  'female', '2017/9/27'),
		);
	}
}
