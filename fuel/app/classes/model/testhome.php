<?php
namespace Model;
use \DB;

class Testhome extends \Model {
	
	public static function get_zebra_test() {
		$data = array();
		$data['username'] = 'zebra man';
		$data['title'] = 'zebra house';
		
		return $data;
	}
	
	public static function get_food() {
		// $query=DB::query("select * from food")->execute();
		$result=DB::select()->from("food")->execute();
	
		return $result;
	}
}