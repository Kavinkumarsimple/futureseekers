<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="This is the employer portal page of FutureSeekers.lk, Employer can use this page to view and edit their profile, view and add job adverts here">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('') ?>" />
  <link rel="stylesheet" href="<?= base_url('') ?>" />

  <title>Future Seekers.lk | Employer Portal</title>
</head>

<body>
  <div>
    <h3>Dashboards</h3>
    <ul>
      <li><a href="<?php echo site_url('') ?>">Jobs</a></li>
      <li><a href="<?php echo site_url('') ?>">My Jobs</a></li>
      <li><a href="<?php echo site_url('') ?>">Post an Advert</a></li>
      <li><a href="<?php echo site_url('MyProfileEmployer/index') ?>">My Profile</a></li>
    </ul>
    <div><a href="<?php echo site_url('EmployerHome/logout') ?>"><button>Logout</button></a></div>
</body>

</html>