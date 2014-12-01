<?php
 class Controller_Sample4 extends Controller
 {
 	/*
 	 * http://w.builwing.info/2012/03/12/fuelphp%E3%81%AEfieldset%E3%81%A7e%E3%83%A1%E3%83%BC%E3%83%AB%E9%80%81%E4%BF%A1/
 	 */
	 public function action_index()
	 {
		 //フィールドセットのインスタンス化
		 $form=Fieldset::forge();
		 //属性値の登録
		 $textarea=array('type'=>'textarea','cols'=>40,'rows'=>5);
		 $submit=array('type'=>'submit', 'value' => '送信');
		 //新しいフィールドの作成
		 $form->add('to','宛先')->add_rule('valid_email')->add_rule('required');
		 $form->add('from','送信元')->add_rule('valid_email')->add_rule('required');
		 $form->add('subject','件名');
		 $form->add('body','内容',$textarea)->add_rule('required');
		 $form->add('submit','',$submit);
		 //入力値の保持
		 $form->repopulate();
		 //ビューオブジェクトの作成
		 $view=View::forge('sample4/test1');
		 $view->set_safe('mail_form',$form);

		 //バリデーションオブジェクトの取得
		 $val=$form->validation();

		 //バリデーションの実行
		 //検証OKの場合
		 if($val->run())
		 {
			 //POSTデータを受け取る
			 $to=Input::post('to');
			 $from=Input::post('from');
			 $subject=Input::post('subject');
			 $body=Input::post('body');
			 //メールオブジェクトの作成
			 $email=Email::forge();
			 //メール情報の設定
			 $email->to($to);
			 $email->from($from);
			 $email->subject($subject);
			 $email->body($body);
			//メール送信
			 $email->send();
			 //メール送信後のビュー表示
			 return Response::forge(View::forge('sample4/test2'));
		 //検証NGの場合
		 }else{
			 //バリデーションエラーの取得
			 $errors=$val->error();
			 $view->set('errors',$errors);
			 return $view;
		 }
	 }
	 
	 /*
	  * http://d.hatena.ne.jp/Kenji_s/20120130/1327911897
	  */
	 public function action_index3()
	 {
		 $form = Fieldset::forge();
		 
		 $form->add('name', '名前')
		 ->add_rule('trim')
		 ->add_rule('required')
		 ->add_rule('no_controll')
		 ->add_rule('max_length', 20);
		 
		 $form->add('email', 'メールアドレス')
		 ->add_rule('trim')
		 ->add_rule('required')
		 ->add_rule('no_controll')
		 ->add_rule('valid_email');
		 
		 $form->add('comment', 'コメント',
		 		array('type' => 'textarea', 'cols' => 70, 'rows' => 6))
		 		->add_rule('required')
		 		->add_rule('max_length', 400);
		 
		 $ops = array(
		 		'男性' => '男性',
		 		'女性' => '女性',
		 );
		 $form->add('gender', '性別',
		 		array('options' => $ops, 'type' => 'radio'))
		 		->add_rule('in_array', $ops);
		 
		 $ops = array(
		 		''                         => '',
		 		'製品購入前のお問い合わせ' => '製品購入前のお問い合わせ',
		 		'製品購入後のお問い合わせ' => '製品購入後のお問い合わせ',
		 		'その他'                   => 'その他',
		 );
		 $form->add('kind', '問い合わせの種類',
		 		array('options' => $ops, 'type' => 'select'))
		 		->add_rule('in_array', $ops);
		 
		 $ops = array(
		 		'PHP'    => 'PHP',
		 		'Perl'   => 'Perl',
		 		'Python' => 'Python',
		 );
		 $form->add('lang', '使用プログラミング言語',
		 		array('options' => $ops, 'type' => 'checkbox'))
		 		->add_rule('in_array', $ops)
		 		->add_rule('not_required_array');
		 
		 $form->add('submit', '', array('type'=>'submit', 'value' => '確認'));

		 //入力値の保持
		 $form->repopulate();
		 //ビューオブジェクトの作成
		 $view=View::forge('sample4/test3');
		 $view->set_safe('html_form',$form);
		 
		 return $view;
	 }
 
	 /*
	  * http://blog.fagai.net/2012/10/26/fuelphp_fieldset_1/
	  */
	 public function action_index4()
	 {
	 	$user_form = Fieldset::forge('user_form');
	 	$user_form->add('name', 'お名前', array('type'=>'text', 'size'=>40, 'value'=>'ここに名前が入ります'));
	 	$user_form->add('sex', '性別', array('type'=>'radio', 'options'=>array(1=>'男性', 2=>'女性'), 'value'=>1));
	 	$user_form->add('submit', '', array('type'=>'submit', 'value'=>'送信'));
	 	echo $user_form->build('member/send');
	 }
 }