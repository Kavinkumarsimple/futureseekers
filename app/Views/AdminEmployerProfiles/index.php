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
    <h3>Unverified Profiles</h3>
    <table>
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>ContactNo</th>
          <th>JobPosition</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Company ID</th>
          <th>Company Name</th>
          <th>Company Contact No</th>
          <th>Company Email</th>
        </tr>
        <?php
        $Employer = new \App\Models\employerModel();
        $UserAccount = new \App\Models\userAccountModel();
        $Company = new \App\Models\companyModel();

        $query = $Employer->query("Select * from employer");
        foreach ($query->getResult() as $row) {
          $companyid = $row->company_id;
          $useraccountid = $row->user_account_id;

          $query_company = $Company->query("Select * from company where id = $companyid");
          foreach ($query_company->getResult() as $row2) {
            $companyname = $row2->name;
            $companycno = $row2->contactNo;
            $companyemail = $row2->email;

            $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 0");
            foreach ($query_useraccount->getResult() as $row3) {
              $username = $row3->username;
              $password = $row3->password;
        ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->contactNo; ?></td>
                <td><?php echo $row->jobPosition; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $companyid; ?></td>
                <td><?php echo $companyname; ?></td>
                <td><?php echo $companycno; ?></td>
                <td><?php echo $companyemail; ?></td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div>
    <h3>Verified Profiles</h3>
    <table>
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>ContactNo</th>
          <th>JobPosition</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Company ID</th>
          <th>Company Name</th>
          <th>Company Contact No</th>
          <th>Company Email</th>
        </tr>
        <?php
        $Employer = new \App\Models\employerModel();
        $UserAccount = new \App\Models\userAccountModel();
        $Company = new \App\Models\companyModel();

        $query = $Employer->query("Select * from employer");
        foreach ($query->getResult() as $row) {
          $companyid = $row->company_id;
          $useraccountid = $row->user_account_id;

          $query_company = $Company->query("Select * from company where id = $companyid");
          foreach ($query_company->getResult() as $row2) {
            $companyname = $row2->name;
            $companycno = $row2->contactNo;
            $companyemail = $row2->email;

            $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 1");
            foreach ($query_useraccount->getResult() as $row3) {
              $username = $row3->username;
              $password = $row3->password;
        ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->contactNo; ?></td>
                <td><?php echo $row->jobPosition; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $companyid; ?></td>
                <td><?php echo $companyname; ?></td>
                <td><?php echo $companycno; ?></td>
                <td><?php echo $companyemail; ?></td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div>
    <h3>Rejected Profiles</h3>
    <table>
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>ContactNo</th>
          <th>JobPosition</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Company ID</th>
          <th>Company Name</th>
          <th>Company Contact No</th>
          <th>Company Email</th>
        </tr>
        <?php
        $Employer = new \App\Models\employerModel();
        $UserAccount = new \App\Models\userAccountModel();
        $Company = new \App\Models\companyModel();

        $query = $Employer->query("Select * from employer");
        foreach ($query->getResult() as $row) {
          $companyid = $row->company_id;
          $useraccountid = $row->user_account_id;

          $query_company = $Company->query("Select * from company where id = $companyid");
          foreach ($query_company->getResult() as $row2) {
            $companyname = $row2->name;
            $companycno = $row2->contactNo;
            $companyemail = $row2->email;

            $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 2");
            foreach ($query_useraccount->getResult() as $row3) {
              $username = $row3->username;
              $password = $row3->password;
        ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->contactNo; ?></td>
                <td><?php echo $row->jobPosition; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $companyid; ?></td>
                <td><?php echo $companyname; ?></td>
                <td><?php echo $companycno; ?></td>
                <td><?php echo $companyemail; ?></td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div>
    <h3>Deleted Profiles</h3>
    <table>
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>ContactNo</th>
          <th>JobPosition</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Company ID</th>
          <th>Company Name</th>
          <th>Company Contact No</th>
          <th>Company Email</th>
        </tr>
        <?php
        $Employer = new \App\Models\employerModel();
        $UserAccount = new \App\Models\userAccountModel();
        $Company = new \App\Models\companyModel();

        $query = $Employer->query("Select * from employer");
        foreach ($query->getResult() as $row) {
          $companyid = $row->company_id;
          $useraccountid = $row->user_account_id;

          $query_company = $Company->query("Select * from company where id = $companyid");
          foreach ($query_company->getResult() as $row2) {
            $companyname = $row2->name;
            $companycno = $row2->contactNo;
            $companyemail = $row2->email;

            $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 3");
            foreach ($query_useraccount->getResult() as $row3) {
              $username = $row3->username;
              $password = $row3->password;
        ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->contactNo; ?></td>
                <td><?php echo $row->jobPosition; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $companyid; ?></td>
                <td><?php echo $companyname; ?></td>
                <td><?php echo $companycno; ?></td>
                <td><?php echo $companyemail; ?></td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div><a href="<?php echo site_url('Admin/logout') ?>"><button>Logout</button></a></div>
</body>

</html>