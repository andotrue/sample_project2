<?php

/**
 * Model Form class Tests
 * 	テスト実行コマンド
 * 		oil test --group=App
 * 
 * @group App
 */
class model_form_Test extends DbTestCase
{
	protected $tables = array(
		//テーブル名 => YAMLファイル名
		//'form' => 'form',
		'forms' => 'form',
	);
	
	public function test_IDでレコードを検索する()
	{
		foreach ($this->form_fixt as $row)
		{
			//$form = Model_Form::find_one_by_id($row['id']);
			$form = Model_Form::find($row['id']);
				
			foreach ($row as $field => $value)
			{
				$test = $form->$field;
				$expected = $row[$field];
				$this->assertEquals($expected, $test);
			}
		}
	}
	
	public function test_新規データをテーブルに保存する()
	{
		$data = array(
			'name' => '藤原義孝',
			'email' => 'yoshitaka@example.jp',
			'comment' => '君がため　惜しからざりし　命さえ　長くもながと　思ひけるかな',
			'ip_address' => '10.11.12.13',
			'user_agent' => 'Mozilla/2.02 (Macintosh; I: PPC)',
		);
		
		//forge()メソッドでオブジェクトを生成し、set()メソッドで新規データをセット
		//$form = Model_Form::forge()->set($data);
		$form = Model_Form::forge($data);
		
		//新規データをデータベースに挿入
		//list($id, $rows) = $form->save();
		$ret = $form->save();
		
		//挿入されたデータをデータベースから検索
		//$form = Model_Form::find_by_pk($id);
		$form = Model_Form::find($form->id);
		
		foreach ($data as $field => $value)
		{
			$this->assertEquals($value, $form[$field]);
		}
	}
}