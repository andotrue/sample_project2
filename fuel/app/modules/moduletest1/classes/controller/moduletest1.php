<?php
namespace Moduletest1;

class Controller_Moduletest1 extends \Controller
{
	public function action_index() {
		echo "dubug1";
		
		$view=\View::forge('test/index');
		return $view;
	}
}
