<?php
include("db_connection.php");
$sql = "CREATE TABLE form(firstname VARCHAR(50),email TEXT, password TEXT)";  
$query = mysqli_query($conn,$sql) ;


if(isset($_POST['submit']))
{


  $firstname = $_POST["firstname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  //echo $firstname;
  //echo $email;
  
  $sql_e = "select * from form WHERE email = '$email'";
  $res_e = mysqli_query($conn, $sql_e);
  
  if(mysqli_num_rows($res_e) > 0 ){
  
    $alert = '<script> alert("Email all ready exits")</script>';
		echo $alert;
		
  	 }else{
       
      $sql= "INSERT INTO form(firstname,email,password) VALUES ('$firstname','$email','$password')";
  
      $quary=mysqli_query($conn,$sql);
       //echo "<script>alert ('welcome to Login page')</script>";
  	}
}
?>

<?php 


//$result="select * from form";
//$results=mysqli_query($conn,$result)


/*$result="select * from form where email = $email";
$results=mysqli_query($conn,$result);
while($row = mysqli_fetch_array($results)){
	if($row['email']==$results)
	{
		$alert = '<script> alert("Email all ready exits")</script>';
		echo $alert;
	}else{
		$email;
	}
}

*/






//if('$email'==$_POST["email"]>0)
//if(mysql_num_rows($result) > 0)	
//{
 //$email = $_POST["email"];
//}
//
  // $alert = '<script> alert("Lemail exits")</script>';
   //echo $alert;
	//}

?>








<!doctype html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="asserts/css/stylee.css">
	<script src="jQuary/jquary.js"> </script>
    <script src="bootstrap-4/js/bootstrap.min.js"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>  Captcha        -->
	<title>Sign up</title>
	
	<script type="text/javascript">	
	function buttonClick() {
	   
	    var firstname=document.getElementById("Nameinput");
		var email = document.getElementById("inlineFormInputGroup");   
		var password = document.getElementById("exampleInputPassword"); 
		var atposition=email.value.indexOf("@");  
		var dotposition=email.value.lastIndexOf(".");  
		var boolen = 1; 
		if(firstname.value==""){
		 firstname.style.border="solid 1px  #F36161";
		 document.getElementById("errors2").innerHTML="Enter your Name"; 
         document.getElementById("errors2").style.color=" #e62e00"; 	
         return false;		 
		}
	    else if(email.value=="" || atposition<1 || dotposition<atposition+2 || dotposition+2>=email.value.length){
		    email.style.border="solid 1px  #F36161";
		   document.getElementById("errors1").innerHTML="Enter Valid Email";  
			document.getElementById("errors1").style.color=" #e62e00";  
			return false;
			
		}
		else if (password.value==""|| password.value.length<6){
		password.style.border="solid 1px  #F36161";
		 document.getElementById("errors").innerHTML="Enter more than 6 latter";  
		document.getElementById("errors").style.color=" #e62e00";
	    
		return false;
		} 
		
		else {
		return true;
		}
		}
	
</script>  
  </head>




<body>

	
<div class="continer">
    <div  class="row ml-0 mr-0">
	<div class="col-lg-4 mt-4"><br>
	<form onsubmit= "return buttonClick()" action="" method="POST">
    <h3>welcome to Sign up page</h3>
  
	  <div class="col pl-1">
	   <label for="Nameinput"></label>
		  <label class="sr-only" for="">User Name</label>
		  <div class="input-group input-group-lg mb-2">
			<div class="input-group-prepend">
			  <div class="input-group-text">U</div>
			</div>
			<input type="text" class="form-control" id="Nameinput" placeholder="User Name" name="firstname">
			
		  </div>
		  <span class="modal-body" style="text-align:center;">
											<span style="font-family:serif;padding-left: inherit;" id ="errors2"></span>
										  </span>
		</div>
	   <div class="col pl-1">
	  <label for="inlineFormInputGroup"></label>
		  <label class="sr-only" for="">Email</label>
		  <div class="input-group input-group-lg mb-2">
			<div class="input-group-prepend">
			  <div class="input-group-text">@</div>
			</div>

			<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="email" >
			
		  </div> <span class="modal-body" style="text-align:center;">
											<span style="font-family:serif;padding-left: inherit;" id ="errors1"></span>
										  </span>
		</div>
		 <div class="col pl-1">
		 <label for="exampleInputPassword"></label>
		  <label class="sr-only" for="">password</label>
		  <div class="input-group input-group-lg mb-2">
			<div class="input-group-prepend">
			  <div class="input-group-text">$</div>
			</div>
			<input type="text" class="form-control" id="exampleInputPassword" placeholder="password" name="password">
		  </div> <span class="modal-body" style="text-align:center;">
											<span style="font-family:serif;padding-left: inherit;" id ="errors"></span>
										  </span>
		</div>
		   
		<button  type="submit" name="submit" id="gif" class="btn btn btn-sm btn-block p-2" >Sign up</button>
		<div id="flt" class="col mt-3">
		<p></p>
		<p>Have an account?<a href="index.php">Log in</a></p><br>
		</div>
		</form>
		<div>
	    <p id="botum">copyright@RajatRanjan</p></div>
	
		</div>
		
		
		<div class="d-none d-lg-block col-lg-8">
		<img src="asserts/image/Time-management-strategies.jpg"  alt="Time-management-strategies">
		</div>
	
	
	</div>
  </div>
</body>
</html>