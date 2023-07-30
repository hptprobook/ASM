
$(document).ready(function() {
  // Xử lý sự kiện khi "checkall" được chọn hoặc bỏ chọn
  $(".list-product-checkall").on("change", function() {
    // Lấy giá trị checked của "checkall"
    const isCheckedAll = $(this).prop("checked");

    // Đặt trạng thái checked cho tất cả các ô checkbox trong tbody
    $(".list-product-checkbox").prop("checked", isCheckedAll);
  });

  // Xử lý sự kiện khi một ô checkbox bất kỳ trong tbody được thay đổi
  $(".list-product-checkbox").on("change", function() {
    // Kiểm tra xem tất cả các ô checkbox trong tbody có được chọn hay không
    const isAllChecked = $(".list-product-checkbox").length === $(".list-product-checkbox:checked").length;

    // Đặt trạng thái checked cho "checkall" dựa trên kết quả kiểm tra
    $(".list-product-checkall").prop("checked", isAllChecked);
  });

  $(".account__checkall").on("change", function() {
    // Lấy giá trị checked của "checkall"
    const isCheckedAll = $(this).prop("checked");

    // Đặt trạng thái checked cho tất cả các ô checkbox trong tbody
    $(".account__check").prop("checked", isCheckedAll);
  });

  // Xử lý sự kiện khi một ô checkbox bất kỳ trong tbody được thay đổi
  $(".account__check").on("change", function() {
    // Kiểm tra xem tất cả các ô checkbox trong tbody có được chọn hay không
    const isAllChecked = $(".account__check").length === $(".account__check:checked").length;

    // Đặt trạng thái checked cho "checkall" dựa trên kết quả kiểm tra
    $(".account__checkall").prop("checked", isAllChecked);
  });

  $(".order__checkall").on("change", function() {
    // Lấy giá trị checked của "checkall"
    const isCheckedAll = $(this).prop("checked");

    // Đặt trạng thái checked cho tất cả các ô checkbox trong tbody
    $(".order__check").prop("checked", isCheckedAll);
  });

  // Xử lý sự kiện khi một ô checkbox bất kỳ trong tbody được thay đổi
  $(".order__check").on("change", function() {
    // Kiểm tra xem tất cả các ô checkbox trong tbody có được chọn hay không
    const isAllChecked = $(".order__check").length === $(".order__check:checked").length;

    // Đặt trạng thái checked cho "checkall" dựa trên kết quả kiểm tra
    $(".order__checkall").prop("checked", isAllChecked);
  });
});
