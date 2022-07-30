<?php

class Model_Auth extends Model
{
	
	public function get_data()
	{	
 //   session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
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
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $email = trim($email);
    $password = trim($password);
// подключаемся к базе
   include ("database/db.php");;// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
    $result = mysqli_query($db, "SELECT * FROM `users` WHERE email='$email'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);

    if (!empty($myrow)) {
		$hash = $myrow['password']; // соленый пароль из БД
		// Проверяем соответствие хеша из базы введенному паролю
		if (password_verify($_POST['password'], $hash)) {
			// все ок, авторизуем...
         $_SESSION['email']=$myrow['email']; 
         $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
         $_SESSION['admin']=$myrow['is_admin'];
         Header("Location: /");
         } else {
            exit('Пароль не подошёл');
         }
      } else {
         // пользователя с таким логином нет, выведем сообщение
         exit('Такого пользователя не существует');
      }
   }
}

