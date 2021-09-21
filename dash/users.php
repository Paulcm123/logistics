<?php 

include '../shared/session.php';
include '../shared/header.php';


if (!isset($_SESSION['user'])) {
	header("location: ../");
}

$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();
if ($user['utype'] == 'admin') {
	if (isset($_POST['mk-admin'])) {
			if ($conn->query("UPDATE users SET utype='admin' WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
	if (isset($_POST['mk-staff'])) {
			if ($conn->query("UPDATE users SET utype='staff' WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
	if (isset($_POST['demote'])) {
			if ($conn->query("UPDATE users SET utype='regular' WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
	if (isset($_POST['enable'])) {
			if ($conn->query("UPDATE users SET status='active' WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
	if (isset($_POST['disable'])) {
			if ($conn->query("UPDATE users SET status='disabled' WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
	if (isset($_POST['delete'])) {
			if ($conn->query("DELETE FROM users WHERE id=".$_POST['id']."")) {
				$_SESSION['good-mes'] = 'Update success';
			} else {
				$_SESSION['bad-mes'] = 'Update failed';
			}
	}
} else {
	$_SESSION['bad-mes'] = 'This page failed authorize you! You may not be able to perform any actions';
}

	

?>

<?php if (isset($_SESSION['bad-mes'])): ?>

	<div class="alert alert-danger">
		<?php echo $_SESSION['bad-mes']; unset($_SESSION['bad-mes']); ?>
	</div>

<?php endif; ?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif; ?>

<div class="card">
	<div class="card-header">
		<h1 class="card-title">USERS</h1>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>@username</th>
						<th>Full name</th>
						<th>Email</th>
						<th>Ranking</th>
						<th>Status</th>
						<th colspan="5">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$users=$conn->query("SELECT * FROM users");

					while ($user=$users->fetch_assoc()): ?>

						<tr>
							<td><?php echo $user['id']; ?></td>
							<td><?php echo '@'.$user['username']; ?></td>
							<td><?php echo $user['fname'].' '.$user['lname']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['utype']; ?></td>
							<td><?php echo $user['status']; ?></td>
							<form method="post">
								<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
								<?php if ($user['utype'] != 'admin'): ?>
									<td>
										<button name="mk-admin" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="MAKE ADMIN"><span class="fa fa-level-up"></span></button>
									</td>
								<?php endif; ?>
								<?php if ($user['utype'] != 'staff'): ?>
									<td>
										<button name="mk-staff" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="MAKE STAFF"><span class="fa fa-level-up"></span></button>
									</td>
								<?php endif; ?>
								<?php if ($user['utype'] != 'regular'): ?>
									<td>
										<button name="demote" class="btn btn-sm btn-warning"><span class="fa fa-level-down" data-toggle="tooltip" data-placement="top" title="DEMOTE"></span></button>
									</td>
								<?php endif; ?>


								<?php if ($user['status'] == 'active'): ?>
									<td>
										<button name="disable" class="btn btn-sm btn-secondary" ><span class="fa fa-ban" data-toggle="tooltip" data-placement="top" title="DISABLE"></span></button>
									</td>
								<?php else: ?>
									<td>
										<button name="enable" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="ENABLE">Enable</button>
									</td>
								<?php endif; ?>
								<td>
									<button name="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="DELETE"><span class="fa fa-trash-o"></span></button>
								</td>
								
							</form>
						</tr>

					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		
	</div>
</div>


<?php include '../shared/footer.php'; ?>