
const form = document.querySelector("form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const phone = document.getElementById("telephone");

// Hiển thị lỗi
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = "form-group error";
  const small = formControl.querySelector("small");
  small.innerText = message;
}

// Hiển thị khi thành công
function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.className = "form-group success";
  const small = formControl.querySelector("small");
  small.innerText = "";
}

// Kiểm tra định dạng email
function checkEmail(input) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "Email không hợp lệ");
  }
}

// Kiểm tra độ dài chuỗi
function checkLength(input, min, max) {
  if (input.value.length < min) {
    showError(input, `${getFieldName(input)} phải có ít nhất ${min} ký tự`);
  } else if (input.value.length > max) {
    showError(input, `${getFieldName(input)} không được vượt quá ${max} ký tự`);
  } else {
    showSuccess(input);
  }
}

// Kiểm tra các trường bắt buộc
function checkRequired(inputArr) {
  let isRequired = false;
  inputArr.forEach(function (input) {
    if (input.value.trim() === "") {
      showError(input, `${getFieldName(input)} là bắt buộc`);
      isRequired = true;
    } else {
      showSuccess(input);
    }
  });

  return isRequired;
}

// Kiểm tra định dạng số điện thoại
function checkPhone(input) {
  const re = /^[0-9]+$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "Số điện thoại không hợp lệ, chỉ chấp nhận số");
  }
}



// Lấy tên trường
function getFieldName(input) {
  return input.getAttribute("name").charAt(0).toUpperCase() + input.getAttribute("name").slice(1);
}

// Xử lý sự kiện khi submit form
form.addEventListener("submit", function (e) {
  e.preventDefault();

  if (!checkRequired([username, email, phone])) {
    checkLength(username, 3, 30);
    checkLength(phone, 10, 15);
    checkEmail(email);
    checkPhone(phone);
  }
});
