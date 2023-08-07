$(document).ready(function () {
  $(".list-product-checkall").on("change", function () {
    const isCheckedAll = $(this).prop("checked");

    $(".list-product-checkbox").prop("checked", isCheckedAll);
  });

  $(".list-product-checkbox").on("change", function () {
    const isAllChecked =
      $(".list-product-checkbox").length ===
      $(".list-product-checkbox:checked").length;

    $(".list-product-checkall").prop("checked", isAllChecked);
  });

  $(".account__checkall").on("change", function () {
    const isCheckedAll = $(this).prop("checked");

    $(".account__check").prop("checked", isCheckedAll);
  });

  $(".account__check").on("change", function () {
    const isAllChecked =
      $(".account__check").length === $(".account__check:checked").length;

    $(".account__checkall").prop("checked", isAllChecked);
  });

  $(".order__checkall").on("change", function () {
    const isCheckedAll = $(this).prop("checked");

    $(".order__check").prop("checked", isCheckedAll);
  });

  $(".order__check").on("change", function () {
    const isAllChecked =
      $(".order__check").length === $(".order__check:checked").length;

    $(".order__checkall").prop("checked", isAllChecked);
  });

  $(".cat__checkall").on("change", function () {
    const isCheckedAll = $(this).prop("checked");

    $(".cat__check").prop("checked", isCheckedAll);
  });

  $(".cat__check").on("change", function () {
    const isAllChecked =
      $(".cat__check").length === $(".cat__check:checked").length;

    $(".cat__checkall").prop("checked", isAllChecked);
  });

  // Thông báo
  $('.main-notify').click(function() {
    $('.notification-overlay').addClass('active');
  })
  $('.notification-close').click(function() {
    $('.notification-overlay').removeClass('active');
  })

  $('.new--notification-close').click(function() {
    $('.new--notification-overlay').removeClass('active');
  });

  $('.cancel--notification-close').click(function() {
    $('.cancel__notification--overlay').removeClass('active');
  })
});
