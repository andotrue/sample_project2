<?php
/*
 * http://w.builwing.info/2012/02/24/fuelphpのoilで簡単アプリケーション作成/
 * # php oil g scaffold sample2 tiltle:string content:text
 * # php oil refine migrate
 * # php oil g migration rename_table_sample2s_to_movies
 */
class Controller_Sample2 extends Controller_Template
{

	public function action_index()
	{
		$data['sample2s'] = Model_Movie::find('all');
		$this->template->title = "Sample2s";
		$this->template->content = View::forge('sample2/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('sample2');

		if ( ! $data['sample2'] = Model_Movie::find($id))
		{
			Session::set_flash('error', 'Could not find sample2 #'.$id);
			Response::redirect('sample2');
		}

		$this->template->title = "Sample2";
		$this->template->content = View::forge('sample2/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Movie::validate('create');

			if ($val->run())
			{
				$sample2 = Model_Movie::forge(array(
					'title' => Input::post('title'),
					'content' => Input::post('content'),
				));

				if ($sample2 and $sample2->save())
				{
					Session::set_flash('success', 'Added sample2 #'.$sample2->id.'.');

					Response::redirect('sample2');
				}

				else
				{
					Session::set_flash('error', 'Could not save sample2.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sample2S";
		$this->template->content = View::forge('sample2/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('sample2');

		if ( ! $sample2 = Model_Movie::find($id))
		{
			Session::set_flash('error', 'Could not find sample2 #'.$id);
			Response::redirect('sample2');
		}

		$val = Model_Movie::validate('edit');

		if ($val->run())
		{
			$sample2->title = Input::post('title');
			$sample2->content = Input::post('content');

			if ($sample2->save())
			{
				Session::set_flash('success', 'Updated sample2 #' . $id);

				Response::redirect('sample2');
			}

			else
			{
				Session::set_flash('error', 'Could not update sample2 #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$sample2->title = $val->validated('title');
				$sample2->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('sample2', $sample2, false);
		}

		$this->template->title = "Sample2s";
		$this->template->content = View::forge('sample2/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('sample2');

		if ($sample2 = Model_Movie::find($id))
		{
			$sample2->delete();

			Session::set_flash('success', 'Deleted sample2 #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete sample2 #'.$id);
		}

		Response::redirect('sample2');

	}
	
}
