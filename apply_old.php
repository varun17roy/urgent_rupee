<!DOCTYPE html>

<?php

error_reporting(E_ALL);

ini_set('display_errors', 'On');



//Include database configuration file

include ('includes/config.php');



//Get all state data

// $query = "SELECT * FROM s_state  ORDER BY stateName ASC";

$query = "SELECT * FROM states WHERE status=1 ORDER BY stateName ASC";

$run_query = mysqli_query($con, $query);

//Count total number of rows

$count = mysqli_num_rows($run_query);

$fbLeads = '';



?>

<html lang="en">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Apply Now || Urgentrupee || Short-term Loans Apply</title>

    <!-- favicons Icons -->

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />

    <link rel="manifest" href="assets/images/favicons/site.html" />

    <meta name="description" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />

    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/vendors/finlon-icons/style.css" />

    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />

    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />

    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.min.css" />

    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />

    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />

    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />

    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />

    <link rel="stylesheet" href="assets/vendors/owl-carousel/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="assets/vendors/owl-carousel/assets/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/css/finlon.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        /* Chrome, Safari, Edge, Opera */

        input::-webkit-outer-spin-button,

        input::-webkit-inner-spin-button {

            -webkit-appearance: none;

            margin: 0;

        }



        /* Firefox */

        input[type=number] {

            -moz-appearance: textfield;

        }
    </style>

    <script>

        function restrictAlphabets(e) {

            var x = e.which || e.keycode;

            if ((x >= 48 && x <= 57) || (x == 46))

                return true;

            else

                return false;

        }



        function restrictNumber(e) {

            var x = e.which || e.keycode;

            if ((x >= 48 && x <= 57) || (x == 46))

                return false;

            else

                return true;

        }



        function getCity(val) {

            $.ajax({

                type: "POST",

                url: "ajaxFile.php",

                data: 'state_id=' + val.substring(0, 2),

                success: function (data) {

                    $("#inputCity").html(data);

                }

            });

        }



        $(function () {

            var dtToday = new Date();



            var month = dtToday.getMonth() + 1; //January is 0 so need to add 1 to make it 1!

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();



            if (month < 10)

                month = '0' + month.toString();

            if (day < 10)

                day = '0' + day.toString();



            // var maxDate = year + '-' + month + '-' + day;    



            var maxDateinSec = new Date(dtToday.setFullYear(dtToday.getFullYear() - 18));

            var maxMonth = maxDateinSec.getMonth() + 1;

            var maxDay = maxDateinSec.getDate();

            var maxYear = maxDateinSec.getFullYear();



            if (maxMonth < 10)

                maxMonth = '0' + maxMonth.toString();

            if (day < 10)

                maxDay = '0' + maxDay.toString();



            var maxDate = maxYear + '-' + maxMonth + '-' + maxDay;



            $('#dob').attr('max', maxDate);



            var minDateinSec = new Date(dtToday.setFullYear(dtToday.getFullYear() - (65 - 18)));

            var minMonth = minDateinSec.getMonth() + 1;

            var minDay = minDateinSec.getDate();

            var minYear = minDateinSec.getFullYear();



            if (minMonth < 10)

                minMonth = '0' + minMonth.toString();

            if (day < 10)

                minDay = '0' + minDay.toString();



            var minDate = minYear + '-' + minMonth + '-' + minDay;



            $('#dob').attr('min', minDate);

        });





        /*		$(document).ready(function(){

        

       

           

           $(".PAN").change(function () {      

            var inputvalues = $(this).val();      

              var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;    

              if(!regex.test(inputvalues)){      

              $(".pan").val("");    

             // alert("invalid PAN no");    

              return regex.test('');    

              }    

            }); 

        });*/

    </script>

</head>



