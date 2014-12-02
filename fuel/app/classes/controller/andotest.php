<?php
 class Controller_Andotest extends Controller_Template
{
	public function action_index() {
		$this->template->title = "Andotest";
		$this->template->set_global('title2', 'Andotest2');//どのビューファイルでも利用できる変数の定義
		$this->template->content = View::forge('andotest/index');
	}
}
