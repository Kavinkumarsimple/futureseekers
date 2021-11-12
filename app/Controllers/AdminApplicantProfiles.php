<?php

namespace App\Controllers;

class AdminApplicantProfiles extends BaseController
{
  public function index()
  {
    return view('AdminApplicantProfiles/index');
  }
  public function verify()
  {

    $useraccountid = $this->request->getPost('verify');
    // $value = ['status' => 1];

    // $UserAccount = new \App\Models\userAccountModel();
    // $query = $UserAccount->set($value)->where('id', $useraccountid);



    // return redirect()->to("//AdminApplicantProfiles/index")->with('info', 'Changes Made Succesfully');

  }
}
