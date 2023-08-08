<?php

$admin = new DB_Driver();

$admin_notify = $admin->get_list('SELECT * FROM admin_notify ORDER BY id DESC');
$admin_notify_seen = $admin->get_list('SELECT * FROM admin_notify WHERE `status` = 0');
$cnt = 0;
foreach ($admin_notify_seen as $value) {
  $cnt++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang quản trị Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css"> -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <script rel="stylesheet" href="../node_modules/bootstrap/dist/js/bootstrap.css"></script>
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./libs/ckeditor/ckeditor/ckeditor.js"></script>
  <script src="../../node_modules/chart.js/dist/chart.js"></script>
</head>

<body>
  <div id="root">

    <div class="notification-overlay">
      <div class="notification">
        <i class="bi bi-x notification-close"></i>
        <h3 class="notification-title text-center my-4">Thông báo</h3>
        <div class="notification-list">

          <? foreach ($admin_notify as $notification) { ?>
            <a href="?mod=order&act=main&notify_id=<? echo $notification['id'] ?>" class="text-decoration-none">
              <div class="notification-item <? if ($notification['status'] == 1) echo 'seen' ?>">
                <div class="notification-item__icon">
                  <i class="bi bi-envelope<? if ($notification['status'] == 1) echo '-open' ?>"></i>
                </div>
                <div class="notification-item__text">
                  <h2 class="notification-item__text--subject"><? echo $notification['subject'] ?> <span><? echo $notification['time'] ?></span> </h2>
                  <p class="notification-item__text--content"><? echo $notification['content'] ?></p>
                </div>
              </div>
            </a>
          <? } ?>
        </div>

      </div>
    </div>

    <div class="new--notification-overlay">
      <div class="new--notification">
        <i class="bi bi-x new--notification-close"></i>
        <h3 class="new--notification-title text-center my-4">Thông báo</h3>
        <div class="new--notification-list">Có đơn hàng mới, xem ở trong phần thông báo</div>
        <a href="" class="btn btn-success mt-4">OK</a>
      </div>
    </div>

    <div class="cancel__notification--overlay">
      <div class="cancel--notification">
        <i class="bi bi-x cancel--notification-close"></i>
        <h3 class="cancel--notification-title text-center my-4">Thông báo</h3>
        <div class="cancel--notification-list">Có đơn hàng bị hủy, xem ở thông báo</div>
        <a href="" class="btn btn-success mt-4">OK</a>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 px-0 m-0" style="width:22.5%;">
          <div class="sidebar bg-dark nav__sidebar">
            <h1 class="text-center pt-3 sidebar__title">ADMIN</h1>
            <h4 class="text-center text-white">Hệ thống quản trị</h4>
            <ul class="nav flex-column mt-5">
              <li class="nav-item">
                <a class="nav-link text-white" href="?mod=report">
                  <i class="bi bi-flag"></i>
                  Báo cáo thống kê
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="?mod=account">
                  <i class="bi bi-person-vcard"></i>
                  Quản lí tài khoản
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="?mod=up_post" data-bs-toggle="collapse" data-bs-target="#post" aria-expanded="false" aria-controls="post">
                  <i class="bi bi-newspaper"></i>
                  Quản lí bài viết
                </a>
                <div class="collapse ps-4" id="post">
                  <a href="?mod=up_post&act=list" class="nav-link text-white">
                    <i class="bi bi-card-checklist"></i>
                    Danh sách bài viết
                  </a>
                  <a href="?mod=up_post&act=add" class="nav-link text-white">
                    <i class="bi bi-journal-plus"></i>
                    Thêm bài viết
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="?mod=up_product" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                  <i class="bi bi-bag-dash-fill"></i>
                  Quản lí sản phẩm
                </a>
                <div class="collapse ps-4" id="product">
                  <a href="?mod=category&act=show" class="nav-link text-white">
                    <i class="bi bi-card-checklist"></i>
                    Danh mục
                  </a>
                  <a href="?mod=up_product&act=list" class="nav-link text-white">
                    <i class="bi bi-card-checklist"></i>
                    Danh sách sản phẩm
                  </a>
                  <a href="?mod=up_product&act=add" class="nav-link text-white">
                    <i class="bi bi-bag-plus-fill"></i>
                    Thêm sản phẩm
                  </a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="?mod=order&act=success" data-bs-toggle="collapse" data-bs-target="#order" aria-expanded="false" aria-controls="order">
                  <i class="bi bi-bag-dash-fill"></i>
                  Đơn hàng
                </a>
                <div class="collapse ps-4" id="order">
                  <a href="?mod=order&act=main" class="nav-link text-white">
                    <i class="bi bi-card-checklist"></i>
                    Đang xử lý
                  </a>
                  <a href="?mod=order&act=success" class="nav-link text-white">
                    <i class="bi bi-card-checklist"></i>
                    Đã xong
                  </a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="#">
                  <i class="bi bi-gear-fill"></i>
                  Thiết lập thông tin
                </a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-md-9 px-0 m-0" style="width: 77.5%;">
          <header class="header">
            <span class="header__username ms-4">Xin chào, <? echo $_SESSION['admin_username'] ?>!</span>
            <div class="header__handle d-flex">
              <div class="dropdown px-3">
                <a class="dropdown-toggle header__handle--setting" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-gear-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3">
                  <li><a class="dropdown-item" href="#">
                      <i class="bi bi-person-fill-gear"></i>
                      Thông tin admin
                    </a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="?mod=user&act=changepass">
                      <i class="bi bi-key"></i>
                      Đổi mật khẩu
                    </a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">
                      <i class="bi bi-trash"></i>
                      Xoá bộ nhớ đệm
                    </a></li>
                </ul>
              </div>

              <div class="dropdown px-3">
                <a class="dropdown-toggle header__handle--setting" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-bell-fill"></i>
                  <span class="bg-danger"><? echo $cnt ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3">
                  <li class="text-center"><span>
                      Thông báo
                    </span></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item main-notify" href="#">
                      Chính <span class="text-danger">(<? echo $cnt ?>)</span>
                    </a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">
                      Đăng kí nhận tin nhắn
                    </a></li>
                </ul>
              </div>

              <a href="?mod=user&act=logout" class="px-3 header__handle--logout">
                <i class="bi bi-box-arrow-left"></i>
                Đăng xuất
              </a>
            </div>
          </header>