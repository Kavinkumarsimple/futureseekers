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
    <!-- <table>
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
        </tr>
        <?php
        $JobSeeker = new \App\Models\jobSeekerModel();
        $UserAccount = new \App\Models\userAccountModel();
        $query = $JobSeeker->query("Select * From job_seeker");
        foreach ($query->getResult() as $row) {
          $useraccountid = $row->user_account_id;
          $query_useraccount = $UserAccount->query("Select * from user_account where id = $useraccountid and status = 0");
          foreach ($query_useraccount->getResult() as $row2) {
            $username = $row2->username;
            $password = $row2->password;
          }
        ?>
          <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->address; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->contactNo; ?></td>
            <td><?php echo $row->dob; ?></td>
            <td><?php echo $row->currentJobTitle; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $password; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table> -->
    <table>
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
        </tr>
        <?php
          $connect = mysqli_connect("localhost", "root", "", "futureseekerslk") or die ("Connection Failed");
          $query = "Select t1.id, t1.name, t1.address, t1.email, t1.contactNo, t1.dob, t1.currentJobTitle, t2.username, t2.password
           From job_seeker as t1, user_account as t2 
           Where t1.user_account_id = t2.id and t2.status = 0";
          $result = mysqli_query($connect, $query);
          while($row = mysqli_fetch_assoc($result))
          {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contactNo']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['currentJobTitle']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
  </div>
</body>

</html>