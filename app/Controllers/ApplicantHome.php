<?php

namespace App\Controllers;

class ApplicantHome extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index()
  {
    if(session()->get('user_id')== null || session()->get('user_type') == "employer"){
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

    return view('ApplicantHome/index');
  }

  public function downloadPdf($data){
   // echo $data;
    
   header("Content-type: application/pdf");
   header("Content-Disposition: attachment;filename=$data");
   header("Content-Transfer-Encoding: binary");
   header('Pragma: no-cache');
   header('Expires: 0');
   set_time_limit(0);
   ob_clean();
   flush();
   readfile('adverts/'.$data);


  }


  public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('Home/index')->with('fail', 'You are Logged out');
	}
}
