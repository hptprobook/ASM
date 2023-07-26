// const $ = document.querySelector.bind(document);
// const $$ = document.querySelectorAll.bind(document);

window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  header.classList.toggle(
    "hidden",
    window.scrollY > 0 && window.scrollY <= document.querySelector(".home").offsetHeight
  );
  header.classList.toggle("sticky", window.scrollY > document.querySelector(".home").offsetHeight);
  const relatedFixed = document.querySelector(".related");
  const buyNowFixed = document.querySelector(".buy-now");
  relatedFixed.classList.toggle(
    "sticky",
    window.scrollY > document.querySelector(".home").offsetHeight
  );
  buyNowFixed.classList.toggle(
    "sticky",
    window.scrollY > document.querySelector(".home").offsetHeight
  );
  const moveTop = document.querySelector(".move-top");
  moveTop.classList.toggle("sticky", window.scrollY > document.querySelector(".home").offsetHeight);
});

// ============================
// JavaScript for Top Form
// ============================

var formTop = document.querySelector(".form");
if (formTop) {
  const userBtn = document.querySelector(".top__connect--user");
  const formTopOverlay = document.querySelector(".form__overlay");
  const formTopLogin = document.querySelector(".form__login");
  const formTopRegister = document.querySelector(".form__register");
  const formTopClose = document.querySelector(".close-form-btn");
  const registerInLogin = document.querySelector(".register-in-login");
  const loginInRegister = document.querySelector(".login-in-register");
  const loginNotify = document.querySelector("span.login--notify");
  const notLogin = document.querySelector(".not-login__sign-in");

  userBtn.onclick = () => {
    formTop.style.visibility = "visible";
    formTopOverlay.style.opacity = 1;
    formTopLogin.style.opacity = 1;
  };

  formTopClose.onclick = () => {
    formTop.style.visibility = "hidden";
    formTopOverlay.style.opacity = 0;
    formTopLogin.style.opacity = 0;
  };

  formTopOverlay.onclick = () => {
    formTop.style.visibility = "hidden";
    formTopOverlay.style.opacity = 0;
    formTopLogin.style.opacity = 0;
  };

  registerInLogin.onclick = () => {
    formTopLogin.style.display = "none";
    formTopRegister.style.display = "block";
  };

  loginInRegister.onclick = () => {
    formTopLogin.style.display = "block";
    formTopRegister.style.display = "none";
  };

  if (loginNotify) {
    loginNotify.onclick = () => {
      formTop.style.visibility = "visible";
      formTopOverlay.style.opacity = 1;
      formTopLogin.style.opacity = 1;
    };
  }

  if (notLogin) {
    notLogin.onclick = () => {
      formTop.style.visibility = "visible";
      formTopOverlay.style.opacity = 1;
      formTopLogin.style.opacity = 1;
    };
  }
} else {
  formTop = null;
}

// ============================
// JavaScript for Seach Screen
// ============================

const searchScreen = document.querySelector(".search-screen");
const searchScreenOverlay = document.querySelector(".search-overlay");
const searchScreenClose = document.querySelector(".close-search-btn");
const searchScreenBtn = document.querySelector(".header__more--search");

searchScreenBtn.onclick = () => {
  searchScreen.style.visibility = "visible";
  searchScreenOverlay.style.opacity = 1;
  searchScreenOverlay.style.visibility = "visible";
};

searchScreenClose.onclick = () => {
  searchScreen.style.visibility = "hidden";
  searchScreenOverlay.style.opacity = 0;
  searchScreenOverlay.style.visibility = "hidden";
};

searchScreenOverlay.onclick = (e) => {
  if (e.target === searchScreenOverlay) {
    searchScreen.style.visibility = "hidden";
    searchScreenOverlay.style.opacity = 0;
    searchScreenOverlay.style.visibility = "hidden";
    console.log(e.target);
  }
};

// ============================
// JavaScript for Menu Right Bar
// ============================

