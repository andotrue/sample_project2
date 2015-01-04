<?php

namespace bookForm;

class Model_Form extends \Model_Crud
{
	//使用するテーブル名
	protected static $_table_name = 'form';
	//作成日付
	protected static $_created_at = 'created_at';
	//更新日付
	protected static $_updated_at = 'updated_at';
} 