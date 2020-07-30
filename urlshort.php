<?php 

$servername = 'localhost';
$username = 'root';
$password = ''; // on localhost by default there is no password
$dbname = 'test';
$base_url='http://localhost/SurveySparowtest URL /'; // it is your application url



if(isset($_GET['url']) && $_GET['url']!="")
{ 
$url=urldecode($_GET['url']);
if (filter_var($url, FILTER_VALIDATE_URL)) 
{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM url_shorten";
$result = $conn->query($sql);


$slug=GetShortUrl($url);
$conn->close();

echo $base_url.$slug;
echo "<br><br>";

echo "<center>It display all the shorted URL with the help of php</center>";
echo "<br><br>";
echo "<center><table border='2'>
<tr>

<th id='eil'> id</th>
<th>URL</th>
<th>short_code</th>

</tr>";

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - URL: " . $row["url"]. " " . $row["short_code"]." " . $row["hits"]."<br>";


   echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td '>" .$row['url']. "</td>";
  echo "<td>" .$row['short_code']. "</td>";
  //echo "<td>". $row['hits']. "</td>";
  
echo "</tr>";

  




  }
} else {
  echo "0 results";
}


} 
else 
{
die("$url is not a valid URL");
}

}
else
{
?>
<head>
	<link rel="stylesheet" href ="bootstrap-4/css/bootstrap.min.css">
		
		<script src ="jquery/jquery-3.2.1.slim.js"></script>
		<script src="bootstrap-4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body class="container">
<br><br>
	<img class="imagearea" src="back.jpeg">
<center>
	<div class="block">
    <h1>Short URL</h1>
<form>
<p><input class="form-control form-control-lg" type="url" placeholder="Enter URL" name="url" required ></p>
	
<p><input type="submit" class="btn btn-primary"/></p>
</form>
</div>
</center>
</body>


<?php
}


function GetShortUrl($url){
 global $conn;
 $query = "SELECT * FROM url_shorten WHERE url = '".$url."' "; 
 $result = $conn->query($query);
 if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
 return $row['short_code'];
} else {
$short_code = generateUniqueID();
$sql = "INSERT INTO url_shorten (url, short_code, hits)
VALUES ('".$url."', '".$short_code."', '0')";
if ($conn->query($sql) === TRUE) {
return $short_code;
} else { 
die("Unknown Error Occured");
}
}
}



function generateUniqueID(){
 global $conn; 
 $token = substr(md5(uniqid(rand(), true)),0,6); // creates a 6 digit unique short id
 $query = "SELECT * FROM url_shorten WHERE short_code = '".$token."' ";
 $result = $conn->query($query); 
 if ($result->num_rows > 0) {
 generateUniqueID();
 } else {
 return $token;
 }
}


if(isset($_GET['redirect']) && $_GET['redirect']!="")
{ 
$slug=urldecode($_GET['redirect']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$url= GetRedirectUrl($slug);
$conn->close();
header("location:".$url);
exit;
}


function GetRedirectUrl($slug){
 global $conn;
 $query = "SELECT * FROM url_shorten WHERE short_code = '".addslashes($slug)."' "; 
 $result = $conn->query($query);
 if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
// increase the hit
$hits=$row['hits']+1;
$sql = "update url_shorten set hits='".$hits."' where id='".$row['id']."' ";
$conn->query($sql);
return $row['url'];
}
else 
 { 
die("Invalid Link!");
}
}