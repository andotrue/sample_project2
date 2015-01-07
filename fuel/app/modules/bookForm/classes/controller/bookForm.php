<?php
namespace bookForm;

class Controller_bookForm extends Controller_Public
{
	//検証ルール
	public function forge_validation()
	{
		$val = \Validation::forge();
		
		$val->add('name','名前')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('no_tab_and_newline')	//add 20141210 by ando
			->add_rule('max_length',50);
		$val->add('email','メールアドレス')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('no_tab_and_newline')	//add 20141210 by ando
			->add_rule('max_length',100)
			->add_rule('valid_email');
		$val->add('comment','コメント')
			->add_rule('required')
			->add_rule('max_length', 400);
		
		return $val;
	}
	
	public function action_index(){
		$this->template->title = 'コンタクトフォーム';
		$this->template->content = \View::forge('form/index');
	}
	
	public function action_confirm()
	{
		//$val = $this->forge_validation();
		$val = $this->forge_validation()->add_callable('MyValidationRules');//add 20141210 by ando
		
		if($val->run()){
			$data['input'] = $val->validated();
			$this->template->title = 'コンタクトフォーム: 確認';
			$this->template->content = \View::forge('form/confirm', $data);
		}
		else{
			$this->template->title = 'コンタクトフォーム: エラー';
			$this->template->content = \View::forge('form/index');
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
	}
	
	public function action_send()
	{
		//CSRF対策
		if( ! \Security::check_token())
		{
			throw new \HttpInvalidInputException('ページ遷移が正しくありません');
		}
		
		//$val = $this->forge_validation();
		$val = $this->forge_validation()->add_callable('MyValidationRules');//add 20141210 by ando
		
		if( ! $val->run())
		{
			$this->template->title = 'コンタクトフォーム：　エラー';
			$this->template->content = \View::forge('form/index');
			$this->template->content->set_safe('html_error', $val->show_errors());
			return;
		}
		
		$post = $val->validated();
//		$data = $this->build_mail($post);

		$post['ip_address'] = \Input::ip();
		$post['user_agent'] = \Input::user_agent();
		unset($post['submit']);
		
		//データベースに保存
//		$model_form = Model_Form::forge()->set($post);
//		list($id, $rows) = $model_form->save();
		$model_form = Model_Form::forge($post);
		$ret = $model_form->save();
		
//		if ($rows != 1)
		if ( ! $ret)
		{
			\Log::error('データベース保存エラー', __METHOD__);
			
			$form->repopulate();
			$this->template->title = 'コンタクトフォーム: サーバエラー';
			$this->template->content = \View::forge('form/index');
			$html_error = '<p>サーバエラーが発生しました。</p>';
			$this->template->content->set_safe('html_error', $html_error);
			$this->template->content->set_safe('html_form', $form_build('form/confirm'));
		}
		
		//メールの送信
		try{
//			$this->sendmail($data);
			$mail = new Model_Mail();//Mailモデルをインスタンス化
			$mail->send($post);
			$this->template->title = ('コンタクトフォーム:　送信完了');
			$this->template->content = \View::forge('form/send');
			return;
		}
		catch (EmailValidationFailedException $e)
		{
			\Log::error('メール検証エラー:　' . $e->getMessage(), __METHOD__);
			$html_error = '<p>メールアドレスに誤りがあります。</p>';	
		}
		catch (EmailSendingFailedException $e)
		{
			\Log::error('メール送信エラー:　' . $e->getMessage(), __METHOD__);
			$html_error = '<p>メールを送信できませんでした。</p>';
		}
		
		$this->template->title('コンタクトフォーム送信:　エラー');
		$this->template->content = \View;;forge('form/index');
		$this->template->content->set_safe('html_error', $html_error);
	}

	/*
	 * Fieldsetクラスでフォームを作成
	 */
	public function forge_form()
	{
		$form = \Fieldset::forge();
		
		$form->add('name','名前')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('no_tab_and_newline')	//add 20141210 by ando
			->add_rule('max_length',50);
		$form->add('email','メールアドレス')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('no_tab_and_newline')	//add 20141210 by ando
			->add_rule('max_length',100)
			->add_rule('valid_email');
		$form->add('comment','コメント',
					array('type'=>'textarea','cols'=>70,'rows'=>6))
			->add_rule('required')
			->add_rule('max_length', 400);
		
		$form->add('submit', '', array('type'=>'submit', 'value'=>'確認'));
		
		return $form;
	}
	
	/*
	 * Fieldsetクラスの使用
	 */
	public function action_index2(){
		$form = $this->forge_form();
		
		if(\Input::method() === 'POST')
		{
			$form->repopulate();
		}
		
		$this->template->title = 'コンタクトフォーム';
		$this->template->content = \View::forge('form/index2');
		$this->template->content->set_safe('html_form', $form->build('bookForm/confirm2'));
	}

	/*
	 * Fieldsetクラスの使用
	 */
	public function action_confirm2()
	{
		$form = $this->forge_form();
		$val = $form->validation()->add_callable('MyValidationRules');//Validationメソッドの呼び出し
		
		if($val->run()){
			$data['input'] = $val->validated();
			$this->template->title = 'コンタクトフォーム: 確認';
			$this->template->content = \View::forge('form/confirm2', $data);
		}
		else{
			$form->repopulate();
			$this->template->title = 'コンタクトフォーム: エラー';
			$this->template->content = \View::forge('form/index2');
			$this->template->content->set_safe('html_error', $val->show_errors());
			$this->template->content->set_safe('html_form', $form->build('bookForm/confirm2'));
		}
	}
	
	/*
	 * Fieldsetクラスの使用
	 */
	public function action_send2()
	{
		//CSRF対策
		if( ! \Security::check_token())
		{
			throw new \HttpInvalidInputException('ページ遷移が正しくありません');
		}
	
		$form = $this->forge_form();
		$val = $form->validation()->add_callable('MyValidationRules');
		
		if( ! $val->run())
		{
			$this->repopulate();
			$this->template->title = 'コンタクトフォーム：　エラー';
			$this->template->content = \View::forge('form/index2');
			$this->template->content->set_safe('html_error', $val->show_errors());
			$this->template->content->set_safe('html_form',$form->build('bookForm/confirm2'));
			return;
		}
	
		$post = $val->validated();
//		$data = $this->build_mail($post);
	
		$post['ip_address'] = \Input::ip();
		$post['user_agent'] = \Input::user_agent();
		unset($post['submit']);
		
		//データベースに保存
//		$model_form = Model_Form::forge()->set($post);
//		list($id, $rows) = $model_form->save();
		$model_form = Model_Form::forge($post);
		$ret = $model_form->save();
		
//		if ($rows != 1)
		if ( ! $ret)
		{
			\Log::error('データベース保存エラー', __METHOD__);
			
			$form->repopulate();
			$this->template->title = 'コンタクトフォーム: サーバエラー';
			$this->template->content = \View::forge('form/index');
			$html_error = '<p>サーバエラーが発生しました。</p>';
			$this->template->content->set_safe('html_error', $html_error);
			$this->template->content->set_safe('html_form', $form_build('form/confirm'));
		}

		//メールの送信
		try{
//			$this->sendmail($data);
			$mail = new Model_Mail();//Mailモデルをインスタンス化
			$mail->send($post);
			$this->template->title = ('コンタクトフォーム:　送信完了');
			$this->template->content = \View::forge('form/send2');
			return;
		}
		catch (EmailValidationFailedException $e)
		{
			\Log::error('メール検証エラー:　' . $e->getMessage(), __METHOD__);
			$html_error = '<p>メールアドレスに誤りがあります。</p>';
		}
		catch (EmailSendingFailedException $e)
		{
			\Log::error('メール送信エラー:　' . $e->getMessage(), __METHOD__);
			$html_error = '<p>メールを送信できませんでした。</p>';
		}
	
		$this->repopulate();
		$this->template->title('コンタクトフォーム送信:　エラー');
		$this->template->content = \View;;forge('form/index2');
		$this->template->content->set_safe('html_error', $html_error);
		$this->template->content->set_safe('html_form',$form->build('bookForm/confirm2'));
	}	
}