const menuListBtn = document.querySelector(".header__more--list");
const menuListItem = document.querySelector(".more__list--element");
const menuListCloseBtn = document.querySelector(".more__element--close");
const menuListOverlay = document.querySelector(".more__list--overlay");

menuListBtn.onclick = () => {
  menuListOverlay.classList.add("active");
  menuListItem.classList.add("active");
};

menuListOverlay.onclick = (e) => {
  if (e.target === menuListOverlay) {
    menuListOverlay.classList.remove("active");
    menuListItem.classList.remove("active");
  }
};

menuListCloseBtn.onclick = () => {
  menuListOverlay.classList.remove("active");
  menuListItem.classList.remove("active");
};

// ============================
// JavaScript for Mobile Menu
// ============================

const navmb = document.querySelector(".navmb");
const headerMenu = document.querySelector(".header__menu");
const navmbPage = document.querySelector(".navmb__page");
const navmbPages = document.querySelector(".navmb__pages");
const navmbDestination = document.querySelector(".navmb__destination");
const navmbDestinations = document.querySelector(".navmb__destinations");
const navmbTour = document.querySelector(".navmb__tour");
const navmbTours = document.querySelector(".navmb__tours");
const navmbBlog = document.querySelector(".navmb__blog");
const navmbBlogs = document.querySelector(".navmb__blogs");
const navmbBlogText = document.querySelector(".navmb__blog--text");
const navmbBlogsList = document.querySelector(".navmb__blogs--list");
const navmbBlogItem = document.querySelector(".navmb__blogs--more");

headerMenu.onclick = () => {
  navmb.classList.toggle("active");
};

navmbPage.onclick = () => {
  navmbPages.classList.toggle("active");
};

navmbDestination.onclick = () => {
  navmbDestinations.classList.toggle("active");
};

navmbTour.onclick = () => {
  navmbTours.classList.toggle("active");
};

navmbBlog.onclick = (e) => {
  if (e.target === navmbBlogText) {
    navmbBlogs.classList.toggle("active");
  }
};

navmbBlogsList.onclick = () => {
  navmbBlogItem.classList.toggle("active");
};

// ============================
// JavaScript for Page.php
// ============================

var parallaxBg = document.querySelector(".home__parallax-bg");
window.addEventListener("scroll", () => {
  if (parallaxBg) {
    var yPos = window.pageYOffset;
    parallaxBg.style.transform = "translateY(" + yPos * 0.4 + "px)";
  }
});

// Lấy các phần tử chứa phần trăm
var countrysidePercent = document.querySelector(".countryside-percent");
var vineyardPercent = document.querySelector(".vineyard-percent");
var tastingPercent = document.querySelector(".tasting-percent");

// Giá trị phần trăm tăng dần
var targetPercentCountryside = 76; // Giá trị phần trăm mục tiêu cho Countryside
var targetPercentVineyard = 92; // Giá trị phần trăm mục tiêu cho Vineyard
var targetPercentTasting = 86; // Giá trị phần trăm mục tiêu cho Wine Tasting

// Hàm tăng phần trăm từ 0 đến giá trị cụ thể
function increasePercent(element, targetPercent) {
  var currentPercent = 0; // Phần trăm hiện tại

  var intervalId = setInterval(function () {
    // Tăng giá trị phần trăm hiện tại
    currentPercent++;

    // Cập nhật nội dung của phần tử với phần trăm hiện tại
    element.textContent = currentPercent + " %";

    // Kiểm tra nếu đạt đến giá trị mục tiêu, dừng vòng lặp
    if (currentPercent >= targetPercent) {
      clearInterval(intervalId);
    }
  }, 32); // Điều chỉnh tốc độ tăng phần trăm tại đây (milliseconds)
}

// Gọi hàm tăng phần trăm cho từng phần tử

