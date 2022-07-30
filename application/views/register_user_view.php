<div class="py-5 bg-light">
<main class="form-signin" style="
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
">
  <form method="POST" action="save_user">
    <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

    <div class="form-floating mb-3">
      <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="Имя">
      <label for="floatingInput">Имя</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="sname" class="form-control" id="floatingInput" placeholder="Фамилия">
      <label for="floatingInput">Фамилия</label>
    </div>
    <div class="form-floating mb-3">
      <input type="date" name="bdate" class="form-control" id="floatingInput" >
      <label for="floatingInput">Дата рождения</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="rpassword" class="form-control" id="floatingPassword" placeholder="Повторите пароль">
      <label for="floatingPassword">Повторите пароль</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
  </form>
</main>
</div>