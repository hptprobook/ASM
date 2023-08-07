<?

require 'vendor/autoload.php';
$report = $database->get_row('SELECT * FROM report');

if (isset($_POST['cancel-btn'])) {
  $reason = $_POST['reason'];
  $id = $_GET['id'];
  $order_canceled = $report['order_canceled'];
  $order_processing = $report['order_processing'];
  $data = array(
    'status' => 3,
    'note' => $reason
  );
  if ($database->update('user_cart_comp', $data, 'id = "' . $id . '"')) {
    $database->update('report', array('order_canceled' => $order_canceled + 1), 'id = 1');
    $database->update('report', array('order_processing' => $order_processing - 1), 'id = 1');

    date_default_timezone_set('Asia/Bangkok');

    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        'ebd4b083a7bb57c525d6',
        '79eab78080c69e751ef5',
        '1646892',
        $options
    );

    $data = array(
        'subject' => 'Đơn hàng đã bị hủy',
        'content' => 'Có đơn hàng bị hủy, vào kiểm tra ngay!',
        'time' => date('Y-m-d H:i:s')
    );

    $database->insert('admin_notify', $data);
    $pusher->trigger('my-channel', 'cancel_order', $data);
    header('Refresh: 0.25; URL= ?mod=user&act=order');
    $is_cancel = true;
  };
}

?>


<? $template->getHeader(); ?>


<style>
  .form-group input {
    width: 100%;
    height: 52px;
    border: none;
    outline: none;
    background-color: #fafafa;
    color: #555;
    font-size: 14px;
    padding-left: 15px;
  }
  .title {
    font-size: 32px;
    font-weight: 600;
    color: #212121;
    letter-spacing: 1.5px;
    margin-top: 24px;
    margin-bottom: 12px;
  }
</style>

<section>
  <?
  if (isset($is_cancel) && $is_cancel) {
    echo '<div class="alert alert-primary text-center">Cancel Success <br>Redirecting...</div>';
  }
  ?>
  <form action="" method="post" class="w-25 m-auto">
    <h2 class="text-center title">Your Reason: </h2>
    <div class="form-group">
      <input type="text" name="reason" class="reason__input">
    </div>
    <button type="submit" name="cancel-btn" class="btn btn-primary my-3">SUBMIT</button>
  </form>
</section>

<? $template->getFooter(); ?>