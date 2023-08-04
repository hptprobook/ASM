<? getHeader(); ?>

<? 

$report = $admin->get_row('SELECT * FROM report');
$user_cart_comp = $admin->get_list('SELECT * FROM user_cart_comp WHERE `status` = 2');
$revenue = 0;
foreach ($user_cart_comp as $value) {
  $revenue += $value['subtotal'];
}

$admin->update('report', array('revenue' => $revenue), 'id = 1');

?>

<section class="container report">
  <div class="row">
    <div class="col-md-3">
      <div class="report__success">
        <h3>Đơn hàng thành công</h3>
        <hr>
        <span><? echo $report['order_success'] ?></span>
        <p>Tổng số đơn hàng thành công</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="report__processing">
        <h3 class="">Đơn hàng đang xử lý</h3>
        <hr>
        <span><? echo $report['order_processing'] ?></span>
        <p>Số đơn hàng đang xử lý</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="report__revenue">
        <h3>Tổng doanh thu</h3>
        <hr>
        <span>$<? echo $report['revenue'] ?></span>
        <p>Tổng doanh thu</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="report__cancel">
        <h3>Đơn hàng bị huỷ</h3>
        <hr>
        <span><? echo $report['order_canceled'] ?></span>
        <p>Tổng số đơn hàng bị huỷ</p>
      </div>
    </div>
  </div>
</section>

<? getFooter(); ?>