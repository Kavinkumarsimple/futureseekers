<?php

namespace App\Controllers;

class Register extends BaseController
{
	public function index()
	{
		return view('Register/index');
	}

  public function createEmployer() {

    //getting values from form
    $name = $this->request->getPost('name');               //employer
    $contactNo = $this->request->getPost('contactNo');     //employer
    $jobPostion = $this->request->getPost('jobPosition');  //employer
    $email = $this->request->getPost('email');             //employer
    $cname = $this->request->getPost('cname');             //company
    $username = $this->request->getPost('username');       //useraccount
    $password = $this->request->getPost('password');       //useraccount

    
    //useraccount table info
    $valuesUser = [
                    'username' => $username,
                    'password' => $password
    ];
    
    $userAccountModel = new \App\Models\userAccountModel();
    
    //inserting info to db table
    $queryUser = $userAccountModel->insert($valuesUser);
    if(!$queryUser){
      // return redirect()->back()->with('fail', 'Please try again later..');
    }
    else{
      // return redirect()->to('Register')->with('success', 'User Registration Successful');
     
    }

    //company table info
    $valuesCom = [
      'name' => $cname
];

    $companyModel = new \App\Models\companyModel();
    
    //inserting info to db table
    $queryCom = $companyModel->insert($valuesCom);
    if(!$queryCom){
      // return redirect()->back()->with('fail', 'Please try again later..');
    }
    else{
      // echo $queryCom;
      // return redirect()->to('Register')->with('success', 'User Registration Successful');
    }

    //employer table info
    $valuesEmp = [
      'name' => $name,
      'contactNo' => $contactNo,
      'jobPosition' => $jobPostion,
      'email' => $email,
      'company_id' => $queryCom,
      'user_account_id' => $queryUser
    ];

    $employerModel = new \App\Models\employerModel();

    //inserting info to db table
    $queryEmp = $employerModel->insert($valuesEmp);
    if(!$queryEmp){
      // return redirect()->back()->with('fail', 'Please try again later..');
    }
    else{
      // return redirect()->to('Register')->with('success', 'User Registration Successful');
    }
  }
  public function createJobSeeker() {

    //getting values from form
    $name = $this->request->getPost('name');                    //jobseeker
    $address = $this->request->getPost('address');              //jobseeker
    $email = $this->request->getPost('email');                  //jobseeker
    $contactNo = $this->request->getPost('contactNo');          //jobseeker
    $dob = $this->request->getPost('dob');                      //jobseeker
    $currentJobTitle = $this->request->getPost('currentJobTitle');  //jobseeker
    $username = $this->request->getPost('username');            //useraccount
    $password = $this->request->getPost('password');            //useraccount

    //useraccount table info
    $valuesUser = [
                    'username' => $username,
                    'password' => $password
    ];

    $userAccountModel = new \App\Models\userAccountModel();
    
    //inserting info to db table
    $queryUser = $userAccountModel->insert($valuesUser);
    if(!$queryUser){
      // return redirect()->back()->with('fail', 'Please try again later..');
    }
    else{
      // return redirect()->to('Register')->with('success', 'User Registration Successful');
     
    }

    //jobseeker table info
    $valuesSeeker = [
                      'name' => $name,
                      'address' => $address,
                      'email' => $email,
                      'contactNo' => $contactNo,
                      'dob' => $dob,
                      'currentJobTitle' => $currentJobTitle,
                      'user_account_id' => $queryUser
    ];

    $jobSeekerModel = new \App\Models\jobSeekerModel();

    //inserting info to db table
    $querySeeker = $jobSeekerModel->insert($valuesSeeker);
    if(!$querySeeker){
      return redirect()->back()->with('fail', 'Please try again later..');
    }
    else{
      return redirect()->to('Register')->with('success', 'User Registration Successful');
     
    }
  }

}
