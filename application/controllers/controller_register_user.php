<?php
class Controller_Register_User extends Controller
{
	function action_index()
	{	
		$this->view->generate('register_user_view.php', 'template_view.php');
	}
}
?>