<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked Add Post Button
if(isset($_POST)) {
	$new_id = $_POST['editid'];

	// New way using prepared statements. This is safe from SQL INJECTION. Should consider to update to this method when many people are using this method.


	$stmt = $conn->prepare("UPDATE courses SET courseid=?,coursetitle=?,contactperson=?,coursetype=?,price=?,youtube=?,coursedesc=?,coursestatus=? WHERE id_coursepost= $new_id ");

	$stmt->bind_param("ssssssss",$courseid,$coursetitle,$contactperson,$coursetype,$price,$youtube,$coursedesc,$coursestatus);

    $courseid = mysqli_real_escape_string($conn, $_POST['courseid']);
	$coursetitle = mysqli_real_escape_string($conn, $_POST['coursetitle']);

	$coursetype = mysqli_real_escape_string($conn, $_POST['coursetype']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
	$coursedesc = mysqli_real_escape_string($conn, $_POST['coursedesc']);
	$coursestatus = mysqli_real_escape_string($conn, $_POST['coursestatus']);
	
	$contactperson = mysqli_real_escape_string($conn, $_POST['contactperson']);


	if($stmt->execute()) {
		//If data Inserted successfully then redirect to dashboard
		$_SESSION['jobPostSuccess'] = true;
		header("Location: active-courses.php");
		
		exit();
	} else {
		//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
		echo "Error ";
	}

	$stmt->close();

	

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click Add Post button
	header("Location: create-course.php");
	exit();
}