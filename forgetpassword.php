<?php

include_once 'db_connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


if ($_POST) {
   
  //$conn = mysqli_connect("localhost","root","","test");  
  $email = $_POST["email"];

  $selectquary = mysqli_query($conn,"select * from form WHERE email='{$email}'") or die (mysql_error($conn));
  $count = mysqli_num_rows($selectquary);
  $row = mysqli_fetch_array($selectquary);
  if ($count>0) {
    
    
    require 'C:/Users/RAJAT RANJAN KUMAR/vendor/autoload.php';

    $email = new PHPMailer(true);
    try{
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'rajat@gmail.com';
      $mail->Password = '';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 3306;

      $mail->setFrom('First@example.com', 'First Last');
      $mail->addAddress($email,$email);

      $mail->isHTML(true);
      $mail->Subject = 'forgetpassword test';
      $mail->AltBody = "Hai ,$email your password is {$row [form]}";
      $mail->Body = "Hai ,$email your password is {$row [form]}";
      $mail->send();
      echo "your password has been send on your Email ID";
    }catch (Exception $e)
    {
      echo "Email could not be sent";
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }else
  {
    echo "<script>alert('Email Not Found')</script>";
  }
}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
    
  <script src="jQuary/jquary.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <script src="bootstrap-4/js/bootstrap.min.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>  Captcha        -->

</head>
<body class="container">
  <center><h1>Forgot Password<h1></center>
<br>
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email @</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
   
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form></div>
  <div class="col-lg-4"></div>
</div>

</body>
</html>