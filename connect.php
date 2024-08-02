<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
    $time = $_POST['time'];
	$date = $_POST['date'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into `appointment booking` (firstName, lastName, gender, email, time, date, number) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $firstName, $lastName, $gender, $email, $time, $date, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Appointment Booked Successfully";
		$stmt->close();
		$conn->close();
	}
?>