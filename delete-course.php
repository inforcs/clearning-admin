<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM courses WHERE id_coursepost='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: active-courses.php");
		exit();
	} else {
		echo "Error";
	}
}