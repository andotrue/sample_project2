<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'last_login' => array('constraint' => 25, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int'),
			'profile_fields' => array('type' => 'text'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'furigana' => array('constraint' => 255, 'type' => 'varchar'),
			'birthdate' => array('type' => 'datetime'),
			'age' => array('constraint' => 11, 'type' => 'int'),
			'gender' => array('constraint' => 10, 'type' => 'varchar'),
			'zipcode' => array('constraint' => 10, 'type' => 'varchar'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'building' => array('constraint' => 255, 'type' => 'varchar'),
			'tel' => array('constraint' => 15, 'type' => 'varchar'),
			'created_at' => array('type' => 'datetime', 'null' => true),
			'updated_at' => array('type' => 'datetime', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}