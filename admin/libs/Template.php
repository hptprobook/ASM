<?

function getHeader($module = "") {
  if (!empty($module)) {
    $path = 'inc/Header-' . $module . '.php';
  } else {
    $path = 'inc/Header.php';
  }
  if (file_exists($path)) require $path;
  else echo '404 NOT FOUND!';
}

function getFooter() {
  $path = 'inc/Footer.php';
  if (file_exists($path)) require $path;
  else echo '404 NOT FOUND!';
}