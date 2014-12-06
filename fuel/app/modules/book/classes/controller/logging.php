<?php
namespace book;

class Controller_Logging extends \Controller
{
	public function action_index()
	{
		\Log::info('infoログのテスト', __METHOD__);
		\Log::debug('debugログのテスト', __METHOD__);
		return 'ログのテスト';
	}
} 