<?php
class Controller_Flashdrives extends Controller_Template {
	
	public function action_index()
	{
		$data['flashdrives'] = Model_Flashdrives::find('all');
		$this->template->title = "Flashdrives";
		$this->template->content = View::factory('flashdrives/index', $data);
	}
	
	public function action_view($id = null)
	{
		$data['flashdrives'] = Model_Flashdrives::find($id);
		$this->template->title = "Flashdrives";
		$this->template->content = View::factory('flashdrives/view', $data);
	}
	
	public function action_create($id = null)
	{
		if ($_POST)
		{
			$flashdrives = Model_Flashdrives::factory(array(
				'name' => Input::post('name'),
				'brand' => Input::post('brand'),
				'capacity' => Input::post('capacity'),
				'price' => Input::post('price'),
				'description' => Input::post('description'),
			));

			if ($flashdrives and $flashdrives->save())
			{
				Session::set_flash('notice', 'Added ' . $flashdrives . ' #' . $flashdrives->id . '.');

				Output::redirect('flashdrives');
			}

			else
			{
				Session::set_flash('notice', 'Could not save flashdrives.');
			}
		}

		$this->template->title = "Flashdrives";
		$this->template->content = View::factory('flashdrives/create');
	}
	
	public function action_edit($id = null)
	{
		$flashdrives = Model_Flashdrives::find($id);

		if ($_POST)
		{
			$flashdrives->name = Input::post('name');
			$flashdrives->brand = Input::post('brand');
			$flashdrives->capacity = Input::post('capacity');
			$flashdrives->price = Input::post('price');
			$flashdrives->description = Input::post('description');

			if ($flashdrives->save())
			{
				Session::set_flash('notice', 'Updated ' . $flashdrives . ' #' . $flashdrives->id);

				Output::redirect('flashdrives');
			}

			else
			{
				Session::set_flash('notice', 'Could not update ' . $flashdrives . ' #' . $id);
			}
		}
		
		else
		{
			$this->template->set_global('flashdrives', $flashdrives);
		}
		
		$this->template->title = "Flashdrives";
		$this->template->content = View::factory('flashdrives/edit');
	}
	
	public function action_delete($id = null)
	{
		$flashdrives = Model_Flashdrives::find($id);

		if ($flashdrives and $flashdrives->delete())
		{
			Session::set_flash('notice', 'Deleted drive #' . $id);
		}

		else
		{
			Session::set_flash('notice', 'Could not delete drive #' . $id);
		}

		Output::redirect('flashdrives');
	}
	
	
}

/* End of file flashdrives.php */