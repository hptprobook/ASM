<?

if (isset($_POST['reason-btn'])) {
  $reason = $_POST['reason'];
  $error = array();

  if (empty($reason)) $error['reason'] = 'Trường này không được để trống';

  if (empty($error)) {
    $data = array(
      'status' => 4,
      'note' => $reason
    );
    if ($admin->update('user_cart_comp', $data, 'id="' . $_GET['id'] . '"')) {
      $is_cancel = true;
      header("Refresh: 0.5; URL=?mod=order&act=main");
    }
  }
}

?>

<? getHeader(); ?>

<section style="min-height: 500px;">

  <?

  if (isset($is_cancel) && $is_cancel) {
    echo '<div class="alert alert-success">Huỷ đơn hàng thành công</div>';
  }

  ?>

  <form action="" method="post" class="w-25 m-auto">
    <div class="form-group">
      <label for="reason" class="form-label">Lý do huỷ đơn hàng này</label>
      <input type="text" name="reason" id="reason" class="form-control"/>
      <span class="form-message"><? if (isset($error['reason'])) echo $error['reason'] ?></span>
    </div>

    <input type="submit" class="btn btn-warning mt-3" value="Xác nhận" name="reason-btn"/>
  </form>

</section>

<? getFooter(); ?>