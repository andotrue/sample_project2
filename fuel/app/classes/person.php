<?php

Class person
{
	//プロパティ
	public $name;//名前
	private $gender;//性別
	private $birthdate;//生年月日
	
	//コンストラクタ
	public function __construct($name, $gender, $birthdate){
		$this->name = $name;
		$this->gender = $gender;
		$this->birthdate = $birthdate;
	}
	
	//性別を取得するメソッド
	public function get_gender(){
		return $this->gender;
	}
}