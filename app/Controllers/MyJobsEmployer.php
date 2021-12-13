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

  public function showapplicants($jobID){
   
    $jobM = new \App\Models\jobDetailsModel();
    $id = $jobID;
    $jobdata = $jobM->find($id);


    $data = ['jobid' => $jobID,
             'jobdata' => $jobdata];
    return view('EmployerViewApplicants/index.php', $data);
    
  }

  public function downloadPdf($jcvname){
    // echo $data;
     
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment;filename=$jcvname");
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    set_time_limit(0);
    ob_clean();
    flush();
    readfile('cvfiles/'.$jcvname);

   }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('Home/index')->with('fail', 'You are Logged out');
  }
}
