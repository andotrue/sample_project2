<?php
namespace book;

class Controller_Resttest extends \Controller_Rest
{
	/*
	 * book/resttest/today.json?loc=nagoya
	 * book/resttest/today.xml?loc=nagoya
	 * book/resttest/today.csv?loc=nagoya
	 * book/resttest/today.php?loc=nagoya
	 * book/resttest/today.html?loc=nagoya
	 */
	public function get_today() {
		$location = \Input::get("loc");
		$weather = "fine";
		
		$this->response(array("location"=>$location,"weather"=>$weather));
	}
}
