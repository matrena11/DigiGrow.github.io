<?php
	$pname = $_POST['pname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact_form(pname, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $pname, $email, $subject, $message);
		$execval = $stmt->execute();
		echo "Message Sent!";
		$stmt->close();
		$conn->close();
	}
?>