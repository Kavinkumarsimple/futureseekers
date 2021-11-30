<?php

namespace App\Controllers;

class AdminJobPostings extends BaseController
{
  public function index()
  {
    if (session()->get('user_id') == null) {
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }
    return view('AdminJobPostings/index');
  }

  public function verify()
  {
    if (session()->get('user_id') == null) {
      return redirect()->to('Home/index')->with('fail', 'You must be logged in..');;
    }

    if (isset($_POST['ajob'])) {
      $jobid = $this->request->getPost('jobidfield');
      echo $jobid;
      $jobdetails = new \App\Models\jobDetailsModel();
      $query = $jobdetails->query("update job_details set status = 1 where id = $jobid");
      return redirect()->to("//AdminJobPostings/index")->with('info', 'AD verified');
    }


    if (isset($_POST['rjob'])) {
      $jobid = $this->request->getPost('jobidfield');
      echo $jobid;
      $jobdetails = new \App\Models\jobDetailsModel();
      $query = $jobdetails->query("update job_details set status = 2 where id = $jobid");
      return redirect()->to("//AdminJobPostings/index")->with('info', 'AD rejected');
    }

    if (isset($_POST['vjob'])) {
      $jobid = $this->request->getPost('jobidfield');
      $jobdetails = new \App\Models\jobDetailsModel();
      $filenameq = $jobdetails->query("Select description from job_details where id = $jobid");
      foreach ($filenameq->getResult() as $yt) {
        $filename = $yt->description;
        //$Vdata = file_get_contents('adverts/'.$filename);
     



        //header('Content-type: application/pdf');
  
        //header('Content-Disposition: inline; filename="' . $filename . '"');
  
// // header('Content-Transfer-Encoding: binary');
  
// // header('Accept-Ranges: bytes');
  
// // // Read the file
// // @readfile($filename);



        header("Content-type: application/pdf");
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary");
        header('Pragma: no-cache');
        header('Expires: 0');
        set_time_limit(0);
        ob_clean();
        flush();
        readfile('adverts/'.$filename);


        // $file = $_GET[$filename];
        //  $filepath = 'adevert/'. $filename;
        //  if (file_exists($filepath) && is_readable($filepath) && preg_match('/\.pdf$/',$filepath)) {
        //    header('Content-Type: application/pdf');
        //    header("Content-Disposition: attachment; filename=\"$filepath\"");
        //    readfile($filepath);
        //    return redirect()->to("//AdminJobPostings/index")->with('info', 'Downloaded');
        // }
        //  else{echo "not working";}
      }
    }
  }
}
