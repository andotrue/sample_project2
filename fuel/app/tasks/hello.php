<?php
/*
 * ex) oil r book::hello
 * 		oil r book::hello FuelPhp
 */

namespace Fuel\Tasks;

class Hello
{
	public function run($name = 'World')
	{
		echo 'Hello ', $name, '!', PHP_EOL;
	}
}