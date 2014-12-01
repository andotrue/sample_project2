<?php
class View_Testhome_zebra2 extends ViewModel {
	public function view() {
		$this->username2 = "whole " . $this->data["username"];
		$this->title2 = $this->data["title"];
	}
}