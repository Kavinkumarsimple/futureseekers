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

    <script src="<?= base_url('bootstrap/js/modalstuff.js') ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
    <title>Future Seekers.lk | Applicants for this Job</title>

    <style>
        #exampleModal {
            overflow-y: scroll;
        }

        .loader {
            width: 100%;
        }

        .loader-wheel {
            animation: spin 1s infinite linear;
            border: 2px solid rgba(30, 30, 30, 0.5);
            border-left: 4px solid black;
            border-radius: 50%;
            height: 50px;
            margin-bottom: 10px;
            width: 50px;
        }

        .loader-text {
            color: black;
            font-family: arial, sans-serif;
        }

        .loader-text:after {
            content: 'Sending Invitation';
            animation: load 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes load {
            0% {
                content: 'Sending Invitation';
            }

            33% {
                content: 'Sending Invitation.';
            }

            67% {
                content: 'Sending Invitation..';
            }

            100% {
                content: 'Sending Invitation...';
            }
        }
    </style>

</head>

<body>
    <div class="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href=""><img class="websitelogo" src="<?= base_url('Images/logo4.webp') ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url('EmployerHome/index') ?>">Jobs </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('MyJobsEmployer/index') ?>">My Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('PostAdvertEmployer/index') ?>">Post an Advert</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('MyProfileEmployer/index') ?>">My Profile</a>
                        </li>
                        <!-- Enter PHP code to check if the user is logged in or not in order to show login button -->

                        <li class="nav-item">

                            <a class="nav-link btn btn-danger logoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
                        </li>

                        <li class="nav-item mobile_logout">
                            <a class="nav-link mobilelogoutbtn" href="<?php echo site_url('Home/logout') ?>">Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div style="margin-top:35px; width:1200px; margin-left: auto; margin-right: auto;" id="failMsgFlash" class="alert alert-danger text-muted"> <?= session()->getFlashdata('fail'); ?> </div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div style="margin-top:35px; max-width:1200px; margin-left: auto; margin-right: auto;" class="alert alert-success text-muted" id="successMsgFlash"> <?= session()->getFlashdata('success'); ?> </div>
    <?php endif ?>

    <div class="shadow-lg mb-5 bg-white rounded card" style="margin-left:auto;margin-right:auto; width:1200px">
        <div class="card-header bg-primary" style="color:white">
            Applicants for <?php echo $jobdata['jobtitle']; ?>

        </div>
        <div class="card-body" style="padding-left: 0px !important; padding-right: 0px; padding-bottom: 5px !important;">
            <?php
            $jobid = $jobdata['id'];
            $jobseekerjobdetailsM = new \App\Models\jobSeekerJobDetailsModel();
            $JobAdvert = new \App\Models\jobDetailsModel();
            $jobseekerM = new \App\Models\jobSeekerModel();
            $UserAccount = new \App\Models\userAccountModel();
            $Company = new \App\Models\companyModel();
            $applicantcount = 0;

            $query = $jobseekerjobdetailsM->query("Select * from jobseeker_jobdetails where job_details_id = $jobid order by is_scheduled");
            foreach ($query->getResult() as $row) {
                $jobSeekerId = $row->job_seeker_id;
                $applicantcount = 1;
                $is_scheduled = $row->is_scheduled;

                $query2 = $jobseekerM->query("select * from job_seeker where id = $jobSeekerId");
                foreach ($query2->getResult() as $row2) {
                    $jname = $row2->name;
                    $jaddress = $row2->address;
                    $jdob = $row2->dob;
                    $jemail = $row2->email;
                    $jcontact = $row2->contactNo;
                    $jcurrentjob = $row2->currentJobTitle;
                    $jcvname = $row2->cv_file_dir;




                    echo "<div class=\"ratt \" >
                <div class=\"jobs_img_container\" style=\"width: 100px\">
                    <img class=\"jobs_img\" src='" . base_url() . "/images/applicant.webp" . "'>
                </div>
        
                <div style=\"flex-grow: 8\">
        
                    <div style=\"border: none !important\" class=\"list-group-item flex-column align-items-start\">
        
                        <div class=\"d-flex w-100 align-items-center\">
        
                            <h5 class=\"mb-1\" >$jname</h5> " . (($is_scheduled == 'Yes') ? '<span class="badge badge-success text-center ml-3">Shortlisted</span>' : ' ') . "
                            

                        </div>
        
                        <p class=\"mb-1 company_name\">$jcurrentjob</p>
        
                        <div class=\"flex-container2\" style=\"margin-top: 10px !important;\">
        
                            <div class=\" mb-1 cat_container badge badge-primary badge-pill\">
        
                                <small \">Date of Birth : $jdob</small>
        
                            </div>


        
                        
        
                                <div class=\" mb-1 cat_container2 badge badge-light badge-pill border border-secondary\">
                                <div class=\"img_and_element_holder\">
                                    <a href='" . base_url() . "/MyJobsEmployer/downloadPdf/$jcvname" . "'>
                                
                                        <span> <img class=\"span_img2\" src='" . base_url() . "/images/download.webp" . "' <small style=\"font-size:13px\">Download CV</small> </span>
        
                                    </a>
                                    </div>
        
                                </div>
        
                           
        
                            <!-- <small> Closing Date: 2021-06-07 03:55</small> -->
        
                        </div>
        
         
        
                        <div class=\"flex-container2\" style=\"margin-top: 10px !important;\">
        
                            <div style=\"margin-right:20px !important\">
        
                                <span> <img class=\"span_img\" src='" . base_url() . "/images/contact.webp" . "'></span><small style=\"font-size: 14px\"> $jcontact</small>
        
                            </div>
        
                            <div style=\"margin-right:20px !important\">
        
                                <span> <img style=\"width: 13px\" class=\"span_img\" src='" . base_url() . "/images/email.webp" . "'></span><small style=\"font-size: 14px\"> $jemail</small>
        
                            </div>

                            <div style=\"margin-right:20px !important\">
        
                                <span> <img style=\"width: 13px\" class=\"span_img\" src='" . base_url() . "/images/location.webp" . "'></span><small style=\"font-size: 14px\"> $jaddress</small>
        
                            </div>
        
                           
                        </div>
        
         
        
                    </div>
        
                </div>
        
         
        
                <div style=\"width: 200px\">
        
         
        
                    <div class=\"job_option_holder\">
        
                      
                        <button class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#exampleModal\"  onclick=\"PopoulateData('$jobid', '$jobSeekerId', '$jname', '$jemail')\" >Schedule Interview</button>
                        <p></p>
                        
                        <a href='" . base_url() . "/cvfiles/$jcvname" . "' target='_blank' class=\"btn btn-secondary btn-sm\">View CV</a>
     
        
                    </div>
        
                </div>
        
            </div>

            <hr class=\"my-4 bg-primary\">
            ";
                }
            }

            if ($applicantcount == 0) {
                echo "<b><p style=\"text-align:center;\">Looks Like no one has applied for this job offer yet</p></b>";
            }


            ?>

        </div>
    </div>


    <div class="container mt-2">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Send Interview Invitation
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h6 id="modal_body">
                            <form>
                                <div class="form-group">
                                    <label for="job_details-id" class="col-form-label">Job Reference Number:</label>
                                    <input type="text" class="form-control" id="job_details-id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="job_seeker-id" class="col-form-label">Applicant Reference Number:</label>
                                    <input type="text" class="form-control" id="job_seeker-id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_name" class="col-form-label">Applicant Name:</label>
                                    <input type="text" class="form-control" id="applicant_name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="applicant_email" class="col-form-label">Applicant Email:</label>
                                    <input type="text" class="form-control" id="applicant_email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="interview_type">Interview Type:</label>
                                    <select onchange="HideMeetingLinkBox()" name="interview_type" id="interview_type" class="form-select form-select-lg mb-3" style="font-size:15px !important" value="<?= set_value('interview_type'); ?>">
                                        <option value="Virtual Interview">Virtual Interview</option>
                                        <option value="Walk-In Interview">Walk-in Interview</option>
                                    </select>
                                </div>
                                <div id="meetingInviteDiv" class="form-group">
                                    <label for="invitation_link" class="col-form-label">Meeting Invitation Link:</label>
                                    <input type="text" class="form-control" id="invitation_link">
                                </div>
                                <div class="form-group">
                                    <label>Interview Date and Time</label>
                                    <input class="form-control" type="datetime-local" name="interviewdt" id="interviewdt" max="2023-12-31T00:00" min="2020-12-31T00:00" <?= set_value('interviewdt'); ?>">
                                    <small class="form-text text-danger"> <?= isset($validation) ? show_validation_error($validation, 'interviewdt') : '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="additional_message" class="col-form-label">Additional Message:</label>
                                    <textarea class="form-control" id="additional_message"></textarea>
                                </div>

                            </form>
                        </h6>
                        <!-- <div id="loading_sending_invite" class="mb-3 d-none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>

                            <span class="align-baseline "> Sending Invite ...</span>
                        </div> -->

                            <div id="loading_sending_invite" class="loader d-none">
                                <div class="loader-wheel"></div>
                                <div class="loader-text"></div>
                            </div>

                            <div style="margin-top:35px; max-width:1200px; margin-left: auto; margin-right: auto; display: none;" id="failMsgFlash" class="alert alert-danger text-muted"> </div>
                            <div style="margin-top:35px; max-width:1200px; margin-left: auto; margin-right: auto; display: none;" class="alert alert-success text-muted" id="successMsgFlash"> <?= session()->getFlashdata('success'); ?> </div>


                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" id="submit_invitation" onclick="SendInvitation()">
                            Send Interview Invitation
                        </button> -->

                        <button type="button" class="btn btn-success btn-sm" id="submit_invitation" onclick="SendInvitation()">
                            Send Interview Invitation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        function HideMeetingLinkBox() {
            var selected_val = document.getElementById("interview_type").value;
            if (selected_val == "Virtual Interview") {
                document.getElementById("meetingInviteDiv").style.display = "block";
            } else {
                document.getElementById("meetingInviteDiv").style.display = "none";
            }

        }
        $('#exampleModal').on('hidden.bs.modal', function() {
            //remove the backdrop
            $('.modal-backdrop').remove();
        });

        function PopoulateData($jobid, $applicant_id, $applicant_name, $applicant_email) {
            document.getElementById("job_details-id").value = $jobid;
            document.getElementById("job_seeker-id").value = $applicant_id;
            document.getElementById("applicant_name").value = $applicant_name;
            document.getElementById("applicant_email").value = $applicant_email;
        }

        function SendInvitation() {
            var jobid = document.getElementById("job_details-id").value;
            var applicantid = document.getElementById("job_seeker-id").value;
            var applicantname = document.getElementById("applicant_name").value;
            var applicantemail = document.getElementById("applicant_email").value;
            var interviewtype = document.getElementById("interview_type").value;
            var datetimelocal = document.getElementById("interviewdt").value;
            var invitationlink = document.getElementById("invitation_link").value;
            var additionalmessage = document.getElementById("additional_message").value;


            $.ajax({
                url: '<?php echo base_url('MyJobsEmployer/scheduleInterview'); ?>',
                type: "post",
                dataType: 'json',
                data: {
                    jobid: jobid,
                    applicantid: applicantid,
                    applicantname: applicantname,
                    applicantemail: applicantemail,
                    interviewtype: interviewtype,
                    datetimelocal: datetimelocal,
                    invitationlink: invitationlink,
                    additionalmessage: additionalmessage,
                },
                beforeSend: function() {
                    document.getElementById("submit_invitation").style.display = "none";
                    document.getElementById("loading_sending_invite").classList.remove("d-none");
                    console.log('Loading');
                },
                success: function(result) {
                    document.getElementById("loading_sending_invite").classList.add("d-none");
                    // document.getElementById("loading_sending_invite").style.display = "block !important";
                    // document.getElementById("exampleModal").modal('hide');

                    $res = result.result;
                    if ($res == '1') {
                        document.getElementById("successMsgFlash").style.display = "block";
                        document.getElementById("successMsgFlash").innerHTML = "Invitation Sent Successfully!";
                    } else if ($res == '2') {
                        document.getElementById("failMsgFlash").style.display = "block";
                        document.getElementById("failMsgFlash").innerHTML = "This Applicant has already been shortlisted!";
                    } else if ($res == '3') {
                        document.getElementById("failMsgFlash").style.display = "block";
                        document.getElementById("failMsgFlash").innerHTML = "Something went wrong. Try Again Later...";
                    } else if ($res == '4') {
                        document.getElementById("failMsgFlash").style.display = "block";
                        document.getElementById("failMsgFlash").innerHTML = "Something went wrong. Please try again later..";
                    }
                    // document.documentElement.scrollTop = 0;
                },
                complete: function() {     
                    document.getElementById("loading_sending_invite").classList.add("d-none");
                    setTimeout(() => { 
                        document.getElementById("submit_invitation").style.display = "block";
                        $('#exampleModal').modal('hide'); 
                        location.reload();
                    }, 3000);
                    // location.reload();
                    console.log('Completed');
                }

            });
        }
    </script>
</body>

</html>