<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>student management system</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<a href="admin/login.php" class="btn btn-primary float-right mt-3">Login</a><br>
		<h1 class="text-center mt-3">Welcome to Student Management System!</h1>

		<form action="" method="post">
			<table class="table table-bordered col-sm-4 mt-3 offset-sm-4">
				<tr>
					<th colspan="2" class="text-center text-uppercase">Student Information</th>
				</tr>
				<tr>
					<th>Class</th>
					<td>
						<select name="choose" id="choose" class="form-control">
							<option value="">Select class</option>
							<option value="One">One</option>
							<option value="Two">Two</option>
							<option value="Three">Three</option>
							<option value="Four">Four</option>
							<option value="Five">Five</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Roll</th>
					<td><input type="text" name="roll" class="form-control" pattern="[0-9]{6}" placeholder="Enter Roll"></td>
				</tr>
				<tr>
					<td colspan="2" class="text-center"><input type="submit" name="submit" value="Show Info" class="btn btn-outline-success"></td>
				</tr>
			</table>
		</form>
		
	<?php
	require_once 'admin/dbcon.php';
	if (isset($_POST['submit'])) {
		$choose=$_POST['choose'];
		$roll=$_POST['roll'];
		$result=mysqli_query($con, "SELECT * FROM `student_info` WHERE `class`='$choose' and `roll`='$roll'");
		if (mysqli_num_rows($result)==1) {
			 $row= mysqli_fetch_assoc($result);
		?>

		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<table class="table table-bordered">
					<tr>
						<td rowspan="5">
							<img class="img-thumbnail" style="width: 150px;" src="admin/student_images/<?= $row['image'];?>" alt="">
						</td>
					</tr>
					<tr>
						<th>Name:</th>
						<td><?= $row['name'];?></td>
					</tr>
					<tr>
						<th>Roll:</th>
						<td><?= $row['roll'];?></td>
					</tr>
					<tr>
						<th>Class:</th>
						<td><?= $row['class'];?></td>
					</tr>
					<tr>
						<th>City:</th>
						<td><?= $row['city'];?></td>
					</tr>
				</table>
			</div>
		</div>

	<?php
		}
		else
		{
			
	?>
	
	<script type="text/javascript">
		alert('Data Not Found!');
	</script>

	<?php
		}
	}

	?>

	</div>
	
	<!-- all js link -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>