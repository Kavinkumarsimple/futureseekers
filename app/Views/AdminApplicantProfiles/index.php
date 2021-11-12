<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="This is the admin portal page of FutureSeekers.lk, Admins can control the profiles, job adverts and web page from here">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/login_styles.css') ?>" />

  <title>Future Seekers.lk | Admin Portal</title>
  <style> 
    table tr:not(:first-child) {
      cursor: pointer; transform: all .25s ease-in-out;
    }
    table tr:not(:first-child)hover{background-color: #ddd;}
  </style>
</head>

<body>
  <div>
    <h3>Unverified Profiles</h3>
    <form action="<?php echo site_url('/AdminApplicantProfiles/verify') ?>" method="POST">
      <table id="unverified_profile_tbl">
        <tbody>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Date of Birth</th>
            <th>Job Title</th>
            <th>Username</th>
            <th>Password</th>
            <th>Verification</th>
          </tr>
          <?php
          $JobSeeker = new \App\Models\jobSeekerModel();
          $UserAccount = new \App\Models\userAccountModel();
          $query = $JobSeeker->query("Select * From job_seeker"); // To get all Applicant
          foreach ($query->getResult() as $row) {
            $useraccountid = $row->user_account_id;
            $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 0");
            foreach ($query_useraccount->getResult() as $row2) {
              $username = $row2->username;
              $password = $row2->password;
          ?>
              <tr>
                <td><?php echo $row->user_account_id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->contactNo; ?></td>
                <td><?php echo $row->dob; ?></td>
                <td><?php echo $row->currentJobTitle; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>

                <td>
                  <input type="checkbox" name="verify" id="verify" value="<? $id ?>">
                  <?php

                  ?>
                </td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        </tbody>
      </table>
      <form action="<?php echo site_url('/MyProfileApplicant/verify') ?>" method="POST">
        <input type="text" placeholder="" name="account_id" id="account_id"  >
        <button type="submit">Accept User</button>
      </form>
  <div><a href="<?php echo site_url('Admin/logout') ?>"><button>Logout</button></a></div>


  <script>
    var table = document.getElementById('unverified_profile_tbl'), rIndex;
    for (var i=1; i<table.rows.length; i++) 
    {
      table.rows[i].onclick = function() 
      {
        //Gets the row index
        rIndex = this.rowIndex;
        // console.log(rIndex);
        document.getElementById('account_id').value = this.cells[0].innerHTML;
      }
    }
  </script>
</body>

</html>