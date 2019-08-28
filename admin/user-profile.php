

<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-user"></i> Profile</li>
	</ol>


	<?php

	 	$session_user=$_SESSION['user_login'];
	 	$user_data=mysqli_query($con,"SELECT * FROM `users` WHERE `username`='$session_user'");
	 	$user_row=mysqli_fetch_assoc($user_data);

	 	if (isset($_POST['edit'])) {
	 			
	 	}

	?>

	<div class="row">
		<div class="col-sm-6">
			<table class="table table-bordered">
				<tr>
					<td>User Id</td>
					<td><?= $user_row['id'];?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?= ucwords($user_row['name']);?></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><?= $user_row['username'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $user_row['email'];?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?= ucwords($user_row['status']);?></td>
				</tr>
				<tr>
					<td>Signup Date</td>
					<td><?= $user_row['datetime'];?></td>
				</tr>
			</table>
			<a href="" name="edit" class="btn btn-sm btn-info pull-right">Edit Profile</a>
		</div>
		<div class="col-sm-6">
			<a href="">
				<img class="img-thumbnail" style="height: 155px; width: 150px;" src="images/<?= $user_row['image'];?>" alt="">
			</a>
			<br><br>
			
			<?php
				if (isset($_POST['upload'])) {
					$image=explode('.', $_FILES['image']['name']);
					$image=end($image);
					$img_name=$session_user.'.'.$image;

					$upload=mysqli_query($con,"UPDATE `users` SET `image`='$img_name' WHERE `username`='$session_user'");
					if ($upload) {
						  move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$img_name);
					}
				}
			?>

			<form action="" method="post" enctype="multipart/form-data">
				<label for="image">Profile Picture</label>
				<input type="file" name="image" id="image" required=""><br>
				<input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
			</form>
		</div>
	</div>