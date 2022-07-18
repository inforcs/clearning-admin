<?php session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PROSTAFF</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
 <!-- Favicon -->
 <link rel="icon"   href="img/favicon.ico">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">

  <!-- Summernote -->
  <link rel="stylesheet" href="plugins/summernote/dist/summernote-bs4.css"/>

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#description', height: 300 });</script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ConceptLearning </b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                   
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				          <li class="active"><a href="create-job-post.php"><i class="fa fa-edit"></i> Create New Course</a></li>
                  <li><a href="active-courses.php"><i class="fa fa-briefcase"></i> All Courses</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                  <li><a href="companies.php"><i class="fa fa-building"></i> Client Enquiry</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Create Course Post</i></h2>
            <div class="row">
              <form method="post" action="addpost.php" autocomplete="on">
                <div class="col-md-12 latest-job ">
					<div class="row">
						<div class="col-md-6">
              <?php
                      $sql = "SELECT * FROM new_job_post order by job_id desc  ";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $new_row = $row['job_id'];
                        
                      ?>
							<label for="input-7">Course ID</label>
							  <div class="form-group">
								<input class="form-control input-lg" type="text" id="jobid" name="jobid" value="<?php echo $new_row+1 ?>" readonly>
							  </div> <?php } ?>
						</div>
						<div class="col-md-6">
							<label for="input-7">Course Name</label>
							  <div class="form-group">
								<input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Course title" required>
							  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label for="input-7">Client Name</label>
							<div class="form-group">
								<input class="form-control input-lg" type="text" id="Client_name" name="Client_name" placeholder="Course Name" required>
							</div>
						</div>
						<div class="col-md-6"> 
							<label for="input-7">Contact Person</label>
						   <div class="form-group">
							<input class="form-control input-lg" type="text" id="contact_person" name="contact_person" placeholder="Write Name of Person" required>
						  </div>
						</div>
					</div>

          <div class="row">
            <div class="col-md-6">
              <label for="input-7">Location</label>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="location" name="location" placeholder="location" required>
              </div>
            </div>
            <div class="col-md-6"> 
              <label for="input-7">Pay Rate</label>
               <div class="form-group">
              <input class="form-control input-lg" type="text" id="payrate" name="payrate" placeholder="Pay Rate" required>
              </div>
            </div>
          </div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="input-8">Job Type</label>
								<select class="form-control" name="jobtype" id="jobtype" required>
									<option value="Choose Type">Choose Type</option>
									<option value="Full Time">Full Time</option>
									<option value="Part Time">Part Time</option>
									<option value="Contract">Contract</option>
								</select>
							</div>
						</div>
						<div class="col-md-6"> 
							 <div class="form-group">
								<label for="input-8">Course Status</label>
								<select class="form-control" name="jobstatus" id="jobstatus" required>
									<option value="1" selected>Active</option>
									<option value="2">Hold</option>
									 <option value="3">Closed</option>
								</select>  
							</div>
						
						</div>
					</div>
				
		      
				  <label for="input-7">Skills</label>
				 <div class="form-group">
                    <textarea class="form-control input-lg" id="skills" name="skills" placeholder="Job Skills" required></textarea>
                  </div>
				   <label for="input-7">Description</label>
				 <div class="form-group">
                    <textarea class="form-control input-lg" id="summernoteEditor" name="jobdesc" placeholder="Job description" required></textarea>
                  </div>
				  
				
			  
                 
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Create</button>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
  <div class="text-center">
      <strong>Copyright &copy; 2022. ConceptLearning</strong> All rights
    reserved. Developed By <a href="https://www.rcsinfo.in/">RCS</a>
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
<script>
$('#summernoteEditor').summernote({
height: 200,
tabsize: 2
});
</script>
</body>
</html>
