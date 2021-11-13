<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Future Seekers.lk | My Profile</title>
</head>

<body>
  <div class="container">
    <h1>My Profile</h1>
    <div class="row">
      <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div style="margin-top:5px" class="alert alert-danger text-muted"> <?= session()->getFlashdata('fail'); ?> </div>
      <?php endif ?>

      <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div style="margin-top:5px" class="alert alert-success text-muted"> <?= session()->getFlashdata('success'); ?> </div>
      <?php endif ?>
      <form action="<?php echo site_url('/MyProfileApplicant/editProfile') ?>" method="POST">
        <div class="col-6">
          <h3>Applicant Details</h3>

          <?php
          session();
          session()->regenerate();
          $user_id = session()->get('user_id');
          $JobSeekerM = new \App\Models\jobSeekerModel();
          $UserAccountM = new \App\Models\userAccountModel();
          $jobSeeker_info = $JobSeekerM->where('user_account_id', $user_id)->first();

          $query_jobSeeker = $JobSeekerM->query("Select * from job_seeker where user_account_id = $user_id");
          foreach ($query_jobSeeker->getResult() as $row) {
            $name = $row->name;
            $address = $row->address;
            $email = $row->email;
            $dob = $row->dob;
            $contactNo = $row->contactNo;
            $currentJobTitle = $row->currentJobTitle;

            $query_useraccount = $UserAccountM->query("Select * from user_account where id = $user_id");
            foreach ($query_useraccount->getResult() as $row2) {
              $username = $row2->username;
              $password = $row2->password;
              $status = $row2->status;
            }
          }

          ?>

          <input type="text" placeholder="Full Name" name="name" id="name" value="<?= set_value('name'); echo $name ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'name') : '' ?></small><br>

          <input type="text" placeholder="Address" name="address" id="address" value="<?= set_value('address'); echo $address ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'address') : '' ?></small><br>

          <input type="email" placeholder="Email" name="email" id="email" value="<?= set_value('email');
          echo $email ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'email') : '' ?></small><br>

          <input type="date" placeholder="Date of Birth" name="dob" id="dob" value="<?= set_value('dob');
          echo $dob ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'dob') : '' ?></small><br>

          <input type="tel" placeholder="Contact No" name="contactNo" id="contactNo" value="<?= set_value('contactNo');echo $contactNo ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'contactNo') : '' ?></small><br>

          <input type="text" placeholder="Current Job Title" name="currentJobTitle" id="currentJobTitle" value="<?= set_value('currentJobTitle');
          echo $currentJobTitle ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'jobPosition') : '' ?></small><br>

          <input type="text" placeholder="Username" name="username" id="username" value="<?= set_value('username');echo $username ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br>

          <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password');echo $password ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br>
        </div>
        <button type="submit" class="btn btn-primary btnlogin" <?php if ($status == 0){ ?> disabled <?php } ?> >Make Changes</button>
      </form>
    </div>
  </div>

  <a href="<?php echo site_url('Home/logout') ?>"><button>Logout</button></a>
  <?php

  ?>
</body>

</html>