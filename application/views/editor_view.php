<main class="form-signin" style="
  width: 60%;
  max-width: 600px;
  padding: 15px;
  margin: auto;
">
  <form method="POST" action="save_user">
    <h1 class="h3 mb-3 fw-normal">Редактировать</h1>
    <?php while($row = mysqli_fetch_assoc($data)):;?>
    <div class="form-floating mb-3">
    <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
      <input value="<?php echo $row['fname'];?>" type="text" name="fname" class="form-control" id="floatingInput" placeholder="Имя">
      <label for="floatingInput">Имя</label>
    </div>
    <div class="form-floating mb-3">
      <input value="<?php echo $row['sname'];?>" type="text" name="sname" class="form-control" id="floatingInput" placeholder="Фамилия">
      <label for="floatingInput">Фамилия</label>
    </div>
    <div class="form-floating mb-3">
      <input value="<?php echo $row['bdate'];?>" type="date" name="bdate" class="form-control" id="floatingInput" >
      <label for="floatingInput">Дата рождения</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" value="<?php echo $row['email'];?>" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">email</label>
    </div>
    <div class="form-check">
      
  <input class="form-check-input" name="admin" type="checkbox" id="flexCheckDefault" <?php if($row['is_admin']==1):?> Checked <?php endif?>>
  <label class="form-check-label" for="flexCheckDefault">
    Админка
  </label>
</div>
    <?php endwhile;?>
    <button class="w-50 btn btn-lg btn-success" type="submit">Сохранить</button>
  </form>
</main>