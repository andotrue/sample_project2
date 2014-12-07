<?php

/**
 * Person class Tests
 * 
 * @group App
 */

class person_Test extends TestCase
{
	public function test_男性の場合は性別取得するとmaleである()
	{
		$person = new Person('Rintaro', 'male', '1991/12/14');
		//$person = new Person('Rintaro', 'female', '1991/12/14');//失敗させる場合
		
		$test = $person->get_gender();
		$expected = 'male';
		
		$this->assertEquals($expected, $test);
	}
}