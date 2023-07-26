<?
$database = $GLOBALS['database'];
$user_obj = $GLOBALS['user_obj'];
$cart = $GLOBALS['cart'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tắt cache hoàn toàn -->
  <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="0">
  <title>Winter Holiday</title>
  <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="./node_modules/swiper/swiper-bundle.css">
  <link rel="stylesheet" href="./node_modules/aos/dist/aos.css">
  <link rel="stylesheet" href="./public/css/grid.css">
  <link rel="stylesheet" href="./public/css/base.css">
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="stylesheet" href="./public/css/validate.css">
  <link rel="stylesheet" href="./public/css/toast.css">
  <link rel="stylesheet" href="./public/css/responsive.css">
  <link rel="stylesheet" href="./public/css/html-destination.css">
  <link rel="stylesheet" href="./public/css/html-pages.css">
  <link rel="stylesheet" href="./public/css/html-shop.css">
  <link rel="stylesheet" href="./public/css/html-tour.css">


</head>

<body>
  <div id="root">

    <div id="toast-msg">

    </div>

    <div class="login-notification-modal">
      <div class="login-notification">
        <p>Login Successfully</p>
        <a href="" class="btn btn-primary float-end">OK</a>
      </div>
    </div>

    <div class="register-notification-modal">
      <div class="register-notification">
        <p>Register Successfully</p>
        <button class="btn btn-primary float-end register-notification-btn">Login</button>
      </div>
    </div>

    <div class="logout-notification-modal">
      <div class="logout-notification">
        <p>Logout Successfully</p>
        <a href="" class="btn btn-primary float-end">OK</a>
      </div>
    </div>

    <div class="move-top"><a href="#" class="move-top__link">Top</a></div>

    <div class="more__list--overlay">
      <div class="more__list--element">
        <i class="bi bi-x-circle more__element--close float-end p-2"></i>

        <img src="./public/img/Logo.png" alt="" class="more__list--logo">

        <img src="./public/img/menu-list-img.png" alt="" class="more__list--img">

        <img src="./public/img/sidearea-img.jpg" alt="" class="more__list--img">

        <p class="more__list--text text-black-50 text-center px-3 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quo pariatur possimus dignissimos, architecto, similique id aliquam sint laborum expedita excepturi placeat!</p>

        <h3 class="more__list--desc text-center mt-5 mb-4 text-dark">Find Your Destination</h3>

        <form action="" class="more__list--search d-flex justify-content-center mb-4">
          <input type="text" class="more__search--input" placeholder="Search ...">
          <div class="more__search--btn">
            <input type="submit" value="">
            <i class="bi bi-search"></i>
          </div>
        </form>

        <h3 class="more__list--desc text-center text-dark">Follow Me</h3>

        <div class="more__list--contact d-flex justify-content-center mb-5 mt-3">
          <div class="more__contact--icon">
            <a class="text-white p-2" href=""><i class="bi bi-twitter"></i></a>
          </div>
          <div class="more__contact--icon">
            <a class="text-white p-2" href=""><i class="bi bi-pinterest"></i></a>
          </div>
          <div class="more__contact--icon">
            <a class="text-white p-2" href=""><i class="bi bi-facebook"></i></a>
          </div>
          <div class="more__contact--icon">
            <a class="text-white p-2" href=""><i class="bi bi-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>

    <!-- ========== Main Form ========== -->
    <?php
    $login_username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
    $login_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
    $login_remember = isset($_COOKIE['username']) ? true : false;

    if (!isset($_SESSION['is_login'])) { ?>
      <div class="form">
        <div class="form__overlay">
          <i class="bi bi-x-circle close-form-btn"></i>
        </div>

        <div class="form__login text-white">
          <div class="form__login--header d-flex">
            <div class="form__header--item w-50 text-center login-in-register">LOGIN</div>
            <div class="form__header--item w-50 text-center register-in-login">REGISTER</div>
          </div>

          <div class="form__login--container">
            <h3 class="form__login--title">Sign In Here!</h3>

            <p class="form__login--desc">Log into your account in just a few simple steps.</p>

            <form class="form__login--main" id="form__login--main">
              <div class="form-group w-100">
                <input type="text" name="login-username" id="login-username" class="form__login--username" placeholder="Username ..." value="<? echo $login_username ?>">
                <i class="bi bi-person-fill form__username--icon"></i>
                <span class="form-message"></span>
              </div>
              <div class="form-group w-100">
                <input type="password" name="login-password" class="form__login--password" placeholder="Password ..." value="<? echo $login_password ?>">
                <i class="bi bi-lock-fill form__password--icon"></i>
                <span class="form-message"></span>
              </div>

              <div class="form-group w-100 form-check form__login--check">
                <input type="checkbox" id="remember-me" name="remember-me" class="form-check-input" <? if ($login_remember) echo 'checked'; ?>>
                <label class="form-check-label" for="remember-me">Remember me</label>
              </div>

              <a href="#" class="form__login--lost text-decoration-none">Lost Your Password?</a>

              <input type="submit" value="SIGN IN" name="login-btn" class="form__login--submit d-block w-100 bg-white">

            </form>
          </div>

          <p class="text-center my-4">Sign in with Facebook or Google+</p>

          <div class="form__login--footer d-flex">
            <div class="form__footer--item w-50 text-center d-flex">FACEBOOK</div>
            <div class="form__footer--item w-50 text-center d-flex">GOOGLE + </div>
          </div>
        </div>

        <div class="form__register text-white">
          <div class="form__register--header d-flex">
            <div class="form__header--item w-50 text-center login-in-register">LOGIN</div>
            <div class="form__header--item w-50 text-center">REGISTER</div>
          </div>

          <div class="form__register--container">
            <h3 class="form__register--title">Register Now!</h3>

            <p class="form__register--desc">Join the SetSail community today & set up a free account.</p>

            <form class="form__register--main" id="form__register--main">
              <div class="form-group w-100">
                <input type="text" name="username" class="form__register--username" placeholder="Username ...">
                <i class="bi bi-person-fill form__username--icon"></i>
                <span class="form-message"></span>
              </div>
              <div class="form-group w-100">
                <input type="text" name="email" class="form__register--email" placeholder="Email ...">
                <i class="bi bi-envelope form__email--icon"></i>
                <span class="form-message"></span>
              </div>
              <div class="form-group w-100">
                <input type="password" name="password" class="form__register--password" placeholder="Password ...">
                <i class="bi bi-lock-fill form__password--icon"></i>
                <span class="form-message"></span>
              </div>
              <div class="form-group w-100 mb-3">
                <input type="password" name="repass" class="form__register--repass" placeholder="Repeat Password ...">
                <i class="bi bi-lock-fill form__repass--icon"></i>
                <span class="form-message"></span>
              </div>

              <span class="mt-3">Your personal <a href="#" class="text-decoration-none text-dark">privacy policy.</a></span>

              <input type="submit" value="REGISTER" name="register-btn" class="form__register--submit d-block w-100 bg-white">

            </form>
          </div>
        </div>
      </div>
    <? } ?>

    <div class="top__info bg-dark d-flex">
      <div class="top__info--contact h-100 d-flex">
        <a href="mailto: setsail@qode.com" class="top__info--link text-decoration-none text-white h-100 d-flex align-items-center">
          <i class="bi bi-envelope"></i>
          <span>setsail@qode.com</span>
        </a>

        <a href="tel: 15628675309" class="top__info--link text-decoration-none text-white h-100 d-flex align-items-center">
          <i class="bi bi-telephone-fill"></i>
          <span>1 562 867 5309</span>
        </a>

        <a href="https://www.google.rs/maps/place/Charging+Bull/@40.7055242,-74.0133806,20z/data=!4m6!3m5!1s0x89c2589a17a81551:0xc7db393ae1eff521!8m2!3d40.7045583!4d-74.0138597!16zL20vMDI5ZzBf" target="_blank" class="top__info--link text-decoration-none text-white h-100 d-flex align-items-center">
          <i class="bi bi-geo-alt"></i>
          <span>Broadway & Morris St, New York</span>
        </a>
      </div>

      <div class="top__info--connect d-flex align-items-center">
        <div class="top__connect--network">
          <a href="https://twitter.com/QodeInteractive" target="_blank" class="top__network--link text-decoration-none text-white">
            <i class="bi bi-twitter"></i>
          </a>

          <a href="https://www.pinterest.com/qodeinteractive/" target="_blank" class="top__network--link text-decoration-none text-white">
            <i class="bi bi-pinterest"></i>
          </a>

          <a href="https://www.facebook.com/QodeInteractive/" target="_blank" class="top__network--link text-decoration-none text-white">
            <i class="bi bi-facebook"></i>
          </a>

          <a href="https://www.instagram.com/qodeinteractive/" target="_blank" class="top__network--link text-decoration-none text-white">
            <i class="bi bi-instagram"></i>
          </a>
        </div>

        <div class="top__connect--language align-items-center h-100">
          <p class="text-white">English</p>
          <i class="bi bi-chevron-down text-white"></i>

          <div class="top__language--select">
            <p class="text-white">French</p>
            <p class="text-white">German</p>
            <p class="text-white">Italia</p>
          </div>
        </div>

        <div class="top__connect--user d-flex justify-content-center align-items-center">
          <i class="bi bi-person-circle text-white"></i>
          <?php
          if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) { ?>
            <div class="top__user--list">
              <span class="top__user--name">Hello, <? echo $_SESSION['username'] ?></span>

              <div class="top__user--handle">
                <a href="?mod=user&act=profile" class="user__handle--info">Profile</a>
                <a href="?mod=user&act=order" class="user__handle--order">Order</a>
                <a href="" class="user__handle--logout">Log out</a>
              </div>
            </div>
          <? } ?>
        </div>
      </div>

    </div>

    <!-- ========== Related Fixed ========== -->
    <div class="related">
      <i class="bi bi-coin"></i>
      <p>RELATED</p>
    </div>

    <div class="buy-now">
      <i class="bi bi-cart-fill"></i>
      <p>BUY NOW</p>
    </div>

    <!-- ========== Header =========== -->

    <div style="height: 82px !important;">
      <header class="header w-100 d-flex">

        <div class="header__menu">
          <i class="bi bi-list header__menu--btn"></i>
        </div>
        <div class="header__user">
          <i class="bi bi-person-square header__user--btn"></i>
        </div>

        <!-- Menu Mobile -->
        <div class="navmb">
          <ul class="navmb__list list-unstyled text-dark mx-5">
            <li class="navmb__item">
              <span class="navmb__item--text">
                Home
                <i class="bi bi-chevron-right float-end"></i>
              </span>

            </li>
            <li class="navmb__item navmb__page">
              <span class="navmb__item--text">
                Pages
                <i class="bi bi-chevron-right float-end"></i>
              </span>

              <ul class="navmb__pages list-unstyled">
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">About Us</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">What We Offer</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">Our Team</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">Get It Touch</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">Contact Us</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">FAQ Page</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">Coming Soon</a>
                </li>
                <li class="navmb__pages--item">
                  <a href="" class="navmb__pages--link text-decoration-none text-dark">Error Page</a>
                </li>
              </ul>

            </li>
            <li class="navmb__item navmb__destination">
              <span class="navmb__item--text">
                Destinations
                <i class="bi bi-chevron-right float-end"></i>
              </span>

              <ul class="navmb__destinations list-unstyled">
                <li><a href="" class="navmb__destinations--link text-decoration-none text-dark">Destinations List</a></li>
                <li><a href="" class="navmb__destinations--link text-decoration-none text-dark">Destinations Slider</a></li>
                <li><a href="" class="navmb__destinations--link text-decoration-none text-dark">Destinations Item</a></li>
              </ul>

            </li>
            <li class="navmb__item navmb__tour">
              <span class="navmb__item--text">
                Tours
                <i class="bi bi-chevron-right float-end"></i>
              </span>
              <ul class="navmb__tours list-unstyled">
                <li><a href="" class="navmb__tours--link text-decoration-none text-dark">Standard List</a></li>
                <li><a href="" class="navmb__tours--link text-decoration-none text-dark">Gallery List</a></li>
                <li><a href="" class="navmb__tours--link text-decoration-none text-dark">Split List</a></li>
                <li><a href="" class="navmb__tours--link text-decoration-none text-dark">Tour Item</a></li>
              </ul>
            </li>
            <li class="navmb__item navmb__blog">
              <span class="navmb__item--text navmb__blog--text">
                Blog
                <i class="bi bi-chevron-right float-end"></i>
              </span>

              <ul class="navmb__blogs list-unstyled">
                <li><a href="" class="navmb__blogs--link text-decoration-none text-dark">Blog Masonry</a></li>
                <li>
                  <span href="" class="navmb__blogs--link navmb__blogs--list text-decoration-none text-dark">
                    Blog Standard
                    <i class="bi bi-chevron-right"></i>
                    <ul class="navmb__blogs--more">
                      <li class="navmb__blogs--item"><a href="" class="navmb__item--link text-decoration-none text-dark">Right Sidebar</a></li>
                      <li class="navmb__blogs--item"><a href="" class="navmb__item--link text-decoration-none text-dark">Left Sidebar</a></li>
                      <li class="navmb__blogs--item"><a href="" class="navmb__item--link text-decoration-none text-dark">Without Sidebar</a></li>
                    </ul>
                  </span>

                </li>
                <li>
                  <a href="" class="navmb__blogs--link text-decoration-none text-dark d-flex justify-content-between">
                    Post Types
                    <i class="bi bi-chevron-right"></i>
                  </a>
                </li>
              </ul>

            </li>
            <li class="navmb__item">
              <span class="navmb__item--text">
                Shop
                <i class="bi bi-chevron-right float-end"></i>
              </span>

            </li>
            <li class="navmb__item">
              <span class="navmb__item--text">
                Elements
                <i class="bi bi-chevron-right float-end"></i>
              </span>

            </li>

            <footer class="navmb__footer">
              <div class="navmb__footer--language">
                <a class="navmb__language--select">France</a>
                <a class="navmb__language--select">German</a>
                <a class="navmb__language--select">Italia</a>
              </div>

              <div class="navmb__footer--select">
                <i class="bi bi-basket3"></i>
                <i class="bi bi-search"></i>
              </div>
            </footer>
          </ul>
        </div>

        <div class="header__logo">
          <a href="?" class="header__logo--link">
            <img src="./public/img/Logo.png" alt="" class="header__logo--img">
          </a>
        </div>

        <nav class="header__nav d-flex">
          <ul class="header__nav--list d-flex list-unstyled">
            <li class="header__nav--item">
              <a href="?mod=home" class="header__nav--link active text-dark text-decoration-none">
                <p class="header__link--text">Home</p>
              </a>
            </li>

            <li class="header__nav--item header__nav--pages">
              <a href="?mod=page&id=1" class="header__nav--link header__nav--pages text-dark text-decoration-none">
                <p class="header__link--text">Pages</p>
              </a>

              <div class="pages__more">
                <ul class="pages__more--list list-unstyled">
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=about" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">About Us</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=offer" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">What We Offer</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=team" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">Our Team</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=get_in_touch" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark pb-1">Get In Touch</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=contact" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">Contact Us</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=faq" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">FAQ Page</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=other" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">Comming Soon</span>
                    </a>
                  </li>
                  <li class="pages__more--item">
                    <a href="?mod=pages&act=error" class="pages__more--link text-decoration-none">
                      <span class="page__link--text text-dark">Error Page</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="header__nav--item header__nav--destinations">
              <a href="?mod=destination" class="header__nav--link text-dark text-decoration-none">
                <p class="header__link--text">Destinations</p>
              </a>

              <div class="destinations__more">
                <ul class="destinations__more--list list-unstyled">
                  <li class="destinations__more--item">
                    <a href="?mod=destination&act=list" class="destinations__more--link text-decoration-none text-dark">
                      <span class="destinations__more--text">Destination List</span>
                    </a>
                  </li>
                  <li class="destinations__more--item">
                    <a href="?mod=destination&act=slider" class="destinations__more--link text-decoration-none text-dark">
                      <span class="destinations__more--text">Destination Slider</span>
                    </a>
                  </li>
                  <li class="destinations__more--item">
                    <a href="?mod=destination&act=item" class="destinations__more--link text-decoration-none text-dark">
                      <span class="destinations__more--text">Destination Item</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="header__nav--item header__nav--tours">
              <a href="?mod=tour" class="header__nav--link text-dark text-decoration-none">
                <p class="header__link--text">Tours</p>
              </a>

              <div class="tours__more">
                <ul class="tours__more--list list-unstyled">
                  <li class="tours__more--item">
                    <a href="?mod=tour&act=standard-list" class="tours__more--link text-decoration-none text-dark">
                      <span class="tours__link--text">Standard List</span>
                    </a>
                  </li>
                  <li class="tours__more--item">
                    <a href="?mod=tour&act=gallery-list" class="tours__more--link text-decoration-none text-dark">
                      <span class="tours__link--text">Gallery List</span>
                    </a>
                  </li>
                  <li class="tours__more--item">
                    <a href="?mod=tour&act=split-list" class="tours__more--link text-decoration-none text-dark">
                      <span class="tours__link--text">Split List</span>
                    </a>
                  </li>
                  <li class="tours__more--item">
                    <a href="?mod=tour&act=tour-item" class="tours__more--link text-decoration-none text-dark">
                      <span class="tours__link--text">Tour Item</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="header__nav--item header__nav--blog">
              <a href="?mod=blog" class="header__nav--link text-dark text-decoration-none">
                <p class="header__link--text">Blog</p>
              </a>

              <div class="blog__more">
                <ul class="blog__more--list list-unstyled">
                  <li class="blog__more--item">
                    <a href="?mod=blog&act=masonry" class="blog__more--link text-decoration-none text-dark">
                      <span class="blog__link--text">Blog Masonry</span>
                    </a>
                  </li>
                  <li class="blog__more--item blog__item--standard">
                    <a href="?mod=blog&act=standard" class="blog__more--link text-decoration-none text-dark">
                      <span class="blog__link--text">Blog Standard</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right blog__link--icon float-end" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                      </svg>
                      <!-- <i class="blog__link--icon bi bi-chevron-right float-end"></i> -->
                    </a>

                    <div class="standard__more">
                      <ul class="standard__more--list list-unstyled">
                        <li class="standard__more--item">
                          <a href="" class="standard__more--link text-decoration-none text-dark">
                            <span class="standard__link--text">Right Sidebar</span>
                          </a>
                        </li>
                        <li class="standard__more--item">
                          <a href="" class="standard__more--link text-decoration-none text-dark">
                            <span class="standard__link--text">Left Sidebar</span>
                          </a>
                        </li>
                        <li class="standard__more--item">
                          <a href="" class="standard__more--link text-decoration-none text-dark">
                            <span class="standard__link--text">Without Sidebar</span>
                          </a>
                        </li>
                      </ul>
                    </div>

                  </li>
                  <li class="blog__more--item blog__item--post">
                    <a href="?mod=blog&act=post-types" class="blog__more--link text-decoration-none text-dark">
                      <span class="blog__link--text">Post Types</span>
                      <i class="blog__link--icon bi bi-chevron-right float-end"></i>
                    </a>

                    <div class="post__more">
                      <ul class="post__more--item list-unstyled">
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Standard</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Gallery</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Link</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Quote</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Video</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">Audio</span>
                          </a>
                        </li>
                        <li class="post__more--item">
                          <a href="" class="post__more--link text-decoration-none text-dark">
                            <span class="post__link--text">No Sidebar</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li class="header__nav--item header__nav--shop">
              <a href="?mod=shop" class="header__nav--link text-dark text-decoration-none">
                <p class="header__link--text">Shop</p>
              </a>
              <?
              $category = $GLOBALS['cart']->get_category();
              ?>
              <div class="shop__more">
                <ul class="shop__more--list list-unstyled">

                  <? foreach ($category as $item) { ?>
                    <li class="shop__more--item">
                      <a href="?mod=shop&cat_id=<? echo $item['cat_id'] ?>" class="shop__more--link text-decoration-none text-dark">
                        <span class="shop__link--text"><? echo $item['name'] ?> Products</span>
                      </a>
                    </li>
                  <? } ?>

                </ul>
              </div>
            </li>

            <li class="header__nav--item header__nav--elements">
              <a href="?mod=element" class="header__nav--link text-dark text-decoration-none">
                <p class="header__link--text">Elements</p>
              </a>

              <div class="elements">
                <div class="grid wide">
                  <div class="row">
                    <div class="col l-3">
                      <div class="elements__more">
                        <h3 class="elements__more--title">FEATURES</h3>
                        <ul class="elements__more--list list-unstyled">
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Tour List</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Tour Carousel</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Tours Filter</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Destination With Tours</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Destination List</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Destination Fullscreen Slider</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Full Screen Section</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Review Carousel</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col l-3">
                      <div class="elements__more">
                        <h3 class="elements__more--title">PRESENTATIONS</h3>
                        <ul class="elements__more--list list-unstyled">
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Team</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Blog List</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Shop List</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Testimonials</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Banner</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Clients</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Parallax Section</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Video Button</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col l-3">
                      <div class="elements__more">
                        <h3 class="elements__more--title">CLASSIC</h3>
                        <ul class="elements__more--list list-unstyled">
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Accordions</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Tab</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Buttons</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Google Maps</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Contact Form</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Progress Bar</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Countdown</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Counters</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Call To Action</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col l-3">
                      <div class="elements__more">
                        <h3 class="elements__more--title">TYPOGRAPHY</h3>
                        <ul class="elements__more--list list-unstyled">
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Heading</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Columns</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Section Title</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Blockquote</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Drop Caps</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Highlights</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Icon With Text</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Seperators</span>
                            </a>
                          </li>
                          <li class="elements__more--item">
                            <a href="" class="elements__more--link text-decoration-none text-dark">
                              <span class="elements__link--text">Custom Font</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </nav>

        <div class="header__more d-flex text-black">
          <div class="header__more--icon header__more--cart">
            <a class="text-decoration-none text-black" href="<? if ($user_obj->is_login()) echo '?mod=cart&act=show';
                                                              else echo '?mod=user&act=not-login' ?>"><i class="bi bi-basket2"></i></a>


            <?
            $user_id = $user_obj->get_user_id(isset($_SESSION['username']) ? $_SESSION['username'] : null);
            $user_cart_cnt = $cart->get_user_cart_full_info($user_id);
            $cnt = 0;
            foreach ($user_cart_cnt as $value) {
              $cnt++;
            }
            ?>

            <span class="header__cart--more--cnt"><? echo $cnt; ?></span>

            <div class="header__cart--more">


              <div class="header__cart--more-item">
                <? foreach ($user_cart_cnt as $value) { ?>
                  <div class="header__cart--item d-flex align-items-center mt-3">
                    <div class="cart__item--img">
                      <img src="<? echo $value['image_url'] ?>" alt="">
                    </div>
                    <div class="cart__item--info">
                      <h4><? echo $value['name'] ?></h4>
                      <span class="pb-1">Quantity: <? echo $value['quantity'] ?></span>
                      <span>Price: $<? echo $value['subtotal'] ?></span>
                    </div>
                    <div class="cart_remove"><a href="#">x</a></div>
                  </div>
                <? } ?>
              </div>
              <hr>

              <a href="?mod=cart&act=show" class="btn btn-primary">VIEW CART & CHECKOUT</a>
            </div>
          </div>
          <div class="header__more--icon header__more--search">
            <i class="bi bi-search"></i>
          </div>
          <div class="search-screen">
            <div class="search-overlay">
              <i class="bi bi-x-circle close-search-btn"></i>

              <div class="search-screen__form">
                <form action="" class="d-flex">
                  <input type="text" name="search" id="search" class="search-screen__form--input" placeholder="Search ...">
                  <input type="submit" value="FIND NOW" class="search-screen__form--submit">
                </form>
              </div>
            </div>
          </div>
          <div class="header__more--icon header__more--list">
            <i class="bi bi-list"></i>
          </div>


        </div>
      </header>

    </div>