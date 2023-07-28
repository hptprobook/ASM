const registerForm = document.querySelector(".form__register--main");
const username = document.querySelector(".form__register--username");
const email = document.querySelector(".form__register--email");
const password = document.querySelector(".form__register--password");
const confirmPassword = document.querySelector(".form__register--repass");

var isValid = true;

const setError = (element, message) => {
  const inputElement = element.parentElement;
  const errorMessage = inputElement.querySelector(".form-message");

  errorMessage.innerHTML = message;
  inputElement.classList.add("error");
  inputElement.classList.remove("success");
  isValid = false;
};

const setSuccess = (element) => {
  const inputElement = element.parentElement;
  const errorMessage = inputElement.querySelector(".form-message");

  errorMessage.innerHTML = "";
  inputElement.classList.remove("error");
  inputElement.classList.add("success");
  isValid = true;
};

const usernameValidate = () => {
  const usernameInvalid = (username) => {
    let err = /^[a-zA-Z0-9_-]{3,20}$/;
    return err.test(String(username));
  };

  if (username.value === "") {
    setError(username, "This field cannot be empty!");
  } else if (!usernameInvalid(username.value)) {
    setError(username, "Invalid character!");
  } else {
    setSuccess(username);
  }
  return isValid;
};

const emailValidate = () => {
  const emailInvalid = (email) => {
    let err = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return err.test(String(email));
  };

  if (email.value === "") {
    setError(email, "This field cannot be empty!");
  } else if (!emailInvalid(email.value)) {
    setError(email, "This field must be email!");
  } else {
    setSuccess(email);
  }

  return isValid;
};

const passwordValidate = () => {
  const textPassInvalid = (text) => {
    let err = /^(?=.*[A-Za-z]).+$/;
    return err.test(String(text));
  };

  const numberPassInvalid = (number) => {
    let err = /.*[0-9].*/;
    return err.test(String(number));
  };

  const charPassInvalid = (char) => {
    let err = /.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?].*/;
    return err.test(String(char));
  };

  if (password.value === "") {
    setError(password, "This field cannot be empty!");
  } else if (password.value.length < 6) {
    setError(password, "Password must contain at least 6 characters!");
  } else if (!textPassInvalid(password.value)) {
    setError(password, "Password must contain at least 1 letter!");
  } else if (!numberPassInvalid(password.value)) {
    setError(password, "Password must contain at least 1 number!");
  } else if (!charPassInvalid(password.value)) {
    setError(password, "Password must contain at least 1 special character!");
  } else {
    setSuccess(password);
  }

  return isValid;
};

const confirmPasswordValidate = () => {
  if (confirmPassword.value !== password.value) {
    setError(confirmPassword, "Password does not match!");
  } else {
    setSuccess(confirmPassword);
  }

  return isValid;
};

username.onblur = () => {
  usernameValidate();
};

username.oninput = () => {
  let errorMessages = username.parentElement.querySelector(".form-message");
  username.parentElement.classList.remove("error");
  errorMessages.innerText = "";
};

email.onblur = () => {
  emailValidate();
};

email.oninput = () => {
  let errorMessages = email.parentElement.querySelector(".form-message");
  email.parentElement.classList.remove("error");
  errorMessages.innerText = "";
};

password.onblur = () => {
  passwordValidate();
  confirmPasswordValidate();
};

password.oninput = () => {
  let errorMessage = password.parentElement.querySelector(".form-message");
  password.parentElement.classList.remove("error");
  errorMessage.innerText = "";
};

confirmPassword.onblur = () => {
  confirmPasswordValidate();
};

confirmPassword.oninput = () => {
  let errorMessage =
    confirmPassword.parentElement.querySelector(".form-message");
  confirmPassword.parentElement.classList.remove("error");
  errorMessage.innerText = "";
};

// Login

registerForm.addEventListener("submit", (e) => {
  var allowDefault = false;
  let usernameCheck = usernameValidate();
  let emailCheck = emailValidate();
  let confirmPasswordCheck = confirmPasswordValidate();
  let passwordCheck = passwordValidate();

  if (
    !usernameCheck ||
    !emailCheck ||
    !passwordCheck ||
    !confirmPasswordCheck
  ) {
    e.preventDefault();
  }
});
