<?php
namespace pm;

 class Controller_Register extends Controller_Public
{
	/*
	 * 
	 */	public function before()
	{
		parent::before();// この行がないと、テンプレートが動作しません!

		$this->template->js = isset($this->template->js)? $this->template->js : array();
		array_push($this->template->js, 'validationEngine/jquery.validationEngine.js'
											,'validationEngine/jquery.validationEngine-ja.js'
//											,'ajaxzip3/ajaxzip3.js'
											,'https://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3-https.js'
		);
		
		$this->template->js2 = isset($this->template->js2)? $this->template->js2 : array();
		array_push($this->template->js2, 'FlowupLabels/jquery.FlowupLabels.min.js'
											,'FlowupLabels/main.js'
		);
		
		$this->template->css = isset($this->template->css)? $this->template->css : array();
		array_push($this->template->css, 'validationEngine/validationEngine.jquery.css'
											,'FlowupLabels/jquery.FlowupLabels.min.css'
											,'FlowupLabels/main.css'
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
		$this->template->title = "会員登録｜パズルメイト";

		$content['article'] = "";
		$this->template->content = \View::forge('register/index',$content);
	}

	public function action_confirm()
	{
		$this->template->title = "会員登録｜パズルメイト";
		//\Debug::dump($_POST);
		
		//$val = $this->forge_validation();
		$val = $this->forge_validation()->add_callable('MyValidationRules');
		
		if($val->run()){
			$data['input'] = $val->validated();
			$this->template->title = '会員登録｜パズルメイト: 確認';
			$this->template->content = \View::forge('register/confirm', $data);
		}
		else{
			$this->template->title = '会員登録｜パズルメイト: エラー';
			$this->template->content = \View::forge('register/index');
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
		
		//usernameの重複チェック
		$email = \Input::post('email');
		$same_users = \DB::select()->from('users')->where('username', $email)->execute();
		if($same_users->count() > 0)
		{
			$this->template->title = '会員登録｜パズルメイト';
			$this->template->content = \View::forge('register/index');
			$this->template->content->set_safe('html_error', "既に登録されてるメールアドレスです。");
			return;
		}
	}

	public function action_send()
	{
		$this->template->title = "会員登録｜パズルメイト";
		//\Debug::dump($_POST);
		//exit;
		
		//CSRF対策
		if( ! \Security::check_token())
		{
			//throw new \HttpInvalidInputException('ページ遷移が正しくありません');
			$this->template->title = '会員登録｜パズルメイト: エラー';
			$this->template->content = \View::forge('register/index');
			$this->template->content->set_safe('html_error', 'ページ遷移が正しくありません');
			return;
		}
		
		$val = $this->forge_validation()->add_callable('MyValidationRules');//add 20141210 by ando
		
		if( ! $val->run())
		{
			$this->template->title = '会員登録｜パズルメイト';
			$this->template->content = \View::forge('register/index');
			$this->template->content->set_safe('html_error', $val->show_errors());
			return;
		}
		else
		{
			$name = \Input::post('name');
			$furigana = \Input::post('furigana');
			$birthdate = \Input::post('birthdate');
			$gender = \Input::post('gender');
			$age = \Input::post('age');
			$zipcode = \Input::post('zipcode');
			$address = \Input::post('address');
			$building = \Input::post('building');
			$tel = \Input::post('tel');
			$email = \Input::post('email');
			$password = \Input::post('password');
			
			/*
			$profile_fields = array(
								'furigana'=>$furigana,
								'birthdate'=>$birthdate,
								'gender'=>$gender,
								'age'=>$age,
								'zipcode'=>$zipcode,
								'address'=>$address,
								'building'=>$building,
								'tel'=>$tel,
								);
			
			
	 		// Authのインスタンス化
	 		$auth = \Auth::instance();
			// 新しいユーザーを作成
			$auth->create_user($email,$password,$email,1,$profile_fields);
			*/
			
			//usernameの重複チェック
			$same_users = \DB::select()->from('users')->where('username', $email)->execute();
			if($same_users->count() > 0)
			{
				$this->template->title = '会員登録｜パズルメイト';
				$this->template->content = \View::forge('register/index');
				$this->template->content->set_safe('html_error', "既に登録されてるメールアドレスです。");
				return;
			}
			//DB登録処理
	 		$auth = \Auth::instance();// Authのインスタンス化
			$data = array(
						'username'=>$email,
						'password'=>$auth->hash_password((string) $password),
						'email'=>$email,
						'furigana'=>$furigana,
						'birthdate'=>$birthdate,
						'gender'=>$gender,
						'age'=>$age,
						'zipcode'=>$zipcode,
						'address'=>$address,
						'building'=>$building,
						'tel'=>$tel,
						);
			list($insert_id, $rows_affected) = \DB::insert('users')->set($data)->execute();
		}
		
		$this->template->title = ('会員登録｜パズルメイト:　登録完了');
		$this->template->content = \View::forge('register/send');
		return;
	}

	/*
	 *検証ルール
	 */
	public function forge_validation()
	{
		$val = \Validation::forge();
		
		//お名前
		$val->add('name','お名前')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',50);
		//フリガナ
		$val->add('furigana','フリガナ')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',50);
		//生年月日
		$val->add('birthdate','生年月日')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',8);
		//性別
		$val->add('gender','性別')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',8);
		//年齢
		$val->add('age','年齢')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',3);
		//郵便番号
		$val->add('zipcode','郵便番号')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('min_length',7)
		->add_rule('max_length',7);
		//住所
		$val->add('address','住所')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',256);
		//建物
		$val->add('building','建物')
		->add_rule('trim')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',256);
		//TEL
		$val->add('tel','TEL')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',11);
		//Eメール
		$val->add('email','メールアドレス')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',100)
		->add_rule('valid_email');
		//パスワード
		$val->add('password','パスワード')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',10);
		//パスワード(確認)
		$val->add('passwordrm','パスワード（確認）')
		->add_rule('trim')
		->add_rule('required')
		->add_rule('no_tab_and_newline')
		->add_rule('max_length',10);
		
		return $val;
	}
	
	
	
}
