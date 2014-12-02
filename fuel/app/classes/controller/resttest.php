<?php
 class Controller_Resttest extends Controller_Rest
{
	/*
	 * sample_project2/resttest/today.json?loc=nagoya
	 * sample_project2/resttest/today.xml?loc=nagoya
	 * sample_project2/resttest/today.csv?loc=nagoya
	 * sample_project2/resttest/today.php?loc=nagoya
	 * sample_project2/resttest/today.html?loc=nagoya
	 */
	public function get_today() {
		$location = Input::get("loc");
		$weather = "fine";
		
		$this->response(array("location"=>$location,"weather"=>$weather));
	}
}
