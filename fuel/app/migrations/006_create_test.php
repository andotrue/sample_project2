<?php

namespace Fuel\Migrations;

class Create_test
{
	public function up()
	{
		\DBUtil::create_table('test', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'body' => array('type' => 'text'),
			'user_id' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('test');
	}
}