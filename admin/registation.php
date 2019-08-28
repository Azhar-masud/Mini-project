<?php 
	session_start();
	require_once './dbcon.php';
	if (isset($_POST['registation'])) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$c_password=$_POST['c_password'];
		$image=explode('.', $_FILES['image']['name']);
		$image=end($image);
		$img_name=$username.'.'.$image;

		$input_error=array();

		if (empty($name)) {
			$input_error['name']="The Name Field is Required!";
		}
		if (empty($email)) {
			$input_error['email']="The email Field is Required!";
		}
		if (empty($username)) {
			$input_error['username']="The username Field is Required!";
		}
		if (empty($password)) {
			$input_error['password']="The password Field is Required!";
		}
		if (empty($c_password)) {
			$input_error['c_password']="The c_password Field is Required!";
		}

		if (count($input_error)==0) {
			$email_chack= mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email';");
			
			if (mysqli_num_rows($email_chack)==0) {
				$username_chack= mysqli_query($con,"SELECT * FROM `users` WHERE `username`='$username';");
				if (mysqli_num_rows($username_chack)==0)
				{
					if (strlen($username) > 7) {
						if (strlen($password) > 7) {
							
							if ($password == $c_password) {
								 
								$password=md5($password);
								$query="INSERT INTO `users`(`name`, `email`, `username`, `password`, `image`, `status`) VALUES ('$name','$email','$username','$password','$img_name','inactive')";

								$result=mysqli_query($con,$query);

								if ($result) {
									 $_SESSION['data_insert_success']="Data Insert Success!";
									 move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$img_name);
									 header('location: registation.php');
								}
								else
								{
									$_SESSION['data_insert_field']="Data Insert Failed!";
								}

							}
							else
							{
								 $password_not_match="Confirm Password is not Match!";
							}
						}
						else
						{
							$password_l="Password More Than 8 Charcter!";
						}
					}
					else
					{
						$username_l="Username More Then 8 Charcter!";
					}
				}
				else{
					$username_error="This Username Already Exists!";
				}
			}
			else
			{
				$email_error="This Email Address Already Exists!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registation Form</title>
	<link rel="stylesheet" href="../css/bootstrap3.min.css">
</head>
<body>
	<div class="container">
		<h2 class="text-center mt-3">User Registation Form!</h2>
		<?php if (isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
		<?php if (isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';}?>
		<hr>
		<div class="row">
			<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div class="form-group">
						<label for="name" class="control-label col-sm-1">Name:</label>
						<div class="col-sm-4">
							<input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="<?php if(isset($name)){echo $name;} ?>">
						</div>
						<label for="" class="error text-danger"><?php if (isset($input_error['name'])) {echo $input_error['name'];} ?></label>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-1">Email:</label>
						<div class="col-sm-4">
							<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if(isset($email)){echo $email;} ?>">
						</div>
						<label for="" class="error text-danger"><?php if (isset($input_error['email'])) {echo $input_error['email'];} ?></label>
						<label for="" class="error text-danger"><?php if (isset($email_error)) {echo $email_error;} ?></label>
					</div>
					<div class="form-group">
						<label for="username" class="control-label col-sm-1">Username:</label>
						<div class="col-sm-4">
							<input type="text" id="username" name="username" class="form-control" placeholder="Enter username" value="<?php if(isset($username)){echo $username;} ?>">
						</div>
						<label for="" class="error text-danger"><?php if (isset($input_error['username'])) {echo $input_error['username'];} ?></label>
						<label for="" class="error text-danger"><?php if (isset($username_error)) {echo $username_error;} ?></label>
						<label for="" class="error text-danger"><?php if (isset($username_l)) {echo $username_l;} ?></label>
					</div>
					<div class="form-group">
						<label for="password" class="control-label col-sm-1">Password:</label>
						<div class="col-sm-4">
							<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" value="<?php if(isset($password)){echo $password;} ?>">
						</div>
						<label for="" class="error text-danger"><?php if (isset($input_error['password'])) {echo $input_error['password'];} ?></label>
						<label for="" class="error text-danger"><?php if (isset($password_l)) {echo $password_l;} ?></label>
					</div>
					<div class="form-group">
						<label for="c_password" class="control-label col-sm-1">C_password:</label>
						<div class="col-sm-4">
							<input type="password" id="c_password" name="c_password" class="form-control" placeholder="Enter C_Password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
						</div>
						<label for="" class="error text-danger"><?php if (isset($input_error['c_password'])) {echo $input_error['c_password'];} ?></label>
						<label for="" class="error text-danger"><?php if (isset($password_not_match)) {echo $password_not_match;} ?></label>
					</div>
					<div class="form-group">
						<label for="image" class="control-label col-sm-1">Image:</label>
						<div class="col-sm-4">
							<input type="file" id="image" name="image" class="form-control">
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<input type="submit" value="Registation" name="registation" class="btn btn-primary">
						<br><br>
						<p>Already have an account?<a href="../admin/login.php">Login</a></p>
					</div>
				</form>
			</div>
			<hr>
			<footer class="text-center">
				<p class="">Copyright @2018-<?= date('y');?> All Right Reserved</p>
			</footer>
	</div>
</body>
</html>