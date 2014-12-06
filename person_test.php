<?php

require_once __DIR__.'/person.php';

//テストケースクラスはPHPUnit_Framekwork_TestCaseを継承する
class Person_Test extends PHPUnit_Framework_TestCase
{
	//テストメソッド名はtestで始める
	public function test_男性の場合は性別取得するとmaleである()
	{
		$person = new Person('Rintaro', 'male', '1991/12/14');
		//$person = new Person('Rintaro', 'female', '1991/12/14');//失敗させる場合
		
		$test = $person->get_gender();
		$expected = 'male';
		
		//期待される結果とテスト結果が一致するか
		$this->assertEquals($expected, $test);
	}
}