<?php

class Model_Article extends \Orm\Model
{
protected static $_properties = array(
  'id' => array(
        'form' => array('type' => false),
    ),
  'title' => array(
          'data_type' => 'varchar',
          'label'     => 'タイトル',
          'validation'    => array('required'),
          'form'      => array('type' => 'text'),
      ),
  'body' => array(
          'data_type' => 'text',
          'label'     => '本文',
          'validation'    => array('required'),
          'form'      => array('type' => 'textarea'),
      ),
  'user_id' => array(
          'data_type' => 'int',
          'label'     => 'ユーザID',
  		  'validation'    => array('required', 'valid_string' => array(array('numeric'))),
          'form'      => array('type' => 'text'),
      ),
  'created_at' => array(
          'form'  => array('type' => false),
      ),
  'updated_at' => array(
          'form'  => array('type' => false),
      )
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'articles';

}
