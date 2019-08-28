


<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-users"></i> All Users</li>
	</ol>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Username</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
								
			<?php
				$db_sinfo=mysqli_query($con, "SELECT * FROM `users`");

				while ($row=mysqli_fetch_assoc($db_sinfo)) { ?>
								

				<tr>
					<td><?= ucwords($row['name']);?></td>
					<td><?= $row['email'];?></td>
					<td><?= $row['username'];?></td>
					<td><img src="images/<?= $row['image'];?>" alt=""></td>
				</tr>

				<?php
					}

				?>

		</tbody>
							
	</table>

</div>
