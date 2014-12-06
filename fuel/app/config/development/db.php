<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_db',
			'username'   => 'fuel_db_user',
			'password'   => 'passwd',
		),
		'profiling' => true,//add 20141206 by ando
	),
);
