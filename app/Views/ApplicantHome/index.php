<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="This is the applicant portal page of FutureSeekers.lk, Applicant can use this page to view and edit their profile, view job adverts and apply for  jobs here">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>" />
  <link rel="stylesheet" href="<?= base_url('') ?>" />

  <title>Future Seekers.lk | Applicant Portal</title>
</head>

<body>
  <div>
    <h3>Dashboards</h3>
    <ul>
      <li><a href="<?php echo site_url('') ?>">Home</a></li>
      <li><a href="<?php echo site_url('') ?>">My Inbox</a></li>
      <li><a href="<?php echo site_url('MyProfileApplicant/index') ?>">My Profile</a></li>
      <li><a href="<?php echo site_url('') ?>">About Us</a></li>
    </ul>
    <div><a href="<?php echo site_url('ApplicantHome/logout') ?>"><button>Logout</button></a></div>
</body>

</html>