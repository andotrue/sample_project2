<?php
class Eventtest
{
	public static function event_test($arg1, $arg2)
	{
		Debug::dump($arg1);
		Debug::dump($arg2);
		Log::info('イベントのテスト: ' . $arg2[0] . ', ' . $arg2[1] , __METHOD__);
	}
}