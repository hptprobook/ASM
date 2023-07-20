<? $template->getHeader();?>

<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <h2 class="text-center">PROFILE</h2>
  </div>
</section>

<section class="shop-container grid wide">
  <?

  $user = $database->get_row('SELECT * FROM users WHERE username = "' . $_SESSION['username'] . '"');
  if (isset($_POST['profile-btn'])) {
    $email = $_POST['email'];
    $name = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $data = array(
      'email' => $email,
      'name' => $name,
      'address' => $address,
      'phone' => $phone
    );

    $database->update('users', $data, 'username="'.$user['username'].'"');
    echo '<div class="alert alert-primary">Update Success</div>';
  }

  ?>

  <h2 class="profile-heading">PROFILE</h2>

  <form action="" method="post" class="profile-form w-50">
    <div class="form-group">
      <label for="profile-username">Username...</label>
      <input type="text" name="username" readonly class="" id="profile-username"
      value="<? echo $user['username'] ?>"
      >
      <span class="form-message"></span>
    </div>
    <div class="form-group">
      <label for="profile-email">Email...</label>
      <input type="text" name="email" value="<? echo $user['email'] ?>" class="" id="profile-email">
      <span class="form-message"></span>
    </div>
    <div class="form-group">
      <label for="profile-fullname">Full name...</label>
      <input type="text" name="fullname" value="<? echo $user['name'] ?>" class="" id="profile-fullname">
      <span class="form-message"></span>
    </div>
    <div class="form-group">
      <label for="profile-address">Address...</label>
      <input type="text" name="address" value="<? echo $user['address'] ?>" class="" id="profile-address">
      <span class="form-message"></span>
    </div>
    <div class="form-group">
      <label for="profile-phone">Phone Number...</label>
      <input type="text" name="phone" value="<? echo $user['phone'] ?>" class="" id="profile-phone">
      <span class="form-message"></span>
    </div>
    <button type="submit" name="profile-btn" class="profile-btn">SAVE</button>
    <a href="?mod=user&act=logout" class="profile-logout">LOG OUT</a>
  </form>

</section>


<? $template->getFooter();?>