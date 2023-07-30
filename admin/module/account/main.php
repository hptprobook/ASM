<?

$users_list = $admin->get_list('SELECT * FROM `users`');

?>



<?
getHeader();
?>

<section style="min-height:500px">

  <h2 class="ps-3">Danh sách tài khoản đã đăng kí</h2>

  <form action="?mod=account&act=remove_multi" method="post" class="container">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox" class="account__checkall"></th>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Fullname</th>
          <th style="width: 200px;">Address</th>
          <th>Phone</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?
        foreach ($users_list as $user) { ?>
          <tr>
            <td><input type="checkbox" class="account__check" name="selected[]" value="<? echo $user['user_id'] ?>" ></td>
            <td><? echo $user['user_id'] ?></td>
            <td><? echo $user['username'] ?></td>
            <td><? echo $user['email'] ?></td>
            <td><? echo $user['name'] ?></td>
            <td><? echo $user['address'] ?></td>
            <td><? echo $user['phone'] ?></td>
            <td><a class="btn btn-danger" href="?mod=account&act=delete&id=<? echo $user['user_id']; ?>"><i class="bi bi-trash3"></i></a></td>
          </tr>

        <? } ?>



      </tbody>
    </table>

    <button type="submit" name="account__remove--multi" class="btn btn-danger mb-5">Xoá nhiều</button>

  </form>


</section>

<?
getFooter();
?>