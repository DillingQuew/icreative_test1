<div class="album py-5 bg-light">
<main class="container py-3 px-3 bg-light">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Дата рождения</th>
      <th scope="col">Почта</th>
      <th scope="col">Тип <br> аккаунта</th>
      <th scope="col">Удалить</th>
      <th scope="col">Редактировать</th>
    </tr>
  </thead>
  <tbody>

  <?php while($row = mysqli_fetch_assoc($data[0])):;?>
    <tr>
      <th><?php echo $row['id'];?></th>
      <td><?php echo $row['fname'];?></td>
      <td><?php echo $row['sname'];?></td>
      <td><?php echo $row['bdate'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php if ($row['is_admin'] == 1) {
         echo "Админ";
      } else {
         Echo "Пользователь";
      }
      ?>
       
      </td>
      <td>
         <form action='admin/delete' method='post'>
            <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
            <input type='submit'class="btn btn-danger" value='Удалить'>
         </form>
      </td>
      <td>
         <form action='admin/editor' method='post'>
            <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
            <input type='submit' class="btn btn-warning" value='Редактировать'>
         </form>
      </td>
    </tr>
    <?php endwhile;?>
  </tbody>
</table>

<nav aria-label="Page navigation example" class="d-flex justify-content-center">
  <ul class="pagination">
  <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
  <?php for ($i = 1; $i<=$data[1]; $i++):?>
      <li class="page-item"><a class="page-link" href="?pageno=<?= $i?>"> <?= $i?> </a></li>
   <?php endfor; ?>
  </ul>
</nav>

</main>
</div>