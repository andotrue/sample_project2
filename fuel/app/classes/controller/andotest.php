<?php
 class Controller_Andotest extends Controller_Template
{
	public function action_index() {
		$this->template->title = "Andotest";
		$this->template->content = View::forge('andotest/index');
	}
}
