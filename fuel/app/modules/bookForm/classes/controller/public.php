<?php
namespace bookForm;

/*
 * Publicコントローラ
 */
class Controller_Public extends \Controller_Template
{
	public function before()
	{
		parent::before();
		$this->response = \Response::forge();
		$this->response->set_header('X-FRAME-OPTIONS', 'SAMEORIGINE');
	}
	
	public function after($response)
	{
		$response = $this->response;
		$response->body = $this->template;
		return parent::after($response);
	}
}