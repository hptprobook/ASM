<?php

$admin_account = new DB_Driver();

if (isset($_POST['login-btn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $error = array();

  if (empty($username)) {
    $error['username'] = 'Tên đăng nhập không được để trống';
  }

  if (empty($password)) {
    $error['password'] = 'Mật khẩu không được để trống';
  }

  $acc_in_db = $admin_account->get_row('SELECT * FROM `admin` WHERE username = "' . $username . '"');

  if (empty($acc_in_db)) {
    $error['username'] = 'Tên đăng nhập không tồn tại';
  } else {
    if ($password !== $acc_in_db['password']) {
      $error['password'] = 'Mật khẩu không chính xác';
    }
  }

  if (empty($error)) {
    $_SESSION['is_admin_login'] = true;
    $_SESSION['admin_username'] = $username;
    header('Location: ?');
  }
}

function form_error($field) {
  global $error;
  if (isset($error[$field])) return $error[$field];
}

function set_value($value) {
  if (!empty($value) && isset($value)) echo $value;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admintrator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8 left p-0">
        <img src="https://romi-obrazovanjem-do-posla.org.rs/wp-content/uploads/2022/02/finance-1-scaled-1600x900-1-1.jpg" alt="">
      </div>

      <div class="col-md-4 ps-5 d-flex align-items-center">
        <div class="right w-100 pe-5">
          <h2>ADMIN</h2>
          <h6>Hệ thống quản trị Website</h6>
          <h5>Đăng nhập vào hệ thống</h5>

          <form action="" method="post">
            <div class="form-group">
              <label for="username" class="form-label">Tên đăng nhập</label>
              <input type="text" name="username" id="username" class="form-control"
                value="<? isset($username) ? (set_value($username)) : ''; ?>"
                >
              <span class="form-message text-danger"><? echo form_error('username') ?></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="password" name="password" id="password" class="form-control">
              <span class="form-message text-danger"><? echo form_error('password') ?></span>
            </div>

            <input type="submit" value="Đăng nhập" name="login-btn" class="btn btn-warning my-3">
          </form>

          <span>Xem Website <a href="../index.php">tại đây</a></span>
        </div>
      </div>
    </div>

  </div>
</body>

</html>