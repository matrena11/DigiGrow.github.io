<?php

	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $website=$_POST['website'];
	$social_media=$_POST['social_media'];
  $call_date_time=$_POST['call_date_time'];
  $service=$_POST['service'];
  $more_info=$_POST['more_info'];

// Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into call_form(name, phone, city, state, zip_code, country, website, social_media, call_date_time, service, more_info) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sississssss", $name, $phone, $city, $state, $zip_code, $country, $website, $social_media, $call_date_time, $service, $more_info );
  $execval = $stmt->execute();
  echo "Thanks, we will get back to you!";
  $stmt->close();
  $conn->close();
}
?>