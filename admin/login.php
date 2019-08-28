<?php
	require_once './dbcon.php';
	session_start();

	if (isset($_SESSION['user_login'])) {
		 header('location: index.php');
	}

	if (isset($_POST['login'])) {
		 $username=$_POST['username'];
		 $password=$_POST['password'];

		 $username_check=mysqli_query($con,"SELECT * FROM `users` WHERE `username`='$username'");
		 if (mysqli_num_rows($username_check)>0) {
		 	 
		 	 $row=mysqli_fetch_assoc($username_check);
		 	 
		 	 if ($row['password'] == md5($password)) {
  
		 	 	  if ($row['status']=='active') {
		 	 	  	 $_SESSION['user_login']=$username;
		 	 	  	 header('location: index.php');
		 	 	  }
		 	 	  else
		 	 	  {
		 	 	  	 $statlus_inactive="Your Status are Inactive!";
		 	 	  }
		 	 }
		 	 else{
		 	 	$wrong_password="This is wrong Password!";
		 	 }
		 }
		 else
		 {
		 	 $userename_not_found="This Username not Found!";
		 }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin login</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center mt-3">Student Management system</h1>
		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">
				<form action="" method="post">
					<h2 class="text-center">Admin login form!</h2>
					<label for="">Username:</label>
					<input type="text" name="username" class="form-control" placeholder="username" value="<?php if(isset($username)){echo $username;} ?>">
					<label for="">Password:</label>
					<input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php if(isset($password)){echo $password;} ?>">
					<a href="../index.php" class="btn btn-outline-info mt-3">Back</a>
					<input type="submit" name="login" value="Login" class="btn btn-info mt-3 float-right">
				</form>
			</div>
		</div>
		<?php if (isset($userename_not_found)) { echo '<div class="alert alert-danger col-sm-4 offset-sm-4 mt-3">'.$userename_not_found.'</div>';} ?>
		<?php if (isset($wrong_password)) { echo '<div class="alert alert-danger col-sm-4 offset-sm-4 mt-3">'.$wrong_password.'</div>';} ?>
		<?php if (isset($statlus_inactive)) { echo '<div class="alert alert-danger col-sm-4 offset-sm-4 mt-3">'.$statlus_inactive.'</div>';} ?>
	</div>

	<!-- all js link -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>