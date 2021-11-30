<?php

namespace App\Controllers;

class AdminHome extends BaseController {
  public function index() {
    if(session()->get('user_id')== null){
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }
    return view('AdminHome/index');
  }
}

?>