const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const wrapper = document.querySelector(".wrapper");

const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");

sign_up_btn.addEventListener("click", () => {
  wrapper.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
  wrapper.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
  wrapper.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
  wrapper.classList.remove("sign-up-mode2");
});

const showPopupBtn = document.querySelector(".login-btn");

showPopupBtn.addEventListener("click", () => {
  document.body.classList.toggle("show-popup");
});

document
  .getElementById("signInForm")
  .addEventListener("submit", function (event) {
    let formValid = true;

    // Username validation
    const loginUsername = document.getElementById("Username").value;
    const loginUsernameError = document.getElementById("loginUsernameError");
    if (loginUsername === "") {
      formValid = false;
      loginUsernameError.style.display = "block";
    } else {
      loginUsernameError.style.display = "none";
    }

    // Password validation
    const loginPassword = document.getElementById("Password").value;
    const loginPasswordError = document.getElementById("loginPasswordError");
    if (loginPassword === "") {
      formValid = false;
      loginPasswordError.style.display = "block";
    } else {
      loginPasswordError.style.display = "none";
    }

    // Prevent form submission if validation fails
    if (!formValid) {
      event.preventDefault();
    }
  });

document
  .getElementById("signUpForm")
  .addEventListener("submit", function (event) {
    let formValid = true;

    // Username validation
    const username = document.getElementById("username").value;
    const usernameError = document.getElementById("usernameError");
    if (username === "" || username.length < 3) {
      formValid = false;
      usernameError.style.display = "inline";
    } else {
      usernameError.style.display = "none";
    }

    // Email validation
    const email = document.getElementById("email").value;
    const emailError = document.getElementById("emailError");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "" || !emailRegex.test(email)) {
      formValid = false;
      emailError.style.display = "inline";
    } else {
      emailError.style.display = "none";
    }

    // Password validation
    const password = document.getElementById("password").value;
    const passwordError = document.getElementById("passwordError");
    if (password === "" || password.length < 6) {
      formValid = false;
      passwordError.style.display = "inline";
    } else {
      passwordError.style.display = "none";
    }

    // Prevent form submission if validation fails
    if (!formValid) {
      event.preventDefault();
    }
  });
