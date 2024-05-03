<?php
#error_reporting(E_ALL);
#ini_set('display_errors', 'On');
include('includes/config_db.php');

if (!empty($_POST)) {
  date_default_timezone_set('Asia/Kolkata');
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $pan = $_POST['pancard'];
  $pancard = strtoupper($pan);
  $dob = $_POST['dob'];

  // leads table fields
  $purpose = $_POST['purpose'];
  $loan_amount = $_POST['loan_amount'];
  $tenure = $_POST['tenure'];
  $monthly_income = $_POST['monthly_income'];
  $salary_mode = $_POST['salary_mode'];
  $type = $_POST['type'];
  $cityState = $_POST['city'];
  $stateSeprates = explode('_', $cityState);
  $state_id = $stateSeprates[0];
  $city = $stateSeprates[1];
  $pincode = $_POST['pincode'];
  $check = $_POST['check'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $created_on = date("Y-m-d h:i:s");
  $getData = "SELECT user_id FROM users WHERE (mobile='$mobile' OR email='$email') AND role='Customer' order by user_id desc";
  $qry = $con->query($getData);
  $cid = mysqli_fetch_object($qry);
  $count = mysqli_num_rows($qry);


//   if (isset($_POST['source'])) 
//   {
//       if (strtolower(($_POST['utm_source'])) == 'facebook') {
//             $source = 'Facebook';
//       } elseif (strtolower(($_POST['utm_source'])) == 'mailer') {
//             $source = 'Email';
//       } elseif (strtolower(($_POST['utm_source'])) == 'google') {
//             $source = 'Google';
//       } else {
//             $source = 'Paid';
//       }
//   }else{
//       $source="Website";
//   }
//   print_r($_POST);
//   exit;
    $source=$_POST['source'];
  if ($count > 0) {
    $user_id = $cid->user_id;
    
    $getDataStatus="SELECT * FROM leads WHERE user_id='$user_id' AND status='Docs pending'   AND created_on >= ( CURDATE() - INTERVAL 7 DAY )";
    $qrystatus=$con->query($getDataStatus);
    $countstatus=mysqli_num_rows($qrystatus);
    if($countstatus >0)
    {
        #redirect_to("thankyou");
         echo 1;
        exit();
    }
    $Insert = "INSERT INTO leads(user_id, `name`, email, mobile,pancard, dob, city, state_id, pincode,purpose, type, loan_amount, tenure, monthly_income, salary_mode, `source`, `status`,ip, created_on,`check`) VALUES ('$user_id','$name','$email','$mobile', '$pancard','$dob', '$city', '$state_id', '$pincode', '$purpose','$type', '$loan_amount', '$tenure', '$monthly_income', '$salary_mode', '$source', 'Docs pending','$ip', '$created_on','$check')";
    $run = $con->query($Insert);
   
   ///Welcome Letter send
   
   $message='<!DOCTYPE html>
<html>
<body>
    <table style="width: 100%; float: left;" border="0">
            <tr>
                <td>
                    <p>Hello '.$name.',</p>
                    <p></p>
                    <p>We are excited that you have taken the first step toward your financial goals. We have received your loan application and are
                    now carefully reviewing the details you provided.</p>
                    <p></p>
                    <p>Our team is dedicated to processing your application efficiently and keeping you informed at every stage. Stay tuned for
                    updates on your applications progress.</p>
                    <p></p>
                    <p>Kindly share the below documents for processing</p>
                    <p>Documents List . </p>
                    <p>Pan Card</p>
                    <p>Aadhar card</p>
                    <p>3 Months Salary slip</p>
                    <p>3 month Bank statement</p>
                    <p>If Rented house share Rent agreement</p>
                    <p>If owned house Share Electricity bill</p>
                    <p></p>
                    <p>Thank you for choosing us for your financial needs.</p>
                    <p><strong>&nbsp;</strong></p>
                    <p>For any other query you can write an email to us : </p>
                    <p>help@urgentrupee.com</p>
                    <p>+91-9643-003-906</p>
                </td>
            </tr>
    </table>
</body>
</html>';
$to = $email;

$subject = 'Welcome to Urgentrupee.com';

$headers = "From: " . strip_tags('help@urgentrupee.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('help@urgentrupee.com') . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
@mail($to, $subject, $message, $headers);
   
    echo 1;
    exit();
  } else {

    $Insert1 = "insert into users (name,email,mobile,status,created_on) 
      values('$name','$email','$mobile','Active','$created_on')";
    $run1 = $con->query($Insert1);
    // if (!$run1) {
    //   echo ("Error description: " . $con->error);
    //   exit();
    // }
    $user_id = mysqli_insert_id($con);
    if ($run1) {
      $Insert3 = "INSERT INTO leads(user_id, `name`, email, mobile,pancard, dob, city, state_id, pincode,purpose, type, loan_amount, tenure, monthly_income, salary_mode, `source`, `status`,ip, created_on, `check`) VALUES ('$user_id','$name','$email','$mobile', '$pancard','$dob', '$city', '$state_id', '$pincode', '$purpose','$type', '$loan_amount', '$tenure', '$monthly_income', '$salary_mode', '$source', 'Docs pending','$ip', '$created_on','$check')";
      $run = $con->query($Insert3);
      
      ////Welcome Letter Send
      
       $message='<!DOCTYPE html>
<html>
<body>
    <table style="width: 100%; float: left;" border="0">
            <tr>
                <td>
                    <p>Hello '.$name.',</p>
                    <p></p>
                    <p>We are excited that you have taken the first step toward your financial goals. We have received your loan application and are
                    now carefully reviewing the details you provided.</p>
                    <p></p>
                    <p>Our team is dedicated to processing your application efficiently and keeping you informed at every stage. Stay tuned for
                    updates on your applications progress.</p>
                    <p></p>
                    <p>Kindly share the below documents for processing</p>
                    <p>Documents List . </p>
                    <p>Pan Card</p>
                    <p>Aadhar card</p>
                    <p>3 Months Salary slip</p>
                    <p>3 month Bank statement</p>
                    <p>If Rented house share Rent agreement</p>
                    <p>If owned house Share Electricity bill</p>
                    <p></p>
                    <p>Thank you for choosing us for your financial needs.</p>
                    <p><strong>&nbsp;</strong></p>
                    <p>For any other query you can write an email to us : </p>
                    <p>help@urgentrupee.com</p>
                    <p>+91-9643-003-906</p>
                </td>
            </tr>
    </table>
</body>
</html>';
$to = $email;

$subject = 'Welcome to Urgentrupee.com';

$headers = "From: " . strip_tags('help@urgentrupee.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('help@urgentrupee.com') . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
@mail($to, $subject, $message, $headers);
      echo 2;

      exit();
    }
  }
}
