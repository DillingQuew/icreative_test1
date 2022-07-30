<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Сайт</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous">
</head>
<body class="">
   <div class="container">
      <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="/" class="nav-link" aria-current="page">На главную</a></li>
          
          <?php if($_SESSION['admin'] == 1):?>
            <li class="nav-item"><a href="/admin" class="nav-link">Админ-панель</a></li>
          <?php endif; ?>
          <?php if(isset($_SESSION['id'])):?>
          <li class="nav-item"><a href="/logout" class="nav-link">Выйти</a></li>
          <?php else: ?>
          <li class="nav-item"><a href="register_user" class="nav-link">Регистрация</a></li>
          <li class="nav-item"><a href="login" class="nav-link">Авторизация</a></li>
          <?php endif; ?>
        </ul>
      </header>
   </div>
   <?php include 'application/views/'.$content_view; ?>
</body>
</html>