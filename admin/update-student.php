

<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Update Student</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="index.php?page=all-students"><i class="fa fa-users"></i> All Student</a></li>
		<li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
	</ol>

<?php
	$id= base64_decode($_GET['id']);
	$db_data=mysqli_query($con,"SELECT * FROM `student_info` WHERE `id`='$id'");
	$db_rows=mysqli_fetch_assoc($db_data);

	if (isset($_POST['update-student'])) {
	
		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$class=$_POST['class'];
		$city=$_POST['city'];
		$pcontact=$_POST['pcontact'];

		 $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`='$id'";
		 $result= mysqli_query($con, $query);
		 if ($result) {
		 	 header('location: index.php?page=all-students');
		 }

	}

?>


<div class="row">
	<div class="col-sm-6">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name:</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required="" value="<?= $db_rows['name'];?>">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll:</label>
				<input type="text" name="roll" id="roll" class="form-control" placeholder="Enter roll" pattern="[0-9]{6}" value="<?= $db_rows['roll'];?>">
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<input type="text" name="city" id="city" class="form-control" placeholder="Enter city" value="<?= $db_rows['city'];?>">
			</div>
			<div class="form-group">
				<label for="pcontact">P-Contact:</label>
				<input type="text" name="pcontact" id="pcontact" class="form-control" placeholder="01*********" pattern="01[1|5|6|7|8|9][0-9]{8}" value="<?= $db_rows['pcontact'];?>">
			</div>
			<div class="form-group">
				<label for="class">Class:</label>
				<select name="class" id="class" class="form-control">
					<option value="">Select class</option>
					<option <?= $db_rows['class']=='one' ? 'selected=""':''; ?> value="One">One</option>
					<option <?= $db_rows['class']=='Two' ? 'selected=""':''; ?> value="Two">Two</option>
					<option <?= $db_rows['class']=='Three' ? 'selected=""':''; ?> value="Three">Three</option>
					<option <?= $db_rows['class']=='Four' ? 'selected=""':''; ?> value="Four">Four</option>
					<option <?= $db_rows['class']=='Five' ? 'selected=""':''; ?> value="Five">Five</option>
				</select>
			</div>
			<div class="form-group">
				<input type="Submit" name="update-student" class="btn btn-primary pull-right" value="Update Student">
			</div>
		</form>
	</div>
</div>