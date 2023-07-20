<?

unset($_SESSION['is_login']);
unset($_SESSION['username']);


echo '<div class="alert alert-primary text-center">Log out Successfully! Redirecting...</div>';
header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Winter Holiday</title>
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

</body>
</html>
