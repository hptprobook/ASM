<?

$order_list = $admin->get_list('SELECT * FROM user_cart_comp WHERE `status` = -1 OR `status` = 0 OR `status` = 1');
if (isset($_GET['notify_id'])) {
  $admin->update('admin_notify', array('status' => 1), 'id = "' . $_GET['notify_id'] . '"');
}

?>



<? getHeader(); ?>

<section>
  <h2 class="text-center pt-5">Danh sách đặt hàng</h2>

  <form action="?mod=order&act=remove_multi" method="post" class="container">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox" class="order__checkall"></th>
          <th>Tên khách hàng</th>
          <th>Giao đến</th>
          <th>Số điện thoại</th>
          <th>Email</th>
          <th>Ngày đặt hàng</th>
          <th>Ghi chú</th>
          <th class="text-center">Trạng thái</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>

        <? foreach ($order_list as $item) { ?>

          <tr style="height: 120px;">
            <td> <input type="checkbox" name="selected[]" class="order__check" value="<? echo $item['id'] ?>"> </td>
            <td><a href="?mod=order&act=detail&id=<? echo $item['id'] ?>"><? echo $item['ship_name'] ?></a></td>
            <td><? echo $item['ship_address'] ?></td>
            <td><? echo $item['ship_phone'] ?></td>
            <td><? echo $item['ship_email'] ?></td>
            <td><? echo $item['ship_date'] ?></td>
            <td><? echo $item['note'] ?></td>
            <td>
              <?if ($item['status'] == -1) {
                echo '<div class="text-warning">Chưa xác nhận</div>';
              } elseif ($item['status'] == 0) {
                echo '<div class="text-success">Đã xác nhận</div>';
              } elseif ($item['status'] == 1) {
                echo '<div class="text-info">Đang giao</div>';
              } else echo ''; ?>
            </td>
            <td>
              <? if ($item['status'] != 3) { ?>
                <?
                if ($item['status'] == -1) { ?>
                  <a class="btn mt-2 btn-success" href="?mod=order&act=confirm&id=<? echo $item['id'] ?>" title="Xác nhận đơn hàng"><i class="bi bi-check"></i></a>
                <? } ?>
                <?
                if ($item['status'] == 0) { ?>
                  <a class="btn mt-2 btn-primary" href="?mod=order&act=ship_confirm&id=<? echo $item['id'] ?>" title="Xác nhận giao hàng"><i class="bi bi-rocket"></i></a>
                <? } ?>

                <a class="btn mt-2 btn-warning" href="?mod=order&act=cancel&id=<? echo $item['id'] ?>" title="Huỷ đơn hàng này"><i class="bi bi-exclamation-lg"></i></a>

              <? } ?>
              <a class="btn mt-2 btn-danger" href="?mod=order&act=remove&id=<? echo $item['id'] ?>" title="Xoá đơn hàng này"><i class="bi bi-trash3"></i></i></a>
            </td>
          </tr>

        <? } ?>
      </tbody>
    </table>
    <button type="submit" name="order__remove--multi" class="btn btn-danger mb-5">Xoá nhiều</button>
  </form>
</section>












<? getFooter(); ?>