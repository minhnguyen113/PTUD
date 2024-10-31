document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const username = document.getElementById("username");
    const phone = document.getElementById("telephone");
    const password = document.getElementById("password");
  
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // Ngăn chặn form gửi nếu có lỗi
      let isValid = true;
  
      // Kiểm tra họ tên
      if (username.value.trim() === "") {
        showError(username, "Vui lòng nhập họ tên.");
        isValid = false;
      } else {
        showSuccess(username);
      }
  
      // Kiểm tra số điện thoại
      const phoneRegex = /^[0-9]{10}$/;
      if (!phoneRegex.test(phone.value.trim())) {
        showError(phone, "Số điện thoại không hợp lệ. Yêu cầu 10 chữ số.");
        isValid = false;
      } else {
        showSuccess(phone);
      }
  
      // Kiểm tra mật khẩu
      if (password.value.trim() === "") {
        showError(password, "Vui lòng nhập mật khẩu.");
        isValid = false;
      } else if (password.value.length < 6) {
        showError(password, "Mật khẩu phải có ít nhất 6 ký tự.");
        isValid = false;
      } else {
        showSuccess(password);
      }
  
      // Nếu không có lỗi, gửi form
      if (isValid) {
        form.submit();
      }
    });
  
    function showError(input, message) {
      const formGroup = input.parentElement;
      formGroup.classList.add("error");
      const small = formGroup.querySelector("small");
      small.innerText = message;
    }
  
    function showSuccess(input) {
      const formGroup = input.parentElement;
      formGroup.classList.remove("error");
      const small = formGroup.querySelector("small");
      small.innerText = "";
    }
  });
  