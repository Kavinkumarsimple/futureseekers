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
      <form action="<?php echo site_url('/MyProfileEmployer/editProfile') ?>" method="POST" enctype="multipart/form-data">
        <div class="col-6">
          <h3>Employer Details</h3>

          <?php
          session();
          session()->regenerate();
          $user_id = session()->get('user_id');
          $EmployerM = new \App\Models\employerModel();
          $CompanyM = new \App\Models\companyModel();
          $UserAccountM = new \App\Models\userAccountModel();
          $employer_info = $EmployerM->where('user_account_id', $user_id)->first();

          $query_employer = $EmployerM->query("Select * from employer where user_account_id = $user_id");
          foreach ($query_employer->getResult() as $row) {
            $name = $row->name;
            $contactNo = $row->contactNo;
            $jobPosition = $row->jobPosition;
            $email = $row->email;
            $companyid = $row->company_id;

            $query_company = $CompanyM->query("Select * from company where id = $companyid");
            foreach ($query_company->getResult() as $row2) {
              $cname = $row2->name;
              $ccontactNo = $row2->contactNo;
              $cemail = $row2->email;

              $query_useraccount = $UserAccountM->query("Select * from user_account where id = $user_id");
              foreach ($query_useraccount->getResult() as $row3) {
                $username = $row3->username;
                $password = $row3->password;
                $status = $row3->status;
              }
            }
          }

          ?>

          <input type="text" placeholder="Full Name" name="name" id="name" value="<?= set_value('name'); echo $name ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'name') : '' ?></small><br>

          <input type="tel" placeholder="Contact No" name="contactNo" id="contactNo" value="<?= set_value('contactNo'); echo $contactNo ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'contactNo') : '' ?></small><br>

          <input type="text" placeholder="Job Position" name="jobPosition" id="jobPosition" value="<?= set_value('jobPosition'); echo $jobPosition ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'jobPosition') : '' ?></small><br>

          <input type="email" placeholder="Email" name="email" id="email" value="<?= set_value('email'); echo $email ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'email') : '' ?></small><br>

          <input type="text" placeholder="Username" name="username" id="username" value="<?= set_value('username');echo $username ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'username') : '' ?></small><br>

          <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password');echo $password ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'password') : '' ?></small><br>
        </div>
        <div class="col-6">
          <h3>Company Details</h3>
          <input type="text" placeholder="Company Name" name="cname" id="cname" value="<?= set_value('cname');echo $cname ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'cname') : '' ?></small><br>

          <input type="tel" placeholder="Contact No" name="ccontactNo" id="ccontactNo" value="<?= set_value('ccontactNo');echo $cemail ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'ccontactNo') : '' ?></small><br>

          <input type="email" placeholder="Company Email" name="cemail" id="cemail" value="<?= set_value('cemail');echo $cemail ?>" <?php if ($status == 0){ ?> readonly <?php } ?> ><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'cemail') : '' ?></small><br>

          <label for='proimg'>Upload picture</label><br>
          <input type="file" name='logo' value="<?= set_value('logo'); ?>" <?php if ($status == 0){ ?> readonly <?php } ?> /><br>
          <small><?= isset($validation) ? show_validation_error($validation, 'logo') : '' ?></small><br>
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