<?php
class View_Testhome_food2 extends ViewModel {
	public function view() {
		for ($i=0; $i<count($this->foods); $i++) {
			$this->foods[$i]["price2"] = $this->foods[$i]["price"] . " 円";
		}
	}
}