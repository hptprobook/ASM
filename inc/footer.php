

<footer class="footer">
      <div class="grid wide">
        <div class="row">
          <div class="col l-3 m-6 c-12">
            <div class="footer__link">
              <div class="footer__logo">
                <a href=""><img src="./public/img/Logo.png" alt=""></a>
              </div>
              <p class="footer__list--desc">Lorem ipsum dolor sit ametco nsec te tuer adipiscing elitae</p>

              <a href="mailto: setsail@example.com" class="footer__link--item text-decoration-none text-white">
                <i class="bi bi-envelope"></i>
                setsail@example.com
              </a>
              <a href="tel:15628675309" class="footer__link--item text-decoration-none text-white">
                <i class="bi bi-telephone-fill"></i>
                1 562 867 5309
              </a>
              <a href="" class="footer__link--item text-decoration-none text-white">
                <i class="bi bi-geo-alt"></i>
                Broadway & Morris St, New York
              </a>
            </div>
          </div>
          <div class="col l-3 m-6 c-12">
            <div class="footer__date">
              <h2 class="footer__date--title">Our Recent Posts</h2>

              <div class="footer__date--item">
                <a href="" class="text-decoration-none">Visit Thailand, Bali And China</a>
                <a href="" class="text-decoration-none text-white">September 7, 2016</a>
              </div>

              <div class="footer__date--item">
                <a href="" class="text-decoration-none">Visit Thailand, Bali And China</a>
                <a href="" class="text-decoration-none text-white">September 7, 2016</a>
              </div>

              <div class="footer__date--item">
                <a href="" class="text-decoration-none">Visit Thailand, Bali And China</a>
                <a href="" class="text-decoration-none text-white">September 7, 2016</a>
              </div>
            </div>
          </div>

          <div class="col l-3 m-6 c-12">
            <div class="footer__form">
              <h2 class="footer__form--title">Subscribe to our Newsletter</h2>
              <p class="footer__form--text">Etiam rhoncus. Maecenas temp us, tellus eget condimentum rho</p>
              <form action="">
                <div class="footer__form--name">
                  <i class="bi bi-person-fill"></i>
                  <input type="text" name="" class="" placeholder="Name">
                </div>

                <div class="footer__form--email">
                  <i class="bi bi-envelope"></i>
                  <input type="email" name="" class="footer__form--email" placeholder="Email">
                </div>

                <input type="submit" value="SUBSCRIBE" class="footer__form--submit">
              </form>
            </div>
          </div>

          <div class="col l-3 m-6 c-12">
            <div class="footer__insta">
              <h2 class="footer__insta--title">Our Instagram</h2>
              <p class="footer__insta--text">Aliquam lorem ante, dapibus inviver raqui feugiat a, tellus. Phasellus null</p>
            </div>

            <div class="footer__insta--img">
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
            </div>
            <div class="footer__insta--img">
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
              <a href=""><img src="./public/img/ready/h1-postmark-1.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>

      <div class="footer__license text-white text-center">
        <span class="text-white-50">© 2018</span> <a class="text-decoration-none text-white" href="">Qode Interactive</a>
      </div>
    </footer>



  </div>





  <script src="./node_modules/jquery/dist/jquery.js"></script>
  <script src="./public/js/main.js"></script>
  <script src="./node_modules/aos/dist/aos.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./node_modules/swiper/swiper-bundle.js"></script>
  <script src="./public/js/script.js"></script>
  <script src="./public/js/validate.js" type="module"></script>
  <script src="./public/js/product.js"></script>


  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'fade',
      fadeEffect: {
        crossFad: true
      },
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      }
    });

    var planSwiper = new Swiper('.plan__list', {
      slidesPerView: 4,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "bullets",
        dynamicMainBullets: 4
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        540: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 24
        }
      }
    });

    var commentSwiper = new Swiper('.comment-swiper', {
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });

    var reviewSwiper = new Swiper('.review__list', {
      slidesPerView: 3,
      loop: true,
      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "bullets",
        dynamicMainBullets: 4
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        540: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40
        }
      }
    });

    var readySwiper = new Swiper('.ready__list', {
      slidesPerView: 3,
      loop: true,
      spaceBetween: 120,
      centeredSlides: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 30
        },
        540: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 60
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 120
        }
      }
    });
    var detailProductSwiper = new Swiper(".detail-product", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
</body>

</html>