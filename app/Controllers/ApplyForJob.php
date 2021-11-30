<?php

namespace App\Controllers;

class ApplyForJob extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index()
  {

    $to      = 'futureseekersnew@outlook.com';
    $subject = 'Applied for the job';
    $message = 'hello i am musharraf';
    $email = \config\Services::email();
    $email->setTo($to);
    $email->setFrom('futureseekersnew@outlook.com','futureseekersnew');
    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
    if($email->send()){
      echo "email sent";
    }
    else{
      $data = $email->printDebugger(['headers']);
      print_r($data);
    }
    // if(session()->get('user_id')== null || session()->get('user_type') == "employer"){
    //     return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    //   }
    //   $session = session();
    //   $session->regenerate();
    //   $user_id = session()->get('user_id');
    //   $UserAccount = new \App\Models\userAccountModel();
    //   $user_info = $UserAccount->where('id', $user_id)->first();
    //   if ($user_info['status'] == 0) {
    //     return view('MyProfileApplicant/index');
    //   }
  
    //   return view('ApplyForJob/index');
  }



  public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('Home/index')->with('fail', 'You are Logged out');
	}
}
