<?php

namespace App\Controllers;

class MyProfileApplicant extends BaseController
{
  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }
  public function index()
  {
    return view('MyProfileApplicant/index');
  }
  public function editProfile()
  {
    $validation = $this->validate([
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Name is Required'
        ]
      ],
      'address' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Address is Required'
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Email is Required',
          'valid_email' => 'Must be a valid Email Address'
        ]
      ],
      'contactNo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Contact No is required'
        ]
      ],
      'dob' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Date of Birth is Required'
        ]
      ],
      'currentJobTitle' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Job Position is Required'
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
      ]
    ]);

    if (!$validation) {
      //echo "Validation Error";
      return view('/MyProfileEmployer/index', ['validation' => $this->validator]);
    } else {
      $name = $this->request->getPost('name');
      $address = $this->request->getPost('address');
      $email = $this->request->getPost('email');
      $dob = $this->request->getPost('dob');
      $contactNo = $this->request->getPost('contactNo');
      $currentJobTitle = $this->request->getPost('currentJobTitle');
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      session();
      session()->regenerate();
      $user_id = session()->get('user_id');

      // echo $user_id;
      // echo $name;
      // echo $address;
      // echo $email;
      // echo $dob;
      // echo $contactNo;
      // echo $currentJobTitle;

      $UserAccountM = new \App\Models\userAccountModel();
      $queryuser = $UserAccountM->query("Update user_account
                                          Set username = '$username',
                                              password = '$password'
                                          Where id = $user_id");
      if (!$queryuser) {
        //echo "fail";
      }

      $JobSeekerM = new \App\Models\jobSeekerModel();
      $queryJobSeeker = $JobSeekerM->query("Update job_seeker
                                      Set name = '$name',
                                          address = '$address',
                                          email = '$email',
                                          dob = '$dob',
                                          contactNo = $contactNo,
                                          currentJobTitle = '$currentJobTitle'
                                      Where user_account_id = $user_id");
      if (!$queryJobSeeker) {
        return redirect()->back()->with('fail', 'Please try again later..');
      } else {
        return redirect()->to('MyProfileApplicant')->with('success', 'Changes made successfully');
      }
    }
  }
}
