<?
$template->getHeader();
?>
<div class="alert alert-error mb-5 text-center">404 NOT FOUND PAGES!</div>
<div class="w-100 d-flex justify-content-center mt-5">
  <a href="<? echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary mb-5 m-auto">Go back !</a>
</div>
<?
$template->getFooter();
?>