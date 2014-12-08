<?php
namespace book;

class Controller_EventTest extends \Controller
{
	public function action_index(){
		\Event::register('shutdown', '\Eventtest::event_test', '引数１', '引数2');
	}
}