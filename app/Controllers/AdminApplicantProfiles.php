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

    $useraccountid = $this->request->getPost('account_id');
    echo $useraccountid;
    $value = ['status' => 1];
    $UserAccount = new \App\Models\userAccountModel();
    $query = $UserAccount->query("update user_account set status = 1 where id = $useraccountid");
    return redirect()->to("//AdminApplicantProfiles/index")->with('info', 'Changes Made Succesfully');

  }
  
}
