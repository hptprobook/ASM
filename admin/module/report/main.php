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
        <h3><a class="text-white text-decoration-none" href="?mod=report&act=chart_success">Đơn hàng thành công</a></h3>
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
        <h3><a class="text-white text-decoration-none" href="?mod=report&act=chart_revenue">Tổng doanh thu</a></h3>
        <hr>
        <span>$<? echo $report['revenue'] ?></span>
        <p>Tổng doanh thu</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="report__cancel">
        <h3><a class="text-white text-decoration-none" href="?mod=report&act=chart_cancel">Đơn hàng bị huỷ</a></h3>
        <hr>
        <span><? echo $report['order_canceled'] ?></span>
        <p>Tổng số đơn hàng bị huỷ</p>
      </div>
    </div>
  </div>
</section>



<? getFooter(); ?>