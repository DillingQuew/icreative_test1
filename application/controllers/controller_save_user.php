<?php

class Controller_Save_User extends Controller
{

	function __construct()
	{
		$this->model = new Model_Save_User();
		$this->view = new View();
	}
	
	function action_index()
	{
		$this->model->get_data();		
		// $this->view->generate('save_user_view.php', 'template_view.php', $data);
	}
}