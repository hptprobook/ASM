<?php
class Product
{
  private $database;

  public function __construct($database)
  {
    $this->database = $database;
  }

  public function getAllProducts()
  {
    return $this->database->get_list('SELECT * FROM products');
  }

  public function getProductsByCategory($cat_id)
  {
    return $this->database->get_list('SELECT * FROM products WHERE cat_id = "' . $cat_id . '"');
  }

  public function searchProducts($search, $filter, $sort, $cat_id)
  {
    $sql = 'SELECT * FROM products WHERE 1=1';
    $params = array();

    if (!empty($cat_id)) {
      $sql .= " AND cat_id = ?";
      $params[] = $cat_id;
    }

    if (!empty($search)) {
      $sql .= " AND name LIKE ?";
      $search = "%" . $search . "%";
      $params[] = $search;
    }

    if (!empty($filter)) {
      $sql .= " AND price <= ?";
      $params[] = $filter;
    }

    if (!empty($sort)) {
      if ($sort == 'asc') {
        $sql .= " ORDER BY `price` ASC";
      } elseif ($sort == 'desc') {
        $sql .= " ORDER BY `price` DESC";
      } elseif ($sort == 'average') {
        $sql .= " ORDER BY `rate` DESC";
      } elseif ($sort == 'name') {
        $sql .= " ORDER BY `name` ASC";
      }
    }

    return $this->database->get_list($sql, $params);
  }


  public function filterProductsByPrice($filter)
  {
    return $this->database->get_list('SELECT * FROM products WHERE price <= ' . $filter);
  }

  public function sortProducts($sort)
  {
    if ($sort == 'asc') {
      return $this->database->get_list('SELECT * FROM products ORDER BY `price` ASC');
    } elseif ($sort == 'desc') {
      return $this->database->get_list('SELECT * FROM products ORDER BY `price` DESC');
    } elseif ($sort == 'average') {
      return $this->database->get_list('SELECT * FROM products ORDER BY `rate` DESC');
    } elseif ($sort == 'name') {
      return $this->database->get_list('SELECT * FROM products ORDER BY `name` ASC');
    } else {
      return $this->getAllProducts();
    }
  }
}
