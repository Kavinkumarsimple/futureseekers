<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" name="This is the applicant portal page of FutureSeekers.lk, Applicant can use this page to view and edit their profile, view job adverts and apply for  jobs here">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/applicant_home.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS stylesheet for navigation bar -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/navbar.css') ?>" />

    <!-- For the Font Library -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Raleway:wght@300&display=swap" rel="stylesheet">

    <!-- Scripts for Navbar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    



    <title>Future Seekers.lk | Applicant Portal</title>
</head>

<body>

    <div class="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href=""><img class="websitelogo" src="<?= base_url('Images/logo4.jpg') ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url('ApplicantHome/index') ?>">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">My Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('MyProfileApplicant/index') ?>">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">About Us</a>
                        </li>
                        <!-- Enter PHP code to check if the user is logged in or not in order to show login button -->
                        <!-- <li class="nav-item">
                            <a class="nav-link btn btn btn-primary logoutbtn" href="#">Sign in / Register</a>
                        </li> -->
                        <li class="nav-item">
                            <!-- For blue button: btn btn-primary -->
                            <a class="nav-link btn btn-danger logoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
                        </li>
                        <!-- <li class="nav-item mobile_logout">
                            <a class="nav-link mobileloginbtn" href="#">Sign in / Register</a>
                        </li>      -->
                        <li class="nav-item mobile_logout">
                            <a class="nav-link mobilelogoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <h2 class="card-header">New Job Advertisements</h2>

    
    <?php
    $JobAdvert = new \App\Models\jobDetailsModel();
    $Employer = new \App\Models\employerModel();
    $UserAccount = new \App\Models\userAccountModel();
    $Company = new \App\Models\companyModel();

    $query = $JobAdvert->query("Select * from job_details where status = 1");
    foreach ($query->getResult() as $row) {
        
        $jobTitle = $row->jobtitle;
        $jobCategory = $row->jobCategory;
        $pDate = $row->dateTime;
        $cDate = $row->closingDate;
        $employerId = $row->employer_id;
        $pdfname = $row->description;

        $query_employer = $Employer->query("Select * from employer where id = $employerId");
        foreach ($query_employer->getResult() as $row2) {
            $companyID = $row2->company_id;

            $query_company = $UserAccount->query("Select * from company where id = $companyID");
            foreach ($query_company->getResult() as $row3) {
                $jobId = $row->id;
                $companyName = $row3->name;
                $companyNo = $row3->contactNo;
                $companyEmail = $row3->email;
                $logo = $row3->logo_dir;
           

               echo "<div class=\"flex-container\">
                <div class=\"jobs_img_container\" style=\"flex-grow: 1\">
                    <img class=\"jobs_img\" src='" . base_url() . "/logo/" . $logo . "'>
                </div>
        
                <div style=\"flex-grow: 8\">
        
                    <div style=\"border: none !important\" class=\"list-group-item flex-column align-items-start\">
        
                        <div class=\"d-flex w-100 justify-content-between\">
        
                            <h5 class=\"mb-1\">$jobTitle</h5>
        
                            <!-- <small> $cDate </small> -->
        
                        </div>
        
                        <p class=\"mb-1\">$companyName</p>
        
                        <div class=\"flex-container2\">
        
                            <div class=\" mb-1 cat_container badge badge-primary badge-pill\">
        
                                <small style=\"font-size:12px\">$jobCategory</small>
        
                            </div>
        
                            <div class=\" mb-1 cat_container badge badge-light badge-pill border border-secondary\">
        
                                <span> <img style=\"width: 11px\" class=\"span_img\" src='" . base_url() . "/images/clock_timer.png" . "'></span><small style=\"font-size:11px \">$cDate</small>
        
                            </div>
        
                        
        
                                <div class=\" mb-1 cat_container badge badge-light badge-pill border border-secondary\">
        
                                <a href='" . base_url() . "/ApplicantHome/downloadPdf/$pdfname" . "'>
                                
                                    <span> <img style=\"width: 12px\" class=\"span_img\" src='" . base_url() . "/images/download.png" . "' <small style=\"font-size:11px\">Download Advert</small> </span>
        
                                    </a>
        
                                </div>
        
                           
        
                            <!-- <small> Closing Date: 2021-06-07 03:55</small> -->
        
                        </div>
        
         
        
                        <div class=\"flex-container2\">
        
                            <div>
        
                                <span> <img class=\"span_img\" src='" . base_url() . "/images/contact.png" . "'></span><small> 0778277271</small>
        
                            </div>
        
                            <div>
        
                                <span> <img style=\"width: 13px\" class=\"span_img\" src='" . base_url() . "/images/email.png" . "'></span><small> $companyEmail</small>
        
                            </div>
        
                            <!-- <small> Closing Date: 2021-06-07 03:55</small> -->
        
                        </div>
        
         
        
                    </div>
        
                </div>
        
         
        
                <div style=\"flex-grow: 2\">
        
         
        
                    <div class=\"job_option_holder\">
        
                       
                         <!-- Button trigger modal -->
                         <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
                           Apply for this Job
                           
                         </button>
                         <!-- Modal -->
                         
                         <div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
                         <div class=\"modal-dialog modal-dialog-centered\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\">
                         <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Apply for this Job</h5>
                         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                         </div>
                         <div class=\"modal-body\">
                         <form action = '" . site_url() . "/ApplyForJob/index/$jobId" . "' class=\"form-container\">
                         <h4>Upload Your CV</h4>
 
                         <input class=\"form-control\" type=\"file\" id='CV' name='CV' value = '" . set_value("CV") . "'   />
 
                        </div>
                        <div class=\"modal-footer\">
                        
                
                        
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Apply</button>
                        </form>
                        </div></div></div></div>
        
                        <p></p>
        
                        <a href='" . base_url() . "/adverts/$pdfname" . "' target='_blank' class=\"btn btn-secondary btn-sm\">View Advert</a>
        
                        <!-- <p></p>
        
                        <button type=\"button\" class=\"btn btn-secondary btn-sm\">Download Advert</button> -->
        
         
        
                    </div>
        
                </div>
        
            </div>";
            }
               
            }
        }
    
    ?>




<input class="form-control" type="file" id='description' name='description'   />

</body>

</html>