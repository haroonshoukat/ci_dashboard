<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

*, *:before, *:after {
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  font-family: 'Raleway', sans-serif;
}

.container {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.container:hover, .container:active {
  .top:before, .bottom:before, .top:after, .bottom:after {
    margin-left: 200px;
    transform-origin: -200px 50%;
    transition-delay: 0s;
  }
  .center {
    opacity: 1;
    transition-delay: 0.2s;
  }
}

.top:before, .bottom:before, .top:after, .bottom:after {
  content: '';
  display: block;
  position: absolute;
  width: 200vmax;
  height: 200vmax;
  top: 50%;
  left: 50%;
  margin-top: -100vmax;
  transform-origin: 0 50%;
  transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  z-index: 10;
  opacity: 0.65;
  transition-delay: 0.2s;
}

.top:before {
  transform: rotate(45deg);
  background: #e46569;
}

.top:after {
  transform: rotate(135deg);
  background: #ecaf81;
}

.bottom:before {
  transform: rotate(-45deg);
  background: #60b8d4;
}

.bottom:after {
  transform: rotate(-135deg);
  background: #3745b5;
}

.center {
  position: absolute;
  width: 400px;
  height: 400px;
  top: 50%;
  left: 50%;
  margin-left: -200px;
  margin-top: -200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 30px;
  opacity: 0;
  transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  transition-delay: 0s;
  color: #333;
}

input {
  width: 100%;
  padding: 15px;
  margin: 5px;
  border-radius: 1px;
  border: 1px solid #ccc;
  font-family: inherit;
}

    </style>
</head>
<body>
<div class="container" onclick="">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
    <h2>Forgot Password</h2>
    <form action="<?php echo base_url('ForgotPassword/send'); ?>" method="post">
    <input type="email" placeholder="email" name="email">
    <button type="submit" class="btn btn-primary btn-block" style="background-color: #4CAF50; border: none; color: white; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: px;">Recover Password</button>
    </form>
    <h2>&nbsp;</h2>
  </div>
</div>

</body>
</html>