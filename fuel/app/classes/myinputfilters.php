<?php

class MyInputFilters
{
	/**
	 * 文字エンコーディングの検証フィルタ
	 * 
	 * @param string|array $value
	 * @return string|array
	 * @throws HttpInvalidInputException
	 */
	public static function check_encoding($value)
	{
		//配列の場合は再帰的に処理
		if(is_array($value))
		{
			array_map(array('MyInputFilters', 'check_encoding'), $value);
			return $value;
		}
		
		//文字エンコーディングを検証
		if(mb_check_encoding($value, Fuel::$encoding))
		{
			return $value;
		}
		else
		{
			//エラーの場合はログに記録
			Log::error(
				'Invalid character encoding: ' . Input::Uri() . ' ' . 
				rawurlencode($value) . ' ' . 
				Input::ip() . ' "' . Input::user_agent(). '"'
			);
			//エラーを表示して終了
			throw new HttpInvalidInputException('Invalid input data');
		}
	}
	
	/*改行コードとタブを除く制御文字が含まれていないかの検証フィルタ
	 * 
	 * @param string|array $value
	 * @return string|array
	 * @throws HttpInvalidInputException
	 */
	public static function check_control($value)
	{
		//配列の場合は再帰的に処理
		if(is_array($value))
		{
			array_map(array('MyInputFilters', 'check_control'), $value);
			return $value;
		}
		
		//改行コードとタブを除く制御文字が含まれていないか
		//｢\A｣は文字列の先頭を｢\z｣は文字列の末尾を表す
		//｢\r｣はキャリッジリターン、｢\n｣はラインフィードを表す制御文字
		//｢\t｣はタブ文字を表す制御文字
		//｢[:^cntrl:]｣は制御文字をあわらすPOSIX文字クラス
		//最後の｢u｣はチェック対象がUTF-8エンコーディングであることを示す修飾子
		//最初から最後まで、改行コードおよびタブか、制御文字以外のUTF-8の文字が0文字以上ずっと続くかチェックし、マッチした場合1を返す
		if(preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $value) === 1)
		{
			return $value;
		}
		else
		{
			//含まれている場合はログに記録
			static::log_error('Invalid character encoding', $value);
			//エラーを表示して終了
			throw new HttpInvalidInputException('Invalid input data');
		}
	}
	
	//エラーをログに記録
	public static function log_error($msg, $value)
	{
		Log::error(
			$msg . ': ' . Input::Uri() . ' ' .
			rawurlencode($value) . ' ' .
			Input::ip() . ' "' . Input::user_agent(). '"'
		);
	}
}