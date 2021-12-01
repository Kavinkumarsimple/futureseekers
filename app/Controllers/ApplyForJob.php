<?php

namespace App\Controllers;

class ApplyForJob extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index($jobid)
  { 

    echo $jobid;
  //    $job_detail_id = $jobid;
  
  //   if(session()->get('user_id')== null || session()->get('user_type') == "employer" || session()->get('user_type') == "admin"){
  //       return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
  //     }
  //     $session = session();
  //     $session->regenerate();
  //     $user_id = session()->get('user_id');

  //     $jobseekerM = new \App\Models\jobSeekerModel();
    
  //     $query_jobseeker = $jobseekerM->query("Select * from job_seeker where user_account_id = $user_id");
  //     foreach ($query_jobseeker->getResult() as $row) {
  //       $jobseeker_id = $row->id;
  //       }
  //       $validation = $this->validate([
  //         'CV' => [
  //           'rules' => 'uploaded[CV]|max_size[CV, 5000]|ext_in[CV,pdf]',
  //           'errors' => [
  //             'uploaded[CV]' => 'a pdf is Required'
  //           ]
  //         ]
  //       ]);
  //       if (!$validation) {

  //         return view('/ApplyForJob/index', ['validation' => $this->validator]);
    
  //       } else {
  //         $jobseekercv = $this->request->getFile('CV');
  //         $pdfname = $jobseekercv->getRandomName();

  //         if ($jobseekercv->isValid() && !$jobseekercv->hasMoved()) {
              
  //           $jobseekercv->move('jobseekersCVs/', $pdfname);}

  //           $values = [
  //             'job_seeker_id' => $jobseeker_id,
  //             'job_details_id'=> $job_detail_id,   
  //             'cv_name' => $pdfname        
  //    ];
        
  //       $jobdetailsM = new \App\Models\jobSeekerJobDetailsModel();

  //       $queryEmp = $jobdetailsM->insert($values);
  //       if(!$queryEmp){
  //    return redirect()->back()->with('fail', 'Please try again later..');
  //  }
  //  else{
  //    return redirect()->to('ApplicantHome')->with('success', 'Advertisement is queued for verification');
  //  }


  //       }
        
  }



  public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('Home/index')->with('fail', 'You are Logged out');
	}
}
