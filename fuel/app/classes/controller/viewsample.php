<?php
 class Controller_Viewsample extends Controller
{
	public function router($method, $params){
		if($method === "1"){
			return $this->action_case1($params);
		}
		elseif($method === "2"){
			return $this->action_case2($params);
		}
		elseif($method === "3"){
			return $this->action_case3($params);
		}
	}
	//sample_project2/viewsample/1
	public function action_case1() {
		$data = array();
		$data['title'] = '<h>ビューのサンプル</h>';
		$data['username'] = '<del>ando</del>';
		
		return View::forge('viewsample',$data);
	}
	//sample_project2/viewsample/2
	public function action_case2() {
		$view = View::forge('viewsample');
		
		$view->set('title', '<h>ビューのサンプル2</h>');
		$view->set('username', '<del>ando2</del>');
		
		return $view;
	}
	//sample_project2/viewsample/3
	public function action_case3() {
		$view = View::forge('viewsample');
		
		$view->set_safe('title', '<h>ビューのサンプル3</h>');
		$view->set('username', '<del>ando3</del>', false);
		
		return $view;
	}
}
