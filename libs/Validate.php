<?

function setValue($value)
{
  if (isset($value) && !empty($value)) return $value;
  else return '';
}

function formError($field)
{
  global $error;
  if (isset($error[$field])) return $error[$field];
}

function is_username($value)
{
  $pattern = '/^[a-zA-Z0-9_-]{3,20}$/';

  if (!preg_match($pattern, $value)) return false;
  return true;
}

function is_password($value)
{
  $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).{6,}$/';

  if (!preg_match($pattern, $value)) return false;
  return true;
}


function is_email($value)
{
  $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

  if (!preg_match($pattern, $value)) return false;
  return true;
}

function is_fullname($value)
{
  // Họ và tên không được rỗng và có thể chứa các ký tự chữ cái, khoảng trắng và các ký tự có dấu
  $pattern = '/^[\p{L}\s]+$/u';

  if (!preg_match($pattern, $value)) return false;
  return true;
}

function is_address($value)
{
  // Địa chỉ không được rỗng và có thể chứa các ký tự chữ cái, số, dấu cách, các ký tự có dấu và các ký tự đặc biệt
  $pattern = '/^[\p{L}0-9\s\-.,#]+$/u';

  if (!preg_match($pattern, $value)) return false;
  return true;
}

function is_phone($value)
{
  // Số điện thoại không được rỗng và chỉ chứa các số, dấu cách, dấu cộng (+) và dấu gạch ngang (-)
  $pattern = '/^[0-9\s+\-]+$/';

  if (!preg_match($pattern, $value)) return false;
  return true;
}

function generateVerificationCode()
{
  // Độ dài của mã xác nhận
  $codeLength = 6;

  // Chuỗi chứa các chữ số từ 0 đến 9
  $digits = '0123456789';

  // Để chứa mã xác nhận
  $verificationCode = '';

  // Lặp để sinh ngẫu nhiên mã xác nhận
  for ($i = 0; $i < $codeLength; $i++) {
    $index = rand(0, strlen($digits) - 1);
    $verificationCode .= $digits[$index];
  }

  return $verificationCode;
}
