window.addEventListener("load", () => {
  // const $ = document.querySelector.bind(document);
  // const $$ = document.querySelectorAll.bind(document);

  var inputRange = $(".shop-container__filter--input");
  if (inputRange) {
    inputRange.oninput = function () {
      var percentage =
        ((inputRange.value - inputRange.min) /
          (inputRange.max - inputRange.min)) *
        100;
      inputRange.style.setProperty("--thumb-percentage", percentage + "%");
      var number = $(".shop-container__filter--info span");
      number.innerHTML = inputRange.value;
    };
  }
});
