<?

class DB_Driver {
  private $__conn;

  function connect() {
    if (!$this->__conn) {
      $this->__conn = mysqli_connect('localhost', 'root', '', 'assignment') or die("Không thể kết nối tới Database");
    }
    mysqli_query(
      $this->__conn,
      "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'"
    );
  }

  function disconnect() {
    if ($this->__conn) mysqli_close($this->__conn);
  }

  function insert($table, $data) {
    // Kết nối DB
    $this->connect();

    // Lưu trữ danh sách field
    $fieldList = '';
    // Lưu trữ danh sách giá trị của field tương ứng
    $valueList = '';

    // Lặp qua data
    foreach ($data as $key => $value) {
      $fieldList .= ',' . $key;
      $valueList .= ',"' . mysqli_real_escape_string($this->__conn, $value) . '"';
    }

    // Bỏ dấu phẩy thừa ở chuỗi cuối cùng
    $fieldList = ltrim($fieldList, ',');
    $valueList = ltrim($valueList, ',');

    // Tạo câu truy vấn INSERT
    $sql = "INSERT INTO $table ($fieldList) VALUES ($valueList)";

    // Thực thi câu truy vấn
    return mysqli_query($this->__conn, $sql);
  }

  // Hàm Update data
  function update($table, $data, $where) {
    // Kết nối DB
    $this->connect();
    $sql = '';

    foreach ($data as $key => $value) {
      $sql .= $key . '="' . mysqli_real_escape_string($this->__conn, $value) . '",';
    }

    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;

    return mysqli_query($this->__conn, $sql);
  }

  // Hàm Delete data
  function remove($table, $where) {
    $this->connect();

    $sql = "DELETE FROM " . $table . " WHERE " . $where;

    return mysqli_query($this->__conn, $sql);
  }

  // Hàm lấy danh sách
  function get_list($sql) {
    $this->connect();

    $result = mysqli_query($this->__conn, $sql);

    if(!$result) die("Câu truy vấn sai!");

    $return = array();

    // Lặp qua kết quả và đưa vào mảng
    while($row = mysqli_fetch_assoc($result)) $return[] = $row;

    // Xoá kết quả khỏi bộ nhớ
    mysqli_free_result($result);

    return $return;
  }

  // Hàm lấy 1 record(row)
  function get_row($sql) {
    $this->connect();

    $result = mysqli_query($this->__conn, $sql);

    if(!$result) die("Câu truy vấn sai!");

    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    if($row) return $row;

    return false;
  }
}