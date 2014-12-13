<?php

use Goutte\Client;

abstract class FunctionalTestCase extends \Fuel\Core\TestCase
{
	const BASE_URL = 'http://192.168.59.101/fuel/sample_project2/';//サイトのURLを設定
	
	//静的プロパティ
	protected static $client; //Clientオブジェクト　GoutteのClientオブジェクト
	protected static $crawler;	//Crowlerオブジェクト　GoutteのCralerオブジェクト
	protected static $post;		//POSTデータ
	
	/*
	 * PHPUnitの特殊なメソッドでテストテストケースクラスの最初のテストメソッドの実行前に実行される
	 */
	public static function setUpBeforeClass()
	{
		// .htaccessをテスト環境用に変更
		//　DOCROOT：oilコマンドから実行された場合は、oilコマンドがあるfuelphpのトップフォルダになる
		$htaccess = DOCROOT . 'public/.htaccess';
		$htaccess_develop = DOCROOT . 'public/.htaccess_develop';
		$htaccess_test = DOCROOT . 'public/.htaccess_test';
		
		if( ! file_exists($htaccess_develop)
			|| filemtime($htaccess) > filemtime($htaccess_develop))
		{
			$ret = rename($htaccess, $htaccess_develop);
			if($ret === false)
			{
				exit('Error: can\'t backup ".htaccess" !');
			}
		}
		if( ! file_exists($htaccess_test))
		{
			exit('Error: ".htaccess_test" does not exist!');
		}
		
		$ret = copy($htaccess_test, $htaccess);
		if($ret === false)
		{
			exit('Error: can\'t copy ".htaccess_test" !');
		}
		
		// GoutteのClientオブジェクトを作成
		static::$client = new Client();
	}
	
	/*
	 * テストケースクラスの最後のテストの実行後に実行される
	 */
	public static function tearDownAfterClass()
	{
		static::$client = null;
		static::$crawler = null;
		static::$post = null;
		
		// .htaccessの開発環境用に戻す
		$htaccess = DOCROOT . 'public/.htaccess';
		copy($htaccess . '_develop', $htaccess);
		touch($htaccess, filemtime($htaccess . '_develop'));
	}
	
	//絶対URLを返す
	public static function open($url)
	{
		return static::BASE_URL . $url;
	}
}