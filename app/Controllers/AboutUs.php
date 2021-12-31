<?php

namespace App\Controllers;

class AboutUs extends BaseController
{
	public function __construct()
	{
		helper('form');
		helper(['url', 'Login_helper']);
	}

	public function index()
	{
		
		return view('AboutUs/index');
	}



}