<body class="custom-cursor">



    <div class="custom-cursor__cursor"></div>

    <div class="custom-cursor__cursor-two"></div>



    <div class="preloader">

        <div class="preloader__image"></div>

    </div>

    <!-- /.preloader -->

    <div class="page-wrapper">

        <?php include "includes/header.php" ?>

        <nav class="main-menu">

            <div class="container-fluid">

                <div class="main-menu__logo">

                    <svg xmlns="http://www.w3.org/2000/svg" class="main-menu__logo__shape-1" viewBox="0 0 317 120">

                        <path d="M259.856,120H0V0H274l43,37.481Z" />

                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="main-menu__logo__shape-2" viewBox="0 0 317 120">

                        <path d="M259.856,120H0V0H274l43,37.481Z" />

                    </svg>

                    <a href="index.php">

                        <img src="assets/images/logo-dark.png" width="140" loading="lazy" height="51" alt="Urgentrupee">

                    </a>

                </div>

                <div class="main-menu__nav">

                    <ul class="main-menu__list">

                        <li>

                            <a href="index.php">Home</a>

                        </li>

                        <li>

                            <a href="about.php">About</a>

                        </li>



                        <li>

                            <a href="how-it-works.php">How it Works</a>

                        </li>

                        <li>

                            <a href="loan-repay.php">Loan Repayment</a>

                        </li>

                        <li>

                            <a href="faq.php">FAQ's</a>

                        </li>



                        <li>

                            <a href="contact.php">Contact</a>

                        </li>

                    </ul>

                </div>

                <div class="main-menu__right">

                    <a href="#" class="main-menu__toggler mobile-nav__toggler">

                        <i class="fa fa-bars"></i>

                    </a>

                    <a href="apply.php" class="thm-btn main-menu__btn">Loan Apply</a>

                    <a href="tel:9643003906" class="main-menu__contact">

                        <span class="main-menu__contact__icon">

                            <i class="icon-phone"></i>

                        </span>

                        <span class="main-menu__contact__text">

                            <strong>+91-9643-003-906</strong>

                            Mon to Sat: 10:00 am to 7:00 pm

                        </span>

                    </a>

                </div>

            </div>

        </nav>

        <div class="stricky-header stricked-menu main-menu">

            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->

        </div><!-- /.stricky-header -->

        <section class="page-header">

            <div class="page-header__bg"
                style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.webp);"></div>

            <!-- /.page-header__bg -->

            <div class="container">

                <ul class="thm-breadcrumb list-unstyled">

                    <li><a href="index.php">Home</a></li>

                    <li><span>Apply Now</span></li>

                </ul><!-- /.thm-breadcrumb list-unstyled -->

                <h2>Apply Now</h2>

            </div><!-- /.container -->

        </section><!-- /.page-header -->





        <section class="finloan-apply-one pt-120 pb-120">

            <div class="container">

                <div class="col-lg-12">

                    <form action="" method="post" class="form-one contact-one__form">

                        <div class="contact-one__form-box">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="block-title">

                                        <h2 class="block-title__title">Loan Details</h2>

                                    </div><!-- /.block-title-->

                                </div><!-- /.col-md-12-->

                            </div><!-- /.row-->



                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Loan Amount*</label>

                                        <input class="form-control" type="number" id="inputLoanAmount"
                                            name="loanRequeried" placeholder="Loan Amount" required
                                            onkeypress='return restrictAlphabets(event)' minlength="4" maxlength="6" />

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Monthly Income*</label>

                                        <input class="form-control" type="number" id="InputMonthlyIncome"
                                            name="monthlyIncome" placeholder="Monthly Income" required
                                            onkeypress='return restrictAlphabets(event)' minlength="5" maxlength="6" />

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Purpose of Loan</label>

                                        <select name="purposeloan" class="form-control" required>

                                            <option value="">Purpose of Loan</option>

                                            <option value="Personal">Personal</option>

                                            <option value="Weddings">Weddings</option>

                                            <option value="Medical">Medical</option>

                                            <option value="Travel">Travel</option>

                                            <option value="Home Interior">Home Interior</option>

                                            <option value="Education">Education</option>

                                            <option value="Loan Payment">Loan Payment</option>

                                            <option value="Emergency">Emergency</option>

                                        </select>

                                        <i class="fas fa-chevron-down"></i>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                            </div><!-- /.row-->



                        </div><!-- /.contact-one__form-box-->

                        <div class="contact-one__form-box">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="block-title pt-50">

                                        <h2 class="block-title__title">Personal Details</h2>

                                    </div><!-- /.block-title-->

                                </div><!-- /.col-md-12-->

                            </div><!-- /.row-->



                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Full Name [As Per PAN Card]*</label>

                                        <input class="form-control" type="text" name="name" placeholder="Full Name"
                                            required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Mobile Number*</label>

                                        <input class="form-control" type="number" name="mobile"
                                            placeholder="Mobile Number" required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Email*</label>

                                        <input class="form-control" type="email" name="email" placeholder="Your Email"
                                            required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                            </div><!-- /.row-->



                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Birth of Date*</label>

                                        <input class="form-control" type="date" name="dob" placeholder="Birth of Date"
                                            required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Gender*</label>

                                        <select name="gender" class="form-control" required>

                                            <option value="">Select Gender</option>

                                            <option value="Male">Male</option>

                                            <option value="Female">Female</option>

                                        </select>

                                        <i class="fas fa-chevron-down"></i>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>PAN*</label>

                                        <input class="form-control" type="text" name="pancard" placeholder="PAN"
                                            required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                            </div><!-- /.row-->



                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>State*</label>

                                        <select name="state" class="form-control" onChange="getCity(this.value);"
                                            required>

                                            <option value="">Select State</option>

                                            <?php

                                            if ($count > 0) {

                                                while ($row = mysqli_fetch_array($run_query)) {

                                                    $stateID = $row['stateID'];

                                                    $stateName = $row['stateName'];

                                                    $Sname = $stateID . '_' . $stateName;



                                                    echo "<option value='$Sname'>$stateName</option>";

                                                }

                                            } else {

                                                echo '<option value="">State not available</option>';

                                            }

                                            ?>

                                        </select>

                                        <i class="fas fa-chevron-down"></i>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>City*</label>

                                        <select name="city" class="form-control" id="inputCity" required>

                                            <option value="">Select City</option>

                                        </select>

                                        <i class="fas fa-chevron-down"></i>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>Pincode*</label>

                                        <input class="form-control" type="number" name="pincode" placeholder="Pincode"
                                            required>

                                    </div><!-- /.form-group-->

                                </div><!-- /.col-md-6-->



                            </div><!-- /.row-->

                        </div><!-- /.contact-one__form-box-->

                        <div class="row">



                            <div class="col-md-12">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" value="on" id="invalidCheck"
                                        name="tnc" checked="" required>

                                    <label class="form-check-label" for="invalidCheck"> I agree to the Urgentrupee.com
                                        <a href="terms.php">terms and conditions</a> and <a href="privacy.php">Privacy
                                            Policy</a>.</label>



                                </div>

                                <input type="submit" name="submit" value="Apply Now" class="thm-btn">

                            </div>

                        </div><!-- row -->

                </div><!-- contact-one__form-box -->

                </form><!-- /.contact-one__form-->

            </div>

    </div><!-- /.container-->

    </section><!-- /.contact-one-->

    <?php include "includes/footer.php" ?>

    </div><!-- /.page-wrapper -->

    <?php include "includes/mobilenav.php" ?>



    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>





    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>

    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>

    <script src="assets/vendors/jarallax/jarallax.min.js"></script>

    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>

    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>

    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>

    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>

    <script src="assets/vendors/nouislider/nouislider.min.js"></script>

    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <script src="assets/vendors/odometer/odometer.min.js"></script>

    <script src="assets/vendors/swiper/swiper.min.js"></script>

    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/vendors/wnumb/wNumb.min.js"></script>

    <script src="assets/vendors/wow/wow.js"></script>

    <script src="assets/vendors/isotope/isotope.js"></script>

    <script src="assets/vendors/countdown/countdown.min.js"></script>



    <!-- template js -->

    <script src="assets/js/finlon.js"></script>



