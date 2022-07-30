<?php
class Controller_Logout extends Controller
{
	function action_index()
	{	
      session_destroy();
      Header("Location: /");
		// $this->view->generate('logout_view.php', 'template_view.php');
	}
}
?>