<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" name="This is the login page of FutureSeekers.lk, Registered user can login here and new users can register themselves to the website by going to the Register page.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
        font-family: Georgia, serif;
        background-color: #033417;
        padding: 0;
        margin: 0;
      }
      .pagepanel {
        width: 70%;
        height: 350px;
        margin: auto;
        margin-top: 150px;
        background-color:  #C7EAD5;
        align-content: center;
        text-align: center;
        border-radius: 20px;
      }
      #logo {
        height: 100px;
        width:100px;
      }
      .grid {
        display: grid;
        grid-template-columns: 1.5fr 2fr;
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
      }
      .welcomemsg {
        grid-area: 1 / 1 / 2 / 2;
        align-content: center;
        text-align: center;
        padding: 40px 0px 20px 0px;
      }
      .loginbox {
        grid-area: 1 / 2 / 2 / 3;
        align-content: center;
        padding: 40px 0px 20px 0px;
        margin-top: 40px;
      }
      input {
        height: 30px;
        width: 250px;
        border-radius: 10px;
      }
      button {
        background-color: #5FCB8D;
        color: black;
        cursor: pointer;
        border: 3px;
        padding: 10px;
        border-radius: 10px;
        margin: 5px 10px;
        font-weight: bold;
      }
      #loginbtn {
        width: 200px;
      }
      #registerbtn {
        width: 150px;
      }
      button:hover {
        background-color: #033417;
        color: white;
      }
    </style>
    <title>Future Seekers.lk | login</title>
  </head>
  <body>
  <div class="pagepanel">
    <div class="grid">
      <div class="welcomemsg"> 
        <div>
          <img id="logo" src="<?= base_url('Images/Logo.png') ?>"/>
        </div>
        <div>
          <h2>Welcome Back!</h2><br>
          <p>If you are an existing user click and Login<br>
          Or if you are a new user join us now by<br>
          clicking on Register</p>
        </div>
      </div>
      <div class="loginbox">
        <form action="<?php echo site_url('/Home/login') ?>" method="POST">
          <div>
            <i class="fa fa-user icon"></i>
            <input type="text" placeholder="username" name="username" id="username" required>
            <!-- <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br><br> -->
            <i class="fa fa-lock icon"></i>
            <input type="password" placeholder="password" name="password" id="password" required>
            <!-- <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br><br> -->
            <button id="loginbtn">Login</button><br>
            
          </div>
        </form>
        <a href="<?php echo site_url('Register/Index') ?>"><button id="registerbtn">Register</button></a>
        
      </div>
    </div>
  </div>

    <?php
    
    ?>
  </body>

</html>