var pageCount = document.querySelector(".pages-count");
var isCounted = false;
window.addEventListener("scroll", () => {
  if (window.scrollY >= pageCount.offsetTop && !isCounted) {
    const pageCountItem = document.querySelectorAll(".pages-count__bar--item");

    pageCountItem.forEach((item) => {
      item.classList.add("run");
    });

    increasePercent(countrysidePercent, targetPercentCountryside);
    increasePercent(vineyardPercent, targetPercentVineyard);
    increasePercent(tastingPercent, targetPercentTasting);

    isCounted = true; // Đánh dấu là đã đếm
  }
});

// ============================
// JavaScript for Tour.php
// ============================

// Rating Percent Active

var ratingPercent = document.querySelector(".rating-percent");
var comfortPercent = document.querySelector(".comfort-percent");
var foodPercent = document.querySelector(".food-percent");
var hospitalityPercent = document.querySelector(".hospitality-percent");
var hygienePercent = document.querySelector(".hygiene-percent");
var receptionPercent = document.querySelector(".reception-percent");

var ratingPercentTarget = 60;
var comfortPercentTarget = 100;
var foodPercentTarget = 100;
var hospitalityPercentTarget = 60;
var hygienePercentTarget = 80;
var receptionPercentTarget = 60;

// Tab Pane

const tabs = document.querySelectorAll(".tour-container__nav--item");
const panes = document.querySelectorAll(".content-pane");

tabs.forEach((tab, index) => {
  const pane = panes[index];

  tab.onclick = function () {
    document
      .querySelector(".tour-container__nav--item.active")
      .classList.remove("active");
    document.querySelector(".content-pane.active").classList.remove("active");

    this.classList.add("active");
    pane.classList.add("active");
    var reviewRate = document.querySelector(
      ".tour-container__reviews--content"
    );
    var isCounted = false;

    const reviewList = document.querySelector(
      ".tour-container__content--reviews"
    );
    const reviewRateItem = document.querySelectorAll(
      ".tour-container__bar--item"
    );

    if (reviewList.classList.contains("active") && !isCounted) {
      reviewRateItem.forEach((item) => {
        setTimeout(function () {
          item.classList.add("run");
          increasePercent(ratingPercent, ratingPercentTarget);
          increasePercent(comfortPercent, comfortPercentTarget);
          increasePercent(foodPercent, foodPercentTarget);
          increasePercent(hospitalityPercent, hospitalityPercentTarget);
          increasePercent(hygienePercent, hygienePercentTarget);
          increasePercent(receptionPercent, receptionPercentTarget);

          isCounted = true; // Đánh dấu là đã đếm
        }, 10);
      });
    } else {
      reviewRateItem.forEach((item) => {
        item.classList.remove("run");
        isCounted = false;
      });
    }
  };
});

// Geoslocation

let coords = {};

navigator.geolocation.getCurrentPosition(
  function (position) {
    coords = position.coords;
  },
  function (error) {}
);

function openMap() {
  location.href =
    "https://www.google.com/maps/@" + coords.latitude + "," + coords.longitude;
}

const openMapBtn = document.querySelector(".map-btn");
const mapIframe = document.querySelector(".map-iframe");

if (openMapBtn) {
  openMapBtn.addEventListener("click", () => {
    navigator.geolocation.getCurrentPosition((position) => {
      coords = position.coords;
      const url = `https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d0.1!2d${coords.longitude}!3d${coords.latitude}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1234567890!5m2!1sen!2sus`;
      mapIframe.setAttribute("src", url);
    });
  });
}

// Star Rate

const starsList = document.querySelectorAll(".tour-container__post--star");

starsList.forEach((starItem) => {
  const starsRate = starItem.querySelectorAll("i");
  starsRate.forEach((star, index) => {
    star.addEventListener("click", () => {
      starsRate.forEach((s, i) => {
        if (i <= index) {
          s.classList.remove("bi-star");
          s.classList.add("bi-star-fill");
        } else {
          s.classList.remove("bi-star-fill");
          s.classList.add("bi-star");
        }
      });
    });
  });
});

