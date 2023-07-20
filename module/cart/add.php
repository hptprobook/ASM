<?
if (isset($_POST['add-to-cart'])) {
  $cart->add_cart($_SESSION['username'], $_POST['product_id'], $_POST['quantity']);
  $cart->get_order($_SESSION['username']);
}
$template->getHeader();
echo '<div class="alert alert-primary text-center">Add to cart successfully!</div>';
?>
<div class="d-flex justify-content-center mb-5">
  <a href="?mod=cart&act=show" class="btn btn-primary px-3 mt-5 me-2">VIEW CART</a>
  <a href="?mod=shop&act=main" class="btn btn-primary px-3 mt-5 ms-2">CONTINUE SHOPPING</a>
</div>
<?

$template->getFooter();

?>