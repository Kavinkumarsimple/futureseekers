<?php

namespace App\Controllers;

class AdminApplicantProfiles extends BaseController
{
  public function index()
  {
    if(session()->get('admin_id')== null){
      return redirect()->to('Admin/index')->with('fail', 'You must be logged in..');;
    }
    return view('AdminApplicantProfiles/index');
  }
  public function verify()
  {
    if(session()->get('admin_id')== null){
      return redirect()->to('Admin/index')->with('fail', 'You must be logged in..');;
    }
    //To Accept User--Changing Status to 1
    if (isset($_POST['auser'])) {
      $useraccountid = $this->request->getPost('account_id');
      echo $useraccountid;
      $UserAccount = new \App\Models\userAccountModel();
      $query = $UserAccount->query("update user_account set status = 1 where id = $useraccountid");
      return redirect()->to("//AdminApplicantProfiles/index")->with('info', 'Changes Made Succesfully');
    }
    //To Reject User--Changing Status to 2    
    if (isset($_POST['ruser'])) {
      $useraccountid = $this->request->getPost('account_id');
      echo $useraccountid;
      $UserAccount = new \App\Models\userAccountModel();
      $query = $UserAccount->query("update user_account set status = 2 where id = $useraccountid");
      return redirect()->to("//AdminApplicantProfiles/index")->with('info', 'Changes Made Succesfully');
    }
    //To Delete User--Changing Status to 2    
    if (isset($_POST['duser'])) {
      $useraccountid = $this->request->getPost('account_id1');
      echo $useraccountid;
      $UserAccount = new \App\Models\userAccountModel();
      $query = $UserAccount->query("update user_account set status = 3 where id = $useraccountid");
      return redirect()->to("//AdminApplicantProfiles/index")->with('info', 'Changes Made Succesfully');
    }
  }
}
