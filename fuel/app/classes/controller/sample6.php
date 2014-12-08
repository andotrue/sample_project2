<?php
/*
 * http://w.builwing.info/2012/04/11/fuelphpでスマホサイトを作成する/
 * http://w.builwing.info/2012/04/13/jqueryのexvalidationで簡単バリデーション/
 * http://w.builwing.info/2012/04/16/jquerymobileのテーマローダーで簡単テーマ作成/
 * 		http://themeroller.jquerymobile.com/?ver=1.4.5
 */

 class Controller_Sample6 extends Controller{
	 public function action_index(){
		 $data=array(
		 'title'=>'FulePHPでスマホサイト',
		 'site_name'=>'WinRoad徒然草',
		 'footer'=>'@2012 winroad',
		 );
		 $view=View::forge('sample6/index',$data);
		 return $view;
	 }
	 //フォームを表示するためのメソッド
	 public function action_form(){
		 $data=array(
			 'title'=>'FulePHPでスマホサイト',
			 'site_name'=>'WinRoad徒然草',
			 'footer'=>'@2012 winroad',

		 	 //jqueryのexvalidationで簡単バリデーション
			 //'css'=>array('jquery.mobile.min.css','exvalidation.css'),
		 	 'js'=>array('jquery.min.js','jquery.mobile.min.js','exvalidation.min.js','exchecker-ja.min.js'),

		 	 //jqueryのexvalidationで簡単バリデーション & jquerymobileのテーマローダーで簡単テーマ作成
		 	 'css'=>array('thema-sample.min.css','jquery.mobile.structure.min.css','exvalidation.css'),

		 );
		 $view=View::forge('sample6/form',$data);
		 return $view;
	 }
}