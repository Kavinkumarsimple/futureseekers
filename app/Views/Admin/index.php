<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="This is the login page of FutureSeekers.lk, Registered user can login here and new users can register themselves to the website by going to the Register page.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .loginbox {
      width: 30%;
      margin: auto;
      margin-top: 100px;
      background-color: #C7EAD5;
      align-content: center;
      text-align: center;
      padding: 10px;
      border: solid 1px black ;
      border-radius: 10px;
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

    button:hover {
      background-color: #033417;
      color: white;
    }
  </style>
  <title>Future Seekers.lk | login</title>
</head>

<body>
  <div class="loginbox">
    <h3>Admin Portal</h3>
    <form action="<?php echo site_url('/Admin/login') ?>" method="POST">
      <div>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
          <div> <?= session()->getFlashdata('fail'); ?> </div>
        <?php endif ?>
        <i class="fa fa-user icon"></i>
        <input id="username" name="username" type="text" placeholder="Username" value="<?= set_value('username'); ?>" /><br>
        <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br><br>
        <i class="fa fa-lock icon"></i>
        <input id="password" name="password" type="text" placeholder="Password" value="<?= set_value('password'); ?>" /><br>
        <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br><br>
        <button id="loginbtn">Login</button><br>
      </div>
    </form>
  </div>
  <?php

  ?>
</body>

</html>