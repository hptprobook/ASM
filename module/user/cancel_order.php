<?

if (isset($_POST['cancel-btn'])) {
  $reason = $_POST['reason'];
  $id = $_GET['id'];
  $data = array(
    'status' => 3,
    'note' => $reason
  );
  if ($database->update('user_cart_comp', $data, 'id = "' . $id . '"')) {
    header('Refresh: 1; URL= ?mod=user&act=order');
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
    <button type="submit" name="cancel-btn" class="btn btn-primary my-3">Cancel</button>
  </form>
</section>

<? $template->getFooter(); ?>