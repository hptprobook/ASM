<? $template->getHeader(); ?>

<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <h2 class="text-center">PROFILE</h2>
  </div>
</section>

<section class="shop-container grid wide">
  <? $user = $database->get_row('SELECT * FROM users WHERE username = "' . $_SESSION['username'] . '"'); ?>

  <h2 class="profile-heading">PROFILE</h2>

  <form class="profile-form w-50">
    <div class="form-group">
      <label for="profile-username">Username...</label>
      <input type="text" name="username" readonly class="" id="profile-username" value="<? echo $user['username'] ?>">
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
    <button class="profile-changepass btn btn-primary">CHANGE PASSWORD</button>
    <a href="?mod=user&act=logout" class="profile-logout">LOG OUT</a>
  </form>


</section>
<div class="changepass-form-overlay">
  <form class="changepass-form">
    <i class="bi bi-x changepass-form-close"></i>
    <input type="hidden" name="user_id" id="changepass__user_id" value="<? echo $user['user_id'] ?>">
    <div class="form-group">
      <label for="old-password" class="form-label">Old Password</label>
      <input type="password" name="old-password" class="old-password" id="old-password">
      <span class="form-message"></span>
    </div>

    <div class="form-group">
      <label for="new-password" class="form-label">New Password</label>
      <input type="password" name="new-password" class="new-password" id="new-password">
      <span class="form-message"></span>
    </div>

    <div class="form-group">
      <label for="renew-password" class="form-label">Retype new Password</label>
      <input type="password" name="renew-password" class="renew-password" id="renew-password">
      <span class="form-message"></span>
    </div>

    <button name="changepass-btn" type="submit" class="btn btn-primary changepass-btn mt-4">CHANGE</button>
  </form>
</div>

<div class="changepass-notify-overlay">
  <div class="changepass-notify">
    <p>Password changed!</p>
    <button class="btn btn-primary float-end">Submit</button>
  </div>
</div>

<div class="save-profile-notify-overlay">
  <div class="save-profile-notify">
    <p>Save info successfully!</p>
    <a href="" class="btn btn-primary float-end">Submit</a>
  </div>
</div>


<? $template->getFooter(); ?>