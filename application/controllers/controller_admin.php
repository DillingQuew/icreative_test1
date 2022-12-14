<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index()
	{
      if ($_SESSION['admin']==1) {
         $data = $this->model->get_data();		
         $this->view->generate('admin_view.php', 'template_view.php', $data);
      }
      else {
         exit("Не все так просто");
      }
	}

   function action_delete()
   {
      if ($_SESSION['admin']==1) {
         if(!empty($_POST['id'])){
            include ("database/db.php");
            mysqli_query($db, "DELETE FROM `users` WHERE id={$_POST['id']}");
            Header("Location: /admin");
         }
      }
      else {
         exit("Не все так просто");
      }
   }

   function action_editor() 
   {
      if ($_SESSION['admin']==1) {
      $data = $this->model->get_user();		
		$this->view->generate('editor_view.php', 'template_view.php', $data);
      }
      else {
         exit("Не все так просто");
      }
   }
   
   function action_save_user() 
   {
      if ($_SESSION['admin']==1) {
      $this->model->save_user();
      }
      else {
         exit("Не все так просто");
      }
   }
}