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

    if(session()->get('user_id')== null || session()->get('user_type') == "employer" || session()->get('user_type') == "admin"){
        return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
      }
      $session = session();
      $session->regenerate();
      $user_id = session()->get('user_id');
      $UserAccount = new \App\Models\userAccountModel();
      $user_info = $UserAccount->where('id', $user_id)->first();
      if ($user_info['status'] == 0) {
        return view('MyProfileApplicant/index');
      }
  
      return view('ApplyForJob/index');
  }



  public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('Home/index')->with('fail', 'You are Logged out');
	}
}
