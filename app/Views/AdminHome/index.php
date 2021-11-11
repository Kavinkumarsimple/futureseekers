<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" name="This is the admin portal page of FutureSeekers.lk, Admins can control the profiles, job adverts and web page from here">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/login_styles.css') ?>" />

  <title>Future Seekers.lk | Admin Portal</title>
</head>

<body>
  <div>
    <h3>Dashboards</h3>
      <li>
      <ul><a href="<?php echo site_url('') ?>">Show Summary Dashboard</a></ul>
      </li>
    <h3>Member Profiles</h3>
      <li>
        <ul><a href="<?php echo site_url('AdminEmployerProfiles/index') ?>">Employer Profiles</a></ul>
        <ul><a href="<?php echo site_url('AdminApplicantProfiles/index') ?>">Applicant Profiles</a></ul>
      </li>
    <h3>Job Adverts</h3>
      <li>
      <ul><a href="<?php echo site_url('') ?>">Show All Job Adverts</a></ul>
      </li>
    <h3>Manage Admins</h3>
      <li>
        <ul><a href="<?php echo site_url('') ?>">Add/Remove Admins</a></ul>
      </li>
  </div>
  <div><a href="<?php echo site_url('Admin/logout') ?>"><button>Logout</button></a></div>
</body>

</html>