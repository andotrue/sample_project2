<?php
namespace pm;

Class common{
	//コンストラクタ
	public function __construct(){
	}
	
	public function test($template){
		//header.phpをテンプレートの$headerとbindさせる。
		$header['title'] = 'header';
		$template->header = \View::forge('layouts/header',$header);
		
		$subheader = "";
		$template->subheader = \View::forge('layouts/subheader',$subheader);
		
		//footer.phpをテンプレートの$footerとbindさせる。
		$footer = "";
		$template->footer = \View::forge('layouts/footer',$footer);
		
	}
}