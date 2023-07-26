function toast({ title = "", message = "", type = "info", duration = 3000 }) {
  const main = document.querySelector("#toast-msg");
  if (main) {
    const toast = document.createElement("div");

    const autoRemoveId = setTimeout(function () {
      main.removeChild(toast);
    }, duration + 1000);

    toast.onclick = function (e) {
      if (e.target.closest(".toast__close")) {
        main.removeChild(toast);
        clearTimeout(autoRemoveId);
      }
    };
    const icons = {
      success: "bi bi-check-circle-fill",
      info: "bi bi-info-circle-fill",
      warning: "bi bi-exclamation-circle-fill",
      error: "bi bi-x-circle-fill",
    };

    const delay = (duration / 1000).toFixed(2);

    const icon = icons[type];

    toast.classList.add("toasts", `toast--${type}`);
    toast.style.animation = `slideInLeft .4s ease,fadeOut 1s linear ${delay}s forwards`;

    toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <p class="toast__msg">${message}.</p>
            </div>
            <div class="toast__close">
                <i class="bi bi-x"></i>
            </div>
        `;

    main.appendChild(toast);
  }
}

function showSuccessToast(message) {
  toast({
    title: "Success",
    message: message,
    type: "success",
    duration: 5000,
  });
}

function showErrorToast(message) {
  toast({
    title: "Error",
    message: message,
    type: "error",
    duration: 5000,
  });
}

$(document).ready(function () {
  $("#cartTable").on("click", ".check-all-item", function () {
    var isChecked = $(this).prop("checked");
    $(this)
      .closest("table")
      .find("input[name='selected[]']")
      .prop("checked", isChecked);
  });

  // Login Form
  $("#form__login--main").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: "./module/user/login.php",
      method: "POST",
      data: {
        username: $(".form__login--username").val(),
        password: $(".form__login--password").val(),
        remember: $("#remember-me").prop("checked"),
      },
      dataType: "json",
      success: function (data) {
        if (data.length == 0) {
          // Xác thực đăng nhập thành công
          $(".login-notification-modal").addClass("active");
        } else {
          // Có lỗi xảy ra trong đăng nhập, hiển thị thông báo lỗi hoặc thực hiện hành động khác nếu cần thiết
          for (var error in data) {
            var value = data[error];
            showErrorToast(value);
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      },
    });
  });

  // Register Form
  $("#form__register--main").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: "./module/user/register.php",
      method: "POST",
      data: {
        username: $(".form__register--username").val(),
        email: $(".form__register--email").val(),
        password: $(".form__register--password").val(),
        repass: $(".form__register--repass").val(),
      },
      dataType: "json",
      success: function (data) {
        if (data.length == 0) {
          $(".register-notification-modal").addClass("active");
          $(".register-notification-btn").click(function () {
            $(".register-notification-modal").removeClass("active");
            $(".login-in-register").click();
            // alert('Success');
          });
        } else {
          for (var error in data) {
            var value = data[error];
            showErrorToast(value);
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      },
    });
  });

  // Add to cart handlers
  $(".shop-container__form").submit(function (e) {
    e.preventDefault();
    if (
      $(".shop-container__status--account") &&
      $(".shop-container__status--account").val() === "1"
    ) {
      $(".form").css("visibility", "visible");
      $(".form__overlay").css("opacity", 1);
      $(".form__login").css("opacity", 1);
    } else {
      $.ajax({
        url: "./module/cart/add.php",
        method: "POST",
        data: {
          product_id: $(".shop-container__id").val(),
          quantity: $(".shop-container__quantity").val(),
        },
        dataType: "json",
        success: function (data) {


          showSuccessToast('Add to cart successfully!');

          var headerCartIcon = $(".header__cart--more-item");
          var headerCartCnt = $(".header__cart--more--cnt");
          var cartItem = "";
          var cnt = 0;

          data.forEach((item) => {
            cartItem += `<div class="header__cart--item d-flex align-items-center mt-3">
              <div class="cart__item--img">
                <img src="${item.image_url}" alt="">
              </div>
              <div class="cart__item--info">
                <h4>${item.name}</h4>
                <span class="pb-1">Quantity: ${item.quantity}</span>
                <span>Price: $${item.subtotal}</span>
              </div>
              <div class="cart_remove"><a href="#">x</a></div>
            </div>`;
            cnt++;
          });

          headerCartIcon.html(cartItem);
          headerCartCnt.text(cnt);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
        },
      });
    }
  });

  // Log out

  $(".user__handle--logout").click(function (e) {
    e.preventDefault();

    $.ajax({
      url: "./module/user/logout.php",
      method: "GET",
      data: {},
      dataType: "json",
    })
    .done(function (data) {
      if (data) {
        $(".logout-notification-modal").addClass("active");
      } else {
        showErrorToast("Logout failed!");
      }
    })
    .fail(function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
    });
  });

  $('.profile-logout').click(function(e) {
    e.preventDefault();

    $.ajax({
      url: "./module/user/logout.php",
      method: "GET",
      data: {},
      dataType: "json",
    })
    .done(function (data) {
      if (data) {
        $(".logout-notification-modal").addClass("active");
      } else {
        showErrorToast("Logout failed!");
      }
    })
    .fail(function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
    });
  });

  // Update Cart
  $(".update-cart-btn").click(function (e) {
    e.preventDefault();

    var quantities = []; // Tạo một mảng để chứa số lượng của từng sản phẩm
    $(".cart-quantity-input").each(function () {
      quantities.push($(this).val()); // Thêm số lượng vào mảng
    });

    $.ajax({
      url: "./module/cart/update.php",
      method: "GET",
      data: {
        qty: quantities,
      },
      dataType: "json",
      success: function (data) {
        var orderCartItem = "";

        var updateBody = $(".update-cart-table-body");
        var totalAmountDiv = $('.total-amount-cart');
        data.forEach((item) => {
          if (typeof item === "object") {
            orderCartItem += `
              <tr style="height: 136px;border-bottom:1px solid #dedcdc;">
                <td><input type="checkbox" name="selected[]" value="${item.id}"></td>
                <td>${item.name}</td>
                <td><img src="${item.image_url}" alt="" style="width: 90px;height:90px;object-fit:cover;margin-right:12px;"></td>
                <td>$${item.price}</td>
                <td>
                  <input class="cart-quantity-input" type="number" min="1" value="${item.quantity}" name="qty[]">
                </td>
                <td>$${item.subtotal}</td>
              </tr>
            `;
          }

        });
        updateBody.html(orderCartItem);
        var totalAmount = data.pop();
        totalAmountDiv.text(totalAmount);

      var headerCartIcon = $(".header__cart--more-item");
        var headerCartCnt = $(".header__cart--more--cnt");
        var cartItem = "";
        var cnt = 0;

        data.forEach((item) => {
          cartItem += `<div class="header__cart--item d-flex align-items-center mt-3">
            <div class="cart__item--img">
              <img src="${item.image_url}" alt="">
            </div>
            <div class="cart__item--info">
              <h4>${item.name}</h4>
              <span class="pb-1">Quantity: ${item.quantity}</span>
              <span>Price: $${item.subtotal}</span>
            </div>
            <div class="cart_remove"><a href="#">x</a></div>
          </div>`;
          cnt++;
        });

        headerCartIcon.html(cartItem);
        headerCartCnt.text(cnt);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      },
    });
  });

  // Thêm bộ xử lý sự kiện cho nút "CHECK OUT"
  $(".checkout-cart-form").submit(function(e) {

    var isChecked = $("input[name='selected[]']:checked").length > 0;

    if (!isChecked) {
      e.preventDefault();
      showErrorToast('No product selected!')
    } else {
      $(".checkout-cart-form").submit();
    }
  });

  $('.cart-checkout-remove').click(function(e) {
    e.preventDefault();
    var isChecked = $("input[name='selected[]']:checked").length > 0;

    if (!isChecked) {
      showErrorToast('No product selected!');
    } else {
      var selected = []; // Tạo một mảng để chứa số lượng của từng sản phẩm
      $("input[name='selected[]']:checked").each(function () {
        selected.push($(this).val()); // Thêm số lượng vào mảng
      });

      $.ajax({
        url: "./module/cart/remove_all.php",
        method: "GET",
        data: {
          'selectedIds': selected,
        },
        dataType: "json",
        success: function (data) {
          var orderCartItem = "";

          var updateBody = $(".update-cart-table-body");
          var totalAmountDiv = $('.total-amount-cart');
          data.forEach((item) => {
            if (typeof item === "object") {
              orderCartItem += `
                <tr style="height: 136px;border-bottom:1px solid #dedcdc;">
                  <td><input type="checkbox" name="selected[]" value="${item.id}"></td>
                  <td>${item.name}</td>
                  <td><img src="${item.image_url}" alt="" style="width: 90px;height:90px;object-fit:cover;margin-right:12px;"></td>
                  <td>$${item.price}</td>
                  <td>
                    <input class="cart-quantity-input" type="number" min="1" value="${item.quantity}" name="qty[]">
                  </td>
                  <td>$${item.subtotal}</td>
                </tr>
              `;
            }
          });
          updateBody.html(orderCartItem);
          var totalAmount = data.pop();
          totalAmountDiv.text(totalAmount);
          var headerCartIcon = $(".header__cart--more-item");
          var headerCartCnt = $(".header__cart--more--cnt");
          var cartItem = "";
          var cnt = 0;

          data.forEach((item) => {
            cartItem += `<div class="header__cart--item d-flex align-items-center mt-3">
              <div class="cart__item--img">
                <img src="${item.image_url}" alt="">
              </div>
              <div class="cart__item--info">
                <h4>${item.name}</h4>
                <span class="pb-1">Quantity: ${item.quantity}</span>
                <span>Price: $${item.subtotal}</span>
              </div>
              <div class="cart_remove"><a href="#">x</a></div>
            </div>`;
            cnt++;
          });

          headerCartIcon.html(cartItem);
          headerCartCnt.text(cnt);
          showSuccessToast('Remove successfully!');
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
        },
      });
    }
  });

  // Order Reason handlerss
  $('.order__reason--close').click(function() {
    $('.order__reason--overlay').removeClass('active');
  })
  $('.order__reason--btn').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');

    $.ajax({
      url: "./module/user/reason.php",
      method: "GET",
      data: {
        'id': id
      },
      dataType: "json",
      success: function (data) {
        console.log(data)
        $('.order__reason--overlay').addClass('active');
        for (let key in data) {
          const value = data[key];
          $('.order__reason--by').text(key);
          $('.order__reason--main').text(value);
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      },
    });
  });


});
