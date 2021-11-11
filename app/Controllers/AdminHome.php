<?php

namespace App\Controllers;

class AdminHome extends BaseController {
  public function index() {
    return view('AdminHome/index');
  }
}

?>