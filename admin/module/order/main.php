<?

$order_list = $admin->get_list('SELECT * FROM user_cart_comp');

?>



<? getHeader(); ?>

<section>
  <h2 class="text-center pt-5">Danh sách đặt hàng</h2>

  <div class="container">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
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
            <td><a href="?mod=order&act=detail&id=<? echo $item['id'] ?>"><? echo $item['ship_name'] ?></a></td>
            <td><? echo $item['ship_address'] ?></td>
            <td><? echo $item['ship_phone'] ?></td>
            <td><? echo $item['ship_email'] ?></td>
            <td><? echo $item['ship_date'] ?></td>
            <td><? echo $item['note'] ?></td>
            <td>
              <? if ($item['status'] == 0) {
                echo '<div class="text-warning">Đã xác nhận</div>';
              } elseif ($item['status'] == 1) {
                echo '<div class="text-info">Đang giao</div>';
              } elseif ($item['status'] == 2) {
                echo '<div class="text-success">Đã nhận hàng</div>';
              } elseif ($item['status'] == 3) {
                echo '<div class="text-danger">KH đã huỷ</div>';
              } else echo ''; ?>
            </td>
            <td>
              <a href="?mod=order&act=confirm" class="d-block" title="Xác nhận đơn hàng"><i class="bi bi-check"></i></a>
              <a href="?mod=order&act=ship_confirm" class="d-block" title="Xác nhận giao hàng"><i class="bi bi-rocket"></i></a>

              <a href="?mod=order&act=cancel" class="d-block" title="Huỷ đơn hàng này"><i class="bi bi-exclamation-lg"></i></a>
            </td>
          </tr>

        <? } ?>
      </tbody>
    </table>

</section>












<? getFooter(); ?>