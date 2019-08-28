<?php
	session_start();
	require_once 'dbcon.php';
	if (!isset($_SESSION['user_login'])) {
		
		 header('location: login.php');

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Index Page!</title>
	<link rel="stylesheet" href="../css/bootstrap3.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">

	<style type="text/css">
		.footer-area
		{
			background-color: #2881b5;
			text-align: center;
			padding: 20px 0px;
			color: #fff;
			margin: 20px 0px;
		}
		.footer-area p
		{
			margin: 0;
		}
	</style>

	<!--  Js linking  -->

	<script src="../js/jquery-3.3.1.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/script.js"></script>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">SMS</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Welcome: <?= $_SESSION['user_login'];?></a></li>
	        <li><a href="registation.php"><i class="fa fa-user-plus"></i> Add User</a></li>
	        <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
	        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div class="list-group">
				  <a href="index.php?page=dashboard" class="list-group-item active">
				    <i class="fa fa-dashboard"></i> Dashboard
				  </a>
				  <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
				  <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"></i> All Students</a>
				  <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="contant">

					<?php

						

						if (isset($_GET['page'])) {
							$page = $_GET['page'].'.php';
						}
						else
						{
							$page="dashboard.php";
						}

						if (file_exists($page)) {
							require_once $page;
						}
						else
						{
							require_once '404.php';
						}
					?>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer Start -->

	<footer class="footer-area">
		<p>Copyright &COPY;2019 Student Management System. All Right Are Reserved</p>
	</footer>
	<!-- Footer End -->
</body>
</html>