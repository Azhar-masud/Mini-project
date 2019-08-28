

<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
	</ol>


<?php
	if (isset($_POST['add_student'])) {
		extract($_REQUEST);

		 $image=explode('.', $_FILES['image']['name']);
		 $img_ex=end($image);
		 $img_name=$roll.'.'.$img_ex;

		 $query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `image`) VALUES ('$name','$roll','$class','$city','$pcontact','$img_name')";
		 $result= mysqli_query($con, $query);

		 if ($result) {
		 	$success="Data Insert Success!";
		 	move_uploaded_file($_FILES['image']['tmp_name'], 'student_images/'.$img_name);
		 }
		 else
		 {
		 	$error="Data Insert Failed!";
		 }
	}

?>

<div class="row">
	<?php if(isset($success)){ echo '<p class="alert alert-success col-sm-6">'.$success.'</p>'; }?>
	<?php if(isset($error)){ echo '<p class="alert alert-warning col-sm-6">'.$error.'</p>'; }?>
</div>
<div class="row">
	<div class="col-sm-6">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name:</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required="">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll:</label>
				<input type="text" name="roll" id="roll" class="form-control" placeholder="Enter roll" pattern="[0-9]{6}">
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<input type="text" name="city" id="city" class="form-control" placeholder="Enter city">
			</div>
			<div class="form-group">
				<label for="pcontact">P-Contact:</label>
				<input type="text" name="pcontact" id="pcontact" class="form-control" placeholder="01*********" pattern="01[1|5|6|7|8|9][0-9]{8}">
			</div>
			<div class="form-group">
				<label for="class">Class:</label>
				<select name="class" id="class" class="form-control">
					<option value="">Select class</option>
					<option value="One">One</option>
					<option value="Two">Two</option>
					<option value="Three">Three</option>
					<option value="Four">Four</option>
					<option value="Five">Five</option>
				</select>
			</div>
			<div class="form-group">
				<label for="image">Image:</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>
			<div class="form-group">
				<input type="Submit" name="add_student" class="btn btn-primary pull-right" value="Add Student">
			</div>
		</form>
	</div>
</div>