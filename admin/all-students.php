


<h1 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-users"></i> All Students</li>
	</ol>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Roll</th>
				<th>Class</th>
				<th>City</th>
				<th>Contact</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
								
			<?php
				$db_sinfo=mysqli_query($con, "SELECT * FROM `student_info`");

				while ($row=mysqli_fetch_assoc($db_sinfo)) { ?>
								

				<tr>
					<td><?= $row['id'];?></td>
					<td><?= ucwords($row['name']);?></td>
					<td><?= $row['roll'];?></td>
					<td><?= $row['class'];?></td>
					<td><?= ucwords($row['city']);?></td>
					<td><?= $row['pcontact'];?></td>
					<td><img src="student_images/<?= $row['image'];?>" alt=""></td>
					<td>
						<a href="index.php?page=update-student&id=<?= base64_encode($row['id']);?>" class="btn btn-sm btn btn-warning"><i class="fa fa-pencil"> Edit</i></a>
						&nbsp;
						<a href="delete-student.php?id=<?= base64_encode($row['id']);?>" class="btn btn-sm btn btn-danger"><i class="fa fa-trash"> Delete</i></a>
					</td>
				</tr>

				<?php
					}

				?>

		</tbody>
							
	</table>

</div>
