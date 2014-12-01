<?php

namespace Fuel\Migrations;

class Create_dvd
{
	public function up()
	{
		\DBUtil::create_table('dvd', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'content' => array('type' => 'text'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('dvd');
	}
}