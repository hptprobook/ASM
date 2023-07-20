<?php


class User {
  private $_database;

  function __construct($database) {
    $this->_database = $database;
  }

  function is_login() {
    return isset($_SESSION['is_login']);
  }

  function get_user_id($username) {
    if ($this->is_login()) {
      $user = $this->_database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
      return $user['user_id'] ?? null;
    }

    return null;

  }
}