<?php

namespace App\Controllers;

class MyJobsEmployer extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index()
  {

    return view('MyJobsEmployer/index');
  }

  public function showapplicants($jobID)
  {

    $jobM = new \App\Models\jobDetailsModel();
    $id = $jobID;
    $jobdata = $jobM->find($id);


    $data = [
      'jobid' => $jobID,
      'jobdata' => $jobdata
    ];
    return view('EmployerViewApplicants/index.php', $data);
  }

  public function downloadPdf($jcvname)
  {
    // echo $data;

    header("Content-type: application/pdf");
    header("Content-Disposition: attachment;filename=$jcvname");
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    set_time_limit(0);
    ob_clean();
    flush();
    readfile('cvfiles/' . $jcvname);
  }

  public function scheduleInterview()
  {
    // sleep(5);
    $jobid = $_POST['jobid'];
    $applicantid = $_POST['applicantid'];
    $applicantname = $_POST['applicantname'];
    $applicantemail = $_POST['applicantemail'];
    $interviewtype = $_POST['interviewtype'];
    $datetimelocal = $_POST['datetimelocal'];
    $invitationlink = $_POST['invitationlink'];
    $additionalmessage = $_POST['additionalmessage'];

    $db = db_connect();
    $queryCheckRow = $db->query(
      "
      SELECT * FROM scheduled_meetings where job_details_id = $jobid and job_seeker_id = $applicantid
      "
    );
    if ($queryCheckRow->getNumRows() > 0) {
      echo json_encode(array("result" => '2'));
    } else {
      $scheduleData = [
        'job_details_id' => $jobid,
        'job_seeker_id' => $applicantid,
        'meeting_link' => $invitationlink,
        'meeting_type' => $interviewtype,
        'notes' => $additionalmessage,
        'status' => 'Pending',
        'datetime' => $datetimelocal,
      ];

      $emailData = [
        'job_id' => $jobid,
        'applicant_id' => $applicantid,
        'applicant_email' => $applicantemail,
        'applicant_name' => $applicantname,
        'interview_type' => $interviewtype,
        'meetingtime' => $datetimelocal,
        'invitationlink' => $invitationlink,
        'notes' => $additionalmessage
      ];

      $scheduleModel = new \App\Models\scheduledmeetingsmodel();
      $queryAddSchedule = $scheduleModel->insert($scheduleData);

      if ($queryAddSchedule) {
        $jobdetails_jobseeker = new \App\Models\jobSeekerJobDetailsModel();
        $queryUpdateIsScheduled = $jobdetails_jobseeker->query("Update jobseeker_jobdetails
                                        Set is_scheduled = 'Yes'
                                        Where job_seeker_id = $applicantid and job_details_id = $jobid");
        if ($queryUpdateIsScheduled) {
          $this->SendEmailToApplicant($emailData);
        }
        else {
          echo json_encode(array("result" => '3'));
        }
        
      }
      else {
        echo json_encode(array("result" => '3'));
      }
    }
  }


  private function SendEmailToApplicant($emailData)
  {
    $jobid = $emailData['job_id'];
    $applicantid = $emailData['applicant_id'];
    $applicantname = $emailData['applicant_name'];
    $applicantemail = $emailData['applicant_email'];
    $interviewtype = $emailData['interview_type'];
    $meetingtime = $emailData['meetingtime'];
    $invitationlink = $emailData['invitationlink'];
    $notes = $emailData['notes'];

    $timestamp = strtotime($meetingtime);
    $date = date('d, M Y', $timestamp);
    $time = date('H:i a', $timestamp);

    $db = db_connect();
    $query = $db->query(
      "SELECT
      JobDetails.jobtitle as JobTitle,
      Company.name as CompanyName,
      Company.contactNo as CompanyContact,
      Company.email as CompanyEmail,

      Employer.name as EmployerName,
      Employer.contactNo as EmployerContact,
      Employer.email as EmployerEmail

      FROM job_details JobDetails
      join employer Employer 
      on Employer.id = JobDetails.employer_id
      join company Company 
      on Company.id = Employer.company_id
      where JobDetails.id = $jobid
      "
    );

    $rowData = $query->getRow();



    $to = "$applicantemail";

    $subject = "Congratulations! You have been selected for an Interview by $rowData->CompanyName for the position of $rowData->JobTitle";

    if ($interviewtype == "Virtual Interview") {
      $is_virtual =  "<p style='color:black;'>You can join the meeting by clicking <a href='$invitationlink' target='_blank'>here</a></p>";
    } else {
      $is_virtual = "";
    }
    if ($notes == NULL || $notes == "") {
      $notes = "";
    } else {
      $notes = "<p style='color:black;'><b> Note: $notes</b></p>";
    }

    $message = "<p>Dear $applicantname, </p>
                                                 <p style='color:black;'>You have been selected by <b> $rowData->CompanyName </b> for an Interview for the position of <b> $rowData->JobTitle. </b> </p> 
                                                 You are required to attend a <b> $interviewtype </b> on the <b> $date at $time </b>.
                                                 $is_virtual
                                                 $notes
                                                 <p style='color:black;'><b> For More Information, contact the company: </b></p>
                                                 <ul style='color:black;'>
                                                 <li> <b> Company Name: </b> $rowData->CompanyName</li>
                                                 <li> <b>Company Contact No:  </b> $rowData->CompanyContact</li>
                                                 <li> <b>Company Email:  </b> $rowData->CompanyEmail </li>
                                                 <li> <b>Employer Name: </b> $rowData->EmployerName </li>
                                                 <li> <b>Employer Contact No: </b> $rowData->EmployerContact </li>
                                                 <li> <b>Employer Email: </b> $rowData->EmployerEmail </li>
                                                 </ul> 

                                                 <br>
                                                 <p style='color:black;'> <b> Thank You, </b></p>
                                                 <p style='color:black;'> FutureSeekers Team </p>

                                                 <p style='font-family:'Segoe UI',Tahoma,sans-serif;margin:0px 0px 0px 5px;color:#666;font-size:10px'>
                                                 This message was sent from an unmonitored email address. Please do not reply to this message.
                                             </p>
                                                 ";



    // $filepath = "cvfiles/$jobseeker_cv";

    $email = \config\Services::email();

    $email->setTo($to);

    $email->setFrom('futureseekersnew@gmail.com', 'FutureSeekers');

    $email->setSubject($subject);

    $email->setMessage($message);

    // $email->attach($filepath);

    if ($email->send()) {
      echo json_encode(array("result" => '1'));
    } else {

      $error = $email->printDebugger(['headers']);

      print_r($error);
    }
    // echo json_encode(array("result" => '1'));
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('Home/index')->with('fail', 'You are Logged out');
  }
}
