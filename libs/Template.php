<?

class Template {
  function getHeader($module = "") {
    if (!empty($module)) {
      $path = 'inc/header-' . $module . '.php';
    } else {
      $path = 'inc/header.php';
    }
    if (file_exists($path)) require $path;
    else echo '404 NOT FOUND!';
  }

  function getFooter() {
    $path = 'inc/footer.php';
    if (file_exists($path)) require $path;
    else echo '404 NOT FOUND!';
  }
}