<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM new_job_post WHERE id_jobpost='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: active-jobs.php");
		exit();
	} else {
		echo "Error";
	}
}