<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct() {
		helper('form');
		helper(['url', 'Login_helper']);	 
}

	public function index()
	{
		return view('Home/index');
	}

	public function login() {
		$validation = $this->validate([
			'uname' => [
					'rules' => 'required|is_not_unique[User.uname]',
					'errors' => [
							'required' => 'Username is required',
							'is_not_unique' => 'This username does not exist'
					]
			] ,
			'passwd' => [
					'rules' => 'required',
					'errors' => [
							'required' => 'Password is Required'
					] 
			]
		]);

		$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');
	
			$userAccountModel = new \App\Models\userAccountModel();
			$user_info = $userAccountModel->where('username', $username)->first();
			
			if($user_info != null && $user_info['password'] == $password) {
				$session=session();
				$session->regenerate();
				$session->set('user_id', $user_info['id']);
	
				return redirect()->to("/Home/loginSuccess")->with('info', 'Login Successful');
			} else {
				return redirect()->to("/Home/loginFailed")->with('info', 'Given Name or Password is not correct, try again');
			}

		// if (!$validation) {
		// 		return view('/Home/index', ['validation' => $this->validator]);   
		// } else {
		// 	$username = $this->request->getPost('username');
		// 	$password = $this->request->getPost('password');
	
		// 	$userAccountModel = new \App\Models\userAccountModel();
		// 	$user_info = $userAccountModel->where('username', $username)->first();
			
		// 	if($user_info != null && $user_info['password'] == $password) {
		// 		$session=session();
		// 		$session->regenerate();
		// 		$session->set('user_id', $user_info['id']);
	
		// 		return redirect()->to("/Home/loginSuccess")->with('info', 'Login Successful');
		// 	} else {
		// 		return redirect()->to("/Home/loginFailed")->with('info', 'Given Name or Password is not correct, try again');
		// 	}
		// }
	}

	public function loginSuccess() {
		$user_id = session()->get('user_id');
		$userAccountModel = new \App\Models\userAccountModel();
		$user_type = $userAccountModel->where('id', $user_id)->first();
		if ($user_type['type'] == "employer") {
			return view('/MyProfileEmployer/index');
		} else {
			return view('/MyProfileApplicant/index');
		}
	}

	public function loginFailed() {
		$session=session();
		$session->setFlashdata('fail', 'Incorrect Password!');
	}

	public function logout() {
		$session=session();
    $session->destroy();
    return redirect()->to('Home/index')->with('fail', 'You are Logged out');
	}

}
