<?php

namespace Fuel\Migrations;

class Rename_table_users_to_users_bup
{
	public function up()
	{
		\DBUtil::rename_table('users', 'users_bup');
	}

	public function down()
	{
		\DBUtil::rename_table('users_bup', 'users');
	}
}