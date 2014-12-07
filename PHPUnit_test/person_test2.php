<?php
/*
 * setUP()とtearDown
 * command
 * fuel/vendor/bin/phpunit ./PHPUnit_test/person_test2.php 
 * ----
 * PHPUnit 3.7.38 by Sebastian Bergmann.

Person_Test2::setUPBeforeClass
Person_Test2::setup
Person_Test2::test_男性の場合は性別取得するとmaleである
Person_Test2::tearDown
.Person_Test2::setup
Person_Test2::test_女性の場合は性別取得するとfemaleである
Person_Test2::tearDown
.Person_Test2::tearDownAfterClass


Time: 119 ms, Memory: 4.00Mb

OK (2 tests, 2 assertions)
* ----
 */

require_once __DIR__.'/person.php';

//テストケースクラスはPHPUnit_Framekwork_TestCaseを継承する
class Person_Test2 extends PHPUnit_Framework_TestCase
{
	/*
	 * テストケースクラスの最初のテストメソッドの実行前に実行
	 */
	public static function setUPBeforeClass()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
	}
	
	/*
	 * 各テストメソッドの実行前に自動的に実行
	 */
	protected function setup()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
	}
	
	//テストメソッド名はtestで始める
	public function test_男性の場合は性別取得するとmaleである()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
		
		$person = new Person('Rintaro', 'male', '1991/12/14');
		//$person = new Person('Rintaro', 'female', '1991/12/14');//失敗させる場合
		
		$test = $person->get_gender();
		$expected = 'male';
		
		//期待される結果とテスト結果が一致するか
		$this->assertEquals($expected, $test);
	}

	public function test_女性の場合は性別取得するとfemaleである()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
		
		$person = new Person('Mayuri', 'female', '1994/2/1');
		
		$test = $person->get_gender();
		$expected = 'female';
		
		//期待される結果とテスト結果が一致するか
		$this->assertEquals($expected, $test);
	}

	/*
	 * 各テストメソッドの実行後に自動的に実行
	 */
	protected function tearDown()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
	}
	
	/*
	 * テストケースクラスの最後のテストの実行後に実行
	 */
	public static function tearDownAfterClass()
	{
		fwrite(STDOUT, __METHOD__ . PHP_EOL);
	}
}