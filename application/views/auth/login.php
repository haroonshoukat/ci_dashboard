<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <script defer src="js/script.js"></script>
    <title>Animated Login and Registration Form</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Ruda:wght@400;600;700&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  overflow: hidden;
  background-color: #c9d6ff;
  background: linear-gradient(to right, #e2e2e2, #c9d6ff);
  font-family: "poppins", sans-serif;
}
.container {
  background-color: #fff;
  border-radius: 30px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  width: 768px;
  max-width: 100%;
  min-height: 480px;
  overflow: hidden;
  position: relative;
}
.container p {
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0.3px;
  margin: 20px 0;
}
.container span {
  font-size: 12px;
}
.container a {
  text-decoration: none;
  color: #333;
  margin: 15px 0 10px;
  font-size: 13px;
}
.container form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  height: 100%;
}
.container form input {
  background-color: #eee;
  border: none;
  width: 100%;
  margin: 8px 0;
  padding: 10px 15px;
  font-size: 13px;
  outline: none;
  width: 100%;
  border-radius: 8px;
  font-family: inherit;
}
.container button {
  background-color: #6e64ed;
  color: #fff;
  padding: 10px 45px;
  border: 1px solid transparent;
  border-radius: 5px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  margin-top: 10px;
  cursor: pointer;
}
.container button.hidden {
  background-color: transparent;
  border-color: #fff;
}
.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}
.social_icons {
  margin: 20px 0;
}
.social_icons a {
  border: 1px solid #ccc;
  border-radius: 20px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 3px;
  width: 40px;
  height: 40px;
}
.sign-in {
  left: 0;
  width: 50%;
  z-index: 2;
}
.container.active .sign-in {
  transform: translateX(100%);
}
.sign-up {
  left: 0;
  width: 50%;
  z-index: 1;
  opacity: 0;
}
.container.active .sign-up {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: move 0.6;
}
@keyframes move {
  0%,
  49.99% {
    opacity: 0;
    z-index: 1;
  }
  50%,
  100% {
    opacity: 1;
    z-index: 5;
  }
}
.toggle-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: all 0.6s ease-in-out;
  z-index: 100;
}
.container.active .toggle-container {
  transform: translateX(-100%);
}

.toggle {
 /* background-color: #6e64ed;  */
   background: url("https://i.pinimg.com/originals/cf/bc/37/cfbc370e45aee5035e26b4f2d3f24335.gif"); 
   background-color: rgba(0, 0, 0, 0.5); /* Overlay color */
    background-blend-mode: overlay; /* Blend mode */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  height: 100%;
  color: #fff;
  left: -100%;
  width: 200%;
  transform: translateX(0);
  transition: all 0.6s ease-in-out;
  position: relative;
}
.toggle::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.15);
}
.container.active .toggle {
  transform: translateX(50%);
}
.toggle-panel {
  position: absolute;
  width: 50%;
  height: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  padding: 0 30px;
  top: 0;
  transform: translateX(0);
  transition: all 0.6s ease-in-out;
}
.toggle-left {
  transform: translateX(-200%);
}
.container.active .toggle-left {
  transform: translateX(0);
}
.toggle-right {
  right: 0;
  transform: translateX(0);
}
.container.active .toggle-right {
  transform: translateX(0);
}
.error {
      color: red;
    }
    </style>
  </head>
  <body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form method="post" action="<?php echo base_url('Home/register'); ?>" class="needs-validation" onsubmit="return validateForm()" novalidate>
        <h1>Create Account</h1>
        <div class="social_icons">
          <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        </div>
        <span>Or use your email for registration</span>
        <div class="input-box">
          <input type="text" placeholder="name" id="name" name="name" required />
          <span id="name-error" class="error"></span>
        </div>
        <div class="input-box">
          <input type="email" placeholder="email" name="email" id="email" required/>
          <span id="email-error" class="error"></span>
        </div>
        <div class="input-box">
          <input type="password" placeholder="password" name="password" id="password" required />
          <span id="password-error" class="error"></span>
        </div>
        <button type="submit">Sign Up</button>
      </form>
    </div>
  
  <script>
    function validateForm() {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var isValid = true;

      if (name.trim() === "") {
        document.getElementById("name-error").innerHTML = "Name is required";
        isValid = false;
      } else {
        document.getElementById("name-error").innerHTML = "";
      }

      if (email.trim() === "") {
        document.getElementById("email-error").innerHTML = "Email is required";
        isValid = false;
      } else {
        document.getElementById("email-error").innerHTML = "";
      }

      if (password.trim() === "") {
        document.getElementById("password-error").innerHTML = "Password is required";
        isValid = false;
      } else {
        document.getElementById("password-error").innerHTML = "";
      }

      return isValid;
    }
  </script>
<!--===========Login Form -->
      <div class="form-container sign-in">
      <form method="post" action="<?php echo base_url('Home/login'); ?>" class="needs-validation" novalidate>
          <h1>Sign In</h1>
          <div class="social_icons">
            <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          </div>
          <span>or use your username & password</span>
          <input text="name" placeholder="Username" name="name" id="name" />
          <input type="password" placeholder="password" name="password" id="password"/>
          <p><a href="<?php echo base_url('Home/forget'); ?>">forgot password</a></p>

          <button type="submit" >Sign In</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter Your Personal Details to use All of site Features!</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hello Friends</h1>
            <p>
              Register With your personal details to use all of site features
            </p>
            <button class="hidden" id="register">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      "use strict";
const containerEl = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");
registerBtn.addEventListener("click", () =>
  containerEl.classList.add("active"),
);
loginBtn.addEventListener("click", () =>
  containerEl.classList.remove("active"),
);
    </script>
  </body>
</html>