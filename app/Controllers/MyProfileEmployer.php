<?php

namespace App\Controllers;

class MyProfileEmployer extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  
  public function index()
  {
    if(session()->get('user_id')== null || session()->get('user_type')== "applicant"){
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }
    return view('MyProfileEmployer/index');
   
  }

  
  public function editProfile()
  {

    if(session()->get('user_id')== null || session()->get('user_type')== "applicant"){
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }

    $validation = $this->validate([
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Name is Required'
        ]
      ],
      'contactNo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Contact No is required'
        ]
      ],
      'jobPosition' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Job Position is Required'
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Email is Required',
          'valid_email' => 'Must be a valid Email Address'
        ]
      ],
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Username is required'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password is Required'
        ]
      ],
      'cname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Company Name is Required'
        ]
      ],
      'ccontactNo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Company Name is Required'
        ]
      ],
      'cemail' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Company Name is Required'
        ]
      ],
      // 'logo' => [
      //   'rules' => 'required',
      //   'errors' => [
      //     'required' => 'Company Logo is Required'
      //   ]
      // ]
    ]);

    if (!$validation) {
      //echo "Validation Error";
      return view('/MyProfileEmployer/index', ['validation' => $this->validator]);
    }
    else {
      $name = $this->request->getPost('name');
      $contactNo = $this->request->getPost('contactNo');
      $jobPosition = $this->request->getPost('jobPosition');
      $email = $this->request->getPost('email');
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $cname = $this->request->getPost('cname');
      $ccontactNo = $this->request->getPost('ccontactNo');
      $cemail = $this->request->getPost('cemail');
      $imgfile = $this->request->getFile('logo');

      session();
      session()->regenerate();
      $user_id = session()->get('user_id');
      // echo $user_id;

      if (!$imgfile->isValid()) {
        throw new \RuntimeException($imgfile->getErrorString() . '(' . $imgfile->getError() . ')');
      }

      $logo_dir = $imgfile->getRandomName();
      if ($imgfile->isValid() && !$imgfile->hasMoved()) {
        $imgfile->move('logo/', $logo_dir);
      }
      
      
      $UserAccountM = new \App\Models\userAccountModel();
      // $queryUser = $UserAccountM->set($valuesUser)->where('id', $user_id);
      $queryUser = $UserAccountM->query("Update user_account
                                          Set username = '$username',
                                              password = '$password'
                                          Where id = $user_id");
      if(!$queryUser) {
        //echo "fail";
      }

      $CompanyM = new \App\Models\companyModel();
      // // $queryCom = $CompanyM->set($valuesCom)->where('name', $cname);
      $queryCom = $CompanyM->query("Update company
                                    Set name = '$cname',
                                        contactNo = '$ccontactNo',
                                        email = '$cemail',
                                        logo_dir = '$logo_dir'
                                    Where name = '$cname'");
      if(!$queryCom){
        //echo "fail";
      }

      $EmployerM = new \App\Models\employerModel();
      // $queryEmp = $EmployerM->set($valuesEmp)->where('user_account_id', $user_id);
      $queryEmp = $EmployerM->query("Update employer
                                      Set name = '$name',
                                          contactNo = $contactNo,
                                          jobPosition = '$jobPosition',
                                          email = '$email'
                                      Where user_account_id = $user_id");
      if(!$queryEmp){
        return redirect()->back()->with('fail', 'Please try again later..');
      }
      else {
        return redirect()->to('MyProfileEmployer')->with('success', 'Changes made successfully');
      }

    }
    
  }
}