</body>



</html>

<?php



if (isset($_POST['submit'])) {

    //   print_r($_POST);

    //   exit();

    //echo "<script> alert('after submit');</script>"; 



    date_default_timezone_set('Asia/Kolkata');

    // print_r($_POST);exit();

    $name = $_POST['name'];

    $fullname = ucwords($_POST['name']);

    $name = explode(" ", $fullname);

    $arraylength = sizeof($name);

    $first_name = $name[0];

    $last_name = '';

    if ($arraylength > 1) {

        $last_name = $name[$arraylength - 1];

    }



    $email = $_POST['email'];

    $gender = $_POST['gender'];

    $pan = $_POST['pancard'];

    $pancard = strtoupper($pan);

    $mobile = $_POST['mobile'];

    $dob = $_POST['dob'];



    // leads table fields



    $loanRequeried = $_POST['loanRequeried'];

    $monthlyIncome = $_POST['monthlyIncome'];

    $city = $_POST['city'];

    $stateName = $_POST['state'];

    $stateSeprates = explode('_', $stateName);

    $sId = $stateSeprates[0];

    $state = $stateSeprates[1];

    $pincode = $_POST['pincode'];

    $ipAddress = $_SERVER['REMOTE_ADDR'];

    // $fbLeads=$_POST['fbLeads'];

    $domainName = "easyfincare";

    $commingLeadsDate = date("Y-m-d h:i:s");



    $purposeloan = $_POST['purposeloan'];

    // Document table field

    $now = date('Y-m-d H:i:s');



    // check email phone pancard is exist..



    $getData = "SELECT * FROM customer WHERE pancard='$pancard' order by customerID desc";

    $qry = $con->query($getData);

    $count = mysqli_num_rows($qry);

    if ($count > 0) {

        $cid = mysqli_fetch_object($qry);

        $lastId = $cid->customerID;

    }



    ///////////////////////////////////////Lead Status New case or Repeat case start//////////////////



    $getData23 = "SELECT loanID FROM loan WHERE customerID='$lastId' AND status='Disbursed'";

    $qry23 = $con->query($getData23);

    $count23 = mysqli_num_rows($qry23);

    if ($count23 > 0) {

        $fbLeads = "Repeat Case";

    } else {

        $fbLeads = "New Case";

    }

    ///////////////////////////////////////Lead Status New case or Repeat case end//////////////////







    ///////////////////////Calling Assign Start///////////////

    $getDataUser = "SELECT userID FROM users WHERE role = 'Calling Team' AND status='Active'";

    $qryUser = $con->query($getDataUser);

    $userArray = array();

    while ($userData = mysqli_fetch_array($qryUser, MYSQLI_NUM)) {

        array_push($userArray, $userData[0]);

    }

    $countUser = mysqli_num_rows($qryUser);



    $getIndex = "SELECT callAssign FROM lead_assign";

    $qry4 = $con->query($getIndex);

    $index = mysqli_fetch_object($qry4);

    $lastIdx = $index->callAssign;

    if ($lastIdx < $countUser) {

        $callAssignID = $userArray[$lastIdx];

        $lastIdx = $lastIdx + 1;

    } else {

        $lastIdx = 0;

        $callAssignID = $userArray[$lastIdx];

        $lastIdx = $lastIdx + 1;

    }



    $Update = "UPDATE lead_assign SET callAssign='$lastIdx' WHERE id=1";

    $runUpdate = $con->query($Update);

    //////////////////////////////////////////Calling Assign End////////////////////////



    $array = array(

        'Delhi' => 14,

        'Gujarat' => 18,

        'Haryana' => 14,

        'Karnataka' => 15,

        'Madhya Pradesh' => 15,

        'Maharashtra' => 14,

        'Punjab' => 18,

        'Tamil Nadu' => 18,

        'Uttar Pradesh' => 14,

        'West Bengal' => 18,

        'Telangana' => 15

    );



    foreach ($array as $key => $val) {

        if ($key == $state) {

            $userID = $val;

        }

    }

    if (isset($_GET['utm_source']) == '') {

        $source = 'Paid';

    } elseif (strtolower(($_GET['utm_source']) ?? '') == 'facebook') {

        $source = 'Facebook';

    } elseif (strtolower(($_GET['utm_source']) ?? '') == 'mailer') {

        $source = 'Email';

    } elseif ($_GET['utm_source'] == 'PFS') {

        $source = 'PFS';

    } else {

        $source = 'Paid';

    }



    if ($count > 0) {



        //echo "<script> alert('existing customer');</script>"; 

        $Insert = "insert into leads (customerID,userID,monthlyIncome,loanRequeried,city,state,pincode,ip,createdDate,utmSource,purpose,commingLeadsDate,callAssign,creditAssign,fbLeads) 

    values('$lastId','$userID','$monthlyIncome','$loanRequeried','$city','$state','$pincode','$ipAddress','$commingLeadsDate','$source','$purposeloan','$commingLeadsDate','$callAssignID',0,'$fbLeads')";



        $run = $con->query($Insert);

        if (!$run) {

            //echo("Error description: " . $con -> error);

            exit();

        } else {

        }

        $message = '<!DOCTYPE html>

<html>

   <body>

      <table style="width: 100%; float: left;" border="0">

            <tr>

               <td>

                  <p>Dear ' . $fullname . ',</p>

                  <p></p>

                  <p>Welcome to <a href="https://www.urgentrupee.com" target="_blank">urgentrupee.com</a>. We are glad to have you with us.</p> 

                  <p></p>

                  <p>We have received your application and the same will be processed by our credit team</p>

                  <p></p>

                  <p>We only provide short term loan to meet your emergency requirement for a maximum period of 30 days. 

                    Ours is not a long EMI loan which is of high amount and can be paid back over months/years but has to be paid back the day you get your salary.</p>

                  <p></p>

                  <p>To process your loan immediately please send us the following documents:</p>

                  <p></p>

                  <p>1.	KYC (Aadhaar/PAN/Driving License/Passport)</p>

                  <p></p>

                  <p>2.	Latest salary slip</p>

                  <p></p>

                  <p>3.	Three months’ bank statement (Till today)</p>

                  <p></p>

                  <p>Please note the bank statement should be PDF downloaded from Netbanking. No other format, including that of mobile banking or Mini statement, will be accepted.</p>

                  <p></p>

                  <p>In case you have not sent them please send them at <a href="mailto:help@urgentrupee">help@urgentrupee</a></p>

                  <p></p>

                  <p><strong>&nbsp;</strong></p>

                  <p>Best regards,</p>

                  <p>Team Urgentrupee.com</p>

               </td>

            </tr>

      </table>

   </body>

</html>';

        $to = $email;



        $subject = 'Welcome to Urgentrupee';



        $headers = "From: " . strip_tags('help@urgentrupee.com') . "\r\n";

        $headers .= "Reply-To: " . strip_tags('help@urgentrupee.com') . "\r\n";

        $headers .= "MIME-Version: 1.0\r\n";

        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        @mail($to, $subject, $message, $headers);



        redirect_to("thankyou.php");

        exit();

        //}



    } else {



        //echo "<script> alert('Not a Customer');</script>"; 



        $Insert1 = "insert into customer (name,firstName,lastName,email,mobile,gender,pancard,dob,createdDate) 

      values('$fullname','$first_name','$last_name','$email','$mobile','$gender','$pancard','$dob','$commingLeadsDate')";

        $run1 = $con->query($Insert1);

        if (!$run1) {

            //  echo("Error description1: " . $con -> error);

            exit();

        } else {

            $last_id = mysqli_insert_id($con);

        }









        if ($run1) {

            $Insert3 = "insert into leads (customerID,userID,monthlyIncome,loanRequeried,city,state,pincode,ip,createdDate,utmSource,purpose,commingLeadsDate,callAssign,creditAssign,fbLeads) 

values('$last_id','$userID','$monthlyIncome','$loanRequeried','$city','$state','$pincode','$ipAddress','$commingLeadsDate','$source','$purposeloan','$commingLeadsDate','$callAssignID',0,'$fbLeads')";



            //$Insert3="insert into leads (contactID,monthlyIncome,loanRequeried,tenure,city,state,pincode,ip,fbLeads,domainName,commingLeadsDate) values('$last_id','$monthlyIncome','$loanRequeried','$tenur','$city','$state','$pincode','$ipAddress','$fbLeads','$domainName','$commingLeadsDate')";

            $run3 = $con->query($Insert3);

            //   if (!$run3) {

            //   echo("Error description1: " . $con -> error);

            //   exit();

            // }else{}

            $message = '<!DOCTYPE html>

<html>

   <body>

      <table style="width: 100%; float: left;" border="0">

            <tr>

               <td>

                  <p>Dear ' . $fullname . ',</p>

                  <p></p>

                  <p>Welcome to <a href="https://www.urgentrupee.com" target="_blank">urgentrupee.com</a>. We are glad to have you with us.</p> 

                  <p></p>

                  <p>We have received your application and the same will be processed by our credit team</p>

                  <p></p>

                  <p>We only provide short term loan to meet your emergency requirement for a maximum period of 30 days. 

                    Ours is not a long EMI loan which is of high amount and can be paid back over months/years but has to be paid back the day you get your salary.</p>

                  <p></p>

                  <p>To process your loan immediately please send us the following documents:</p>

                  <p></p>

                  <p>1.	KYC (Aadhaar/PAN/Driving License/Passport)</p>

                  <p></p>

                  <p>2.	Latest salary slip</p>

                  <p></p>

                  <p>3.	Three months’ bank statement (Till today)</p>

                  <p></p>

                  <p>Please note the bank statement should be PDF downloaded from Netbanking. No other format, including that of mobile banking or Mini statement, will be accepted.</p>

                  <p></p>

                  <p>In case you have not sent them please send them at <a href="mailto:help@urgentrupee">help@urgentrupee</a></p>

                  <p></p>

                  <p><strong>&nbsp;</strong></p>

                  <p>Best regards,</p>

                  <p>Team Urgentrupee.com</p>

               </td>

            </tr>

      </table>

   </body>

</html>';

            $to = $email;



            $subject = 'Welcome to Urgentrupee';



            $headers = "From: " . strip_tags('help@urgentrupee.com') . "\r\n";

            $headers .= "Reply-To: " . strip_tags('help@urgentrupee.com') . "\r\n";

            $headers .= "MIME-Version: 1.0\r\n";

            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            @mail($to, $subject, $message, $headers);

            redirect_to("thankyou.php");

            exit();

            // }



        } else {



            redirect_to("thankyou.php");

            exit();

        }

    }

}

?>