<?php
class DbFixture
{
	//フィクスチャファイルの形式
	protected static $file_type = 'yaml';
	protected static $file_ext = 'yml';
	
	//テーブル名とフィクスチャファイル名(「_fixt.yml」を除いたもの)の配列を受け取り、フィクスチャファイルを読み込みデータを$dataに配列に変換して代入
	//指定されたテーブルを空にした後、フィクスチャデータを挿入
	public static function load($table, $file)
	{
		$fixt_name = $file . '_fixt';
		$file_name = $fixt_name . '.' . static::$file_ext;
		$fixt_file = APPPATH . 'tests/fixture/' . $file_name;
		
		if( ! file_exists($fixt_file))
		{
			exit('No Such file: ' . $fixt_file . PHP_EOL);
		}
		
		//フィクスチャファイルを読み込んで配列に変換
		$data = file_get_contents($fixt_file);
		$data = Format::forge($data, static::$file_type)->to_array();
		
		//テーブルのデータを削除
		static::empty_table($table);
		
		//フィクスチャデータの挿入
		foreach($data as $row)
		{
			//DB::insert()メソッドは、FuelPHPのDBクラスのクエリビルダーのメソッドでデータベースへのデータの挿入を準備する
			//set()メソッドは挿入するデータをカラム名をキーにした連想配列セットする
			//execute()メソッドはクエリを実行する
			list($insert_id, $rows_affected) =
				DB::insert($table)->set($row)->execute();
		}
		
		Log::info(
			'Talbe Fixture ' . $file_name . ' -> ' . $fixt_name . ' loaded' . __METHOD__
		);
		
		return $data;
	}
	
	//テーブルのデータを削除
	protected static function empty_table($table)
	{
		if (DBUtil::table_exists($table))
		{
			DBUtil::truncate_table($table);
		}
		else {
			exit('No such table: ' . $table . PHP_EOL);
		}
	}
}