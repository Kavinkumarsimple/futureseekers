<?php

namespace App\Controllers;

class AdminHome extends BaseController {
  public function index() {
    if(session()->get('admin_id')== null){
      return redirect()->to('Admin/index')->with('fail', 'You must be logged in..');;
    }
    return view('AdminHome/index');
  }
}

?>