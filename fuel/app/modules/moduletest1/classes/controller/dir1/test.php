<?php
namespace Moduletest1;

class Controller_Dir1_Test extends \Controller
{
	public function action_index() {
		echo "dubug3";
		
		$view=\View::forge('test/index');
		return $view;
	}
}
