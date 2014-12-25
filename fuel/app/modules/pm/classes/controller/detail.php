<?php
namespace pm;

 class Controller_Detail extends Controller_Public
{
	public $template = 'layouts/template';
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!

		$this->template->js = isset($this->template->js)? $this->template->js : array();
		array_push($this->template->js, 'CaptionerJs/CaptionerJs.min.js'
		);
		
		$this->template->css = isset($this->template->css)? $this->template->css : array();
		array_push($this->template->css, 'CaptionerJs/CaptionerJs.min.css'
										//,'HoverEffectIdeas/css/normalize.css'
										//,'HoverEffectIdeas/css/demo.css'
										,'HoverEffectIdeas/css/set2.css'
										//,'HoverEffectIdeas/fonts/font-awesome-4.2.0/css/font-awesome.min.css'
		);

	}
	
	/*
     * $response をパラメータとして追加し、after() を Controller_Template 互換にする
	　*/
	public function after($response)
	{
		$response = parent::after($response); // あなた自身のレスポンスオブジェクトを作成する場合は必要ありません。
		// do stuff		
		return $response; // after() は確実に Response オブジェクトを返すように
	}
	
	public function action_index() {
		$id = \Input::get("id");
		
		//データ取得
		$article = Model_Magazine::find($id);//結果はモデルクラスのオブジェクトとして返ります。
		//Debug::dump($article);

		$this->template->title = "各紙紹介　詳細　｜パズルメイト" . $article['title'];

		$content['article'] = $article;
		$this->template->content = \View::forge('detail',$content);


	}

}
