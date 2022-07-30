<?php

class Model_Save_User extends Model
{
	
	public function get_data()
	{	
      // session_start();
      if (isset($_POST['email'])) { 
  
        $email = $_POST['email']; 
        
        if ($email == '') { 
           unset($email);
        } 
     } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
      
     if (isset($_POST['password'])) {

         $password=$_POST['password']; 

         if ($password =='') {
            unset($password);
           } 
      }
      //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
      if (empty($email) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
      {
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
      }
      //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
      $fname = $_POST['fname'];
      $sname = $_POST['sname'];
      $bdate = $_POST['bdate'];
      $rpassword = $_POST['rpassword'];
      // обработка данных
      $fname = stripslashes($fname);
      $sname = stripslashes($sname);
      $email = stripslashes($email);
      $password = stripslashes($password);
      $rpassword = stripslashes($rpassword);

      $fname = htmlspecialchars($fname);
      $sname = htmlspecialchars($sname);
      $email = htmlspecialchars($email);
      $password = htmlspecialchars($password);
      $rpassword = htmlspecialchars($rpassword);
      
   //удаляем лишние пробелы
      $fname = trim($fname);
      $sname = trim($sname);
      $email = trim($email);
      $password = trim($password);
      $rpassword = trim($rpassword);
      if ($password != $rpassword) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
      {
      exit ("Пароли не совпадают");
      }

      $password = password_hash($password, PASSWORD_DEFAULT);
      
   // подключаемся к базе
      include ("database/db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
   // проверка на существование пользователя с таким же логином
      $result = mysqli_query($db, "SELECT id FROM `users` WHERE email = '$email'");
     //  echo "{$result}";
      $myrow = mysqli_fetch_array($result);
     //  echo $myrow;
      if (!empty($myrow['id'])) {
      exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
      }
      $result2 = mysqli_query($db, "INSERT INTO users (fname, sname, bdate, email, password) VALUES ('$fname', '$sname', '$bdate', '$email', '$password')");
      ;
      // Проверяем, есть ли ошибки
      
      if ($result2 == 'TRUE')
      {
         Header("Location: /");
         // echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='/'>Главная страница</a>";
      }
      else {
         echo "Ошибка! Вы не зарегистрированы.";
         echo mysqli_error($db);
      }
	}

}
