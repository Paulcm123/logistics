<?php 

include '../shared/session.php';
include '../shared/header.php';

$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();

if ($user['utype'] == 'admin') {

	if (isset($_POST['delete'])) {

		if ($conn->query("DELETE FROM locations WHERE id=".$_POST['id']."")) {
			$_SESSION['good-mes'] = 'Update success';
		} else {
			$_SESSION['bad-mes'] = 'Update failed';
		}
	}

} else {

	$_SESSION['bad-mes'] = 'This page failed authorize you! You may not be able to perform any actions';
}

?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif ?>

<?php if (isset($_SESSION['bad-mes'])): ?>

	<div class="alert alert-danger">
		<?php echo $_SESSION['bad-mes']; unset($_SESSION['bad-mes']); ?>
	</div>

<?php endif; ?>

<div class="card">
	<div class="card-header">
		<h1 class="card-title">LOCATIONS</h1>
	</div>
	<div class="card-body">
		<div class="card bg-info">
			<div class="card-body text-end">
				<a href="new_location.php" class="btn btn-primary">+ Add New Location</a>
			</div>
		</div><br>

		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>City</th>
						<th>Country</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$locations=$conn->query("select * from locations");

					while ($location=$locations->fetch_assoc()): ?>

						<tr>
							<td><?php echo $location['id']; ?></td>
							<td><?php echo $location['name']; ?></td>
							<td><?php echo $location['city']; ?></td>
							<td><?php echo $location['country']; ?></td>
							<td>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $location['id']; ?>">
									<button name="delete" class="btn btn-sm btn-danger" >Delete</button>
								</form>
							</td>
						</tr>

					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php include '../shared/footer.php'; ?>