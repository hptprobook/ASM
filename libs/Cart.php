<?

class Cart {
  private $database;

  function __construct($database) {
    $this->database = $database;
  }

  function add_cart($username, $product_id, $product_quantity) {
    $user = $this->database->get_row('SELECT user_id FROM users WHERE username = "' . $username . '"');
    $product = $this->database->get_row('SELECT * FROM products WHERE product_id = "' . $product_id . '"');
    $user_id = $user['user_id'];
    $subtotal = $product['price'] * $product_quantity;
    $user_cart = array(
      'user_id' => $user_id,
      'product_id' => $product_id,
      'quantity' => $product_quantity,
      'subtotal' => $subtotal
    );

    $product_id_in_db = $this->database->get_row('SELECT * FROM user_cart WHERE product_id = "' . $product_id . '" AND user_id = "' . $user_id . '"');

    if (!empty($product_id_in_db)) {
      $product_qty_indb = $product_id_in_db['quantity'];
      $user_cart = array(
        'user_id' => $user_id,
        'product_id' => $product_id,
        'quantity' => $product_quantity + $product_qty_indb,
        'subtotal' => ($product['price'] * ($product_quantity + $product_qty_indb))
      );
      $this->database->update('user_cart', $user_cart, 'id = "' . $product_id_in_db['id'] . '"');
    } else {
      $this->database->insert('user_cart', $user_cart);
    }
  }

  function update_cart() {

  }

  function get_order($username) {
    $user = $this->database->get_row('SELECT user_id FROM users WHERE username = "' . $username . '"');

    $user_cart_item = $this->database->get_list('SELECT * FROM user_cart WHERE user_id = "' . $user['user_id'] . '"');

    $total_amount = 0;
    foreach ($user_cart_item as $value) {
      $total_amount += $value['subtotal'];
    }

    $orders = $this->database->get_row('SELECT * FROM orders WHERE user_id = "' . $user['user_id'] . '"');

    $data_order = array(
      'user_id' => $user['user_id'],
      'order_date' => date('Y-m-d'),
      'total_amount' => $total_amount
    );

    if (!empty($orders)) {
      $this->database->update('orders', $data_order, 'user_id="' . $user['user_id'] . '"');
    } else {
      $this->database->insert('orders', $data_order);
    }
  }

  function remove_all() {

  }

  function get_category() {
    $sql = 'SELECT * FROM category';
    return $this->database->get_list($sql);
  }


}