<?php

namespace App\Controllers;

use mysqli;

class ApplyForJob extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index($jobid)
  {

    // echo $jobid;
    $job_detail_id = $jobid;

    if (session()->get('user_id') == null || session()->get('user_type') == "employer" || session()->get('user_type') == "admin") {
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }
    $session = session();
    $session->regenerate();
    $user_id = session()->get('user_id');

    $jobseekerM = new \App\Models\jobSeekerModel();

    $query_jobseeker = $jobseekerM->query("Select * from job_seeker where user_account_id = $user_id");
    foreach ($query_jobseeker->getResult() as $row) {
      $jobseeker_id = $row->id;
      $jobseeker_cv = $row->cv_file_dir;
    }



    $values = [
      'job_seeker_id' => $jobseeker_id,
      'job_details_id' => $jobid,
      'cv_name' => $jobseeker_cv
    ];


    $jobdetailsM = new \App\Models\jobSeekerJobDetailsModel();
    $query_check = $jobdetailsM->query("Select * from jobseeker_jobdetails where job_seeker_id = $jobseeker_id and job_details_id = $jobid");
    $doesntexist = true;
    foreach ($query_check->getResult() as $row2) {
      if (isset($row2)) {
        $doesntexist = false;
      }
    }
    if ($doesntexist == true) {
      $queryEmp = $jobdetailsM->insert($values);
      if ($queryEmp) {
        return redirect()->back()->with('fail', 'Please try again later..');
      } else {
        $to = 'mkavinkumarnaidu@gmail.com';

        $subject = 'Kavinkumar has applied';

        $message = '<h1> Hi Kavin </h1>';


        $email = \config\Services::email();

        $email->setTo($to);

        // $email->setFrom('Info@gophp.in', 'Info');
        $email->setFrom('futureseekersnew@gmail.com', 'FutureSeekers');

        $email->setSubject($subject);

        $email->setMessage($message);

        if ($email->send()) {

          // echo "Email Sent";

        } else {

          $error = $email->printDebugger(['headers']);

          print_r($error);
        }


        return redirect()->to('ApplicantHome')->with('success', 'You Applied for this Job');
      }
    } else {
      return redirect()->to('ApplicantHome')->with('fail', 'You have already applied for this position');
    }
    //echo $jobdetailsid;

    //echo "Doesnt exist";







  }



  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('Home/index')->with('fail', 'You are Logged out');
  }
}
