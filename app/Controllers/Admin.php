<?php

namespace App\Controllers;

class Admin extends BaseController
{

  public function __construct()
  {
    helper('form');
    helper(['url', 'Login_helper']);
  }

  public function index()
  {
    return view('Admin/index');
  }

  public function login()
  {
    $validation = $this->validate([
      'username' => [
        'rules' => 'required|is_not_unique[user_account.username]',
        'errors' => [
          'required' => 'Username is required',
          'is_not_unique' => 'This username does not exist'
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
      return view('/Admin/index', ['validation' => $this->validator]);
    } else {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      $userAccountModel = new \App\Models\userAccountModel();
      $user_info = $userAccountModel->where('username', $username)->first();

      if ($user_info != null && $user_info['password'] == $password) {
        $session = session();
        $session->regenerate();
        $session->set('user_id', $user_info['id']);

        return redirect()->to("/AdminHome/index")->with('info', 'Login Successful');
      } else {
        session()->setFlashdata('fail', 'Incorrect Password!');
        return redirect()->to('/Admin/index')->withInput();
        //return redirect()->to("/Home/loginFailed")->with('info', 'Given Name or Password is not correct, try again');
      }
    }
  }
}
