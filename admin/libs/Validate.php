<?

  function setValue($value) {
    if (isset($value) && !empty($value)) echo $value;
    else echo '';
  }

  function formError($field) {
    global $error;
    if (isset($error[$field])) return $error[$field];
  }

  function is_username($value) {
    $pattern = '/^[a-zA-Z0-9_-]{3,20}$/';

    if (!preg_match($pattern, $value)) return false;
    return true;
  }

  function is_password($value) {
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d).{7,}$/'; // Mật khẩu phải chứa ít nhất 1 chữ cái, 1 số và có độ dài lớn hơn 6 ký tự

    if (!preg_match($pattern, $value)) return false;
    return true;
  }


  function is_email($value) {
    $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

    if (!preg_match($pattern, $value)) return false;
    return true;
  }