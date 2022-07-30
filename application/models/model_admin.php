<?php
class Model_Admin extends Model
{
	
	public function get_data()
	{	
      if (isset($_GET['pageno'])) {
         // Если да то переменной $pageno присваиваем его
         $pageno = $_GET['pageno'];
     } else { // Иначе
         // Присваиваем $pageno один
         $pageno = 1;
     }
     $pageno = stripslashes($pageno);
     $pageno = htmlspecialchars($pageno);
     $pageno = trim($pageno);
     // Назначаем количество данных на одной странице
     $size_page = 2;
     // Вычисляем с какого объекта начать выводить
     $offset = ($pageno-1) * $size_page;


      include ("database/db.php");

      $result = mysqli_query($db,"SELECT COUNT(*) FROM `users`");
      // $total_rows = mysqli_fetch_array($result)[0];
      $total_rows = mysqli_fetch_row($result)[0];
      $total_pages = ceil($total_rows / $size_page);


      $result = mysqli_query($db,"SELECT * FROM `users` LIMIT $offset, $size_page");
      return array(
         $result,
         $total_pages
      );
	}

   public function get_user()
   {
      if (isset($_POST['id'])) 
      {
         // Если да то переменной $pageno присваиваем его
         include ("database/db.php");
         $result = mysqli_query($db,"SELECT * FROM `users` WHERE id='{$_POST['id']}'");
         return $result;
      }
   }


   public function save_user() {
      include ("database/db.php");

      $result = mysqli_query($db,"SELECT * FROM `users` WHERE id='{$_POST['id']}'");

      $id = mysqli_fetch_assoc($result)['id'];



       if (isset($_POST['email'])) { 
  
         $email = $_POST['email']; 
         
         if ($email == '') { 
            unset($email);
         } 
      } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
       
       //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
      
       $admin = $_POST['admin'];
       if ($admin=="on") {
         $admin = 1;
       } else {
         $admin = 0;
       }
       //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
       $fname = $_POST['fname'];
       $sname = $_POST['sname'];
       $bdate = $_POST['bdate'];
       // обработка данных
       $fname = stripslashes($fname);
       $sname = stripslashes($sname);
       $email = stripslashes($email);
 
       $fname = htmlspecialchars($fname);
       $sname = htmlspecialchars($sname);
       $email = htmlspecialchars($email);
       
    //удаляем лишние пробелы
       $fname = trim($fname);
       $sname = trim($sname);
       $email = trim($email);
       $password = trim($password);
       
       if (empty($email) or (empty($fname) or (empty($sname)))) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
       {
       exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
       }
       $result2 = mysqli_query($db, 
       "UPDATE users SET 
       fname='$fname', 
       sname =  '$sname',
       bdate = '$bdate', 
       email =  '$email',
       is_admin = $admin WHERE id=$id");
       // Проверяем, есть ли ошибки
       
       if ($result2 == 'TRUE')
       {
          Header("Location: /admin");
          // echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='/'>Главная страница</a>";
       }
       else {
          echo "Ошибка! Данные не сохранены.";
          echo mysqli_error($db);
       }
    }
}
