
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
});
