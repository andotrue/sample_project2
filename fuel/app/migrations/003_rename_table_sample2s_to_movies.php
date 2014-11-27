<?php

namespace Fuel\Migrations;

class Rename_table_sample2s_to_movies
{
	public function up()
	{
		\DBUtil::rename_table('sample2s', 'movies');
	}

	public function down()
	{
		\DBUtil::rename_table('movies', 'sample2s');
	}
}