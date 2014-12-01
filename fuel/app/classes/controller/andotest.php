<?php
 class Controller_Andotest extends Controller
{
	/*
	 * FuelPHPのFieldsetクラスをまとめてみた。2
	 * http://blog.fagai.net/2012/10/29/fuelphp_fieldset_2/
	 */
	public function action_index() {
		$view = View::forge('andotest/index');

		return $view;
		
	}
}
