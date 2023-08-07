<?php
header('Refresh: 1; url="?mod=up_product&act=add');

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$targetDir = "../uploads/";

if (isset($_POST['upload-file-submit'])) {
  $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
  $isUpload = true;
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  if ($fileType != "xlsx" && $fileType != "xls") {
    echo "<div class='alert alert-danger'>Chỉ được sử dụng file Excel.</div>";
    $isUpload = false;
  }

  if (!$isUpload) {
    echo "<div class='alert alert-danger'>Không thể tải lên file</div>";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
      $spreadsheet = IOFactory::load($targetFile);
      $sheet = $spreadsheet->getActiveSheet();

      $headerRow = $sheet->getRowIterator()->current();
      $columnNames = [];

      foreach ($headerRow->getCellIterator() as $cell) {
        $columnNames[] = $cell->getValue();
      }

      // Bỏ đi hàng đầu tiên (tên cột) trong dữ liệu
      $sheet->removeRow(1);

      foreach ($sheet->getRowIterator() as $row) {
        $data = [];
        foreach ($row->getCellIterator() as $cell) {
          $data[] = $cell->getValue();
        }

        $insertData = array_combine($columnNames, $data);

        $admin->insert('products', $insertData);
      }

      echo "<div class='alert alert-success'>Tải dữ liệu thành công</div>";
    } else {
      echo "<div class='alert alert-danger'>Không thể tải lên file</div>";
    }
  }
}
