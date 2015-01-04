<?php
abstract class DbTestCase extends TestCase
{
	//フィクスチャデータ
	protected $tables = array(
		//テーブル名 => ファイル名
	);
	
	protected function setUp()
	{
		//各テストメソッドの実行前に、指定されたテーブルを空にしてフィクスチャデータをデータベースにロードする
		parent::setUp();
		
		if( ! empty($this->tables))
		{
			$this->dbfixt($this->tables);
		}
	}
	
	//DbFixtureクラスのload()メソッドを呼び出し、フィクスチャを準備する
	//テーブル名とフィクスチャファイル名が同一の場合は、パラメタを'table1','table2'のようにテーブル名だけを引数に並べて指定することも可能
	protected function dbfixt($tables)
	{
		// $this->dbfixt('table1', 'table2', ...)という形式もサポート
		$tables = is_string($tables) ? func_get_args() : $tables;
		
		foreach ($tables as $table => $file)
		{
			$fixt_name = $file . '_fixt';
			$this->$fixt_name = DbFixture::load($table, $file);
		}
	}
}