<?php
include("db_connection.php");


$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","test");
	$result = mysqli_query($conn,"SELECT * FROM form WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
		//$alert = '<script> alert("Invalid Username or Password!")</script>';
		//echo $alert;
	} else {
		$message = "You are successfully authenticated!";
		//$alert = '<script> alert("You are successfully authenticated!")</script>';
		//echo $alert;
	}
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="asserts/css/style.css">
	<script src="jQuary/jquary.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <script src="bootstrap-4/js/bootstrap.min.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>  Captcha        -->

	<title>Login</title>
	
	<script type="text/javascript">	
	
	function buttonClick() {
	    var email = document.getElementById("inlineFormInputGroup");   
		var password = document.getElementById("exampleInputPassword1"); 
		var atposition=email.value.indexOf("@");  
		var dotposition=email.value.lastIndexOf(".");  
		var boolen = 1;
		if(email.value=="" || atposition<1 || dotposition<atposition+2 || dotposition+2>=email.value.length){
		    email.style.border="solid 1px  #F36161";
		   document.getElementById("errors1").innerHTML="Enter Valid Email";  
			document.getElementById("errors1").style.color=" #e62e00";  
			boolen = 0;
			if(boolen ){
			email.style.border="solid 1px green";
			}
			return false;
			
		}
		
		else if (password.value==""){
		
		password.style.border="solid 1px  #F36161";
		document.getElementById("errors").innerHTML="Enter valid password"; 
		  document.getElementById("errors").style.color=" #e62e00";
	    
		return false;
		} 
		else 
		return true;
		}
	
</script>  
 </head>



<body>

	

  <div class="continer">
    <div  class="row ml-0 mr-0">
	<div class="col-lg-4 mt-4"><br>
	<form onsubmit= "return buttonClick()"  action="urlshort.php" method="POST">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>

  <h3>welcome to Login page</h3>
  
   <div class="col pl-1 mt-2">
  <label for="inlineFormInputGroup"></label>
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group input-group-lg mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="email">
		
      </div> <span class="modal-body" style="text-align:center;">
										<span style="font-family:serif;padding-left: inherit;" id ="errors1"></span>
									  </span>
    </div>
     <div class="col pl-1 ">
     <label for="exampleInputEmail1"></label>
      <label class="sr-only" for="">password</label>
      <div class="input-group input-group-lg mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
      </div>
	  <span class="modal-body" style="text-align:center;">
			<span style="font-family:serif;padding-left: inherit;" id ="errors"></span>
           </span>							
	</div>
	  <!-- Default checked -->
<div class="custom-control custom-checkbox ml-2" >
  <input type="checkbox" class="custom-control-input" id="defaultChecked2"  checked>
  <label class="custom-control-label" for="defaultChecked2">Remember my Password</label>
</div>
		<button type="submit" name="submit" id="gif" class="btn btn btn-sm btn-block mt-4 p-2"  >Login</button>
		<div id="flt" class="col mt-2">
		<a href="forgetpassword.php">Forget password</a>
		<p>Do you have an account?<a href="signup.php">Sign in</a></p><br>
		</div>
		</form>
		<div >
	    <p id="botum">copyright@RajatRanjan</p></div>
	
	</div>
	
	
	<div class="d-none d-lg-block col-lg-8">
	<img src="asserts/image/Time-management-strategies.jpg"  alt="epmetrics">
    </div>
	
	
	</div>
  </div>
</body>
</html>






