<?php
namespace Moduletest1;

class Controller_Test extends \Controller
{
	public function action_index() {
		echo "dubug1";
		
		$view=\View::forge('test/index');
		return $view;
	}
}
