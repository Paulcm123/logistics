<?php 

include '../shared/session.php';
include '../shared/header.php';


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
						<th>Actions</th>
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
							<td>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
									<?php if ($user['utype'] != 'admin'): ?>
										<button name="mk-admin" class="btn btn-sm btn-primary">MAKE ADMIN</button>
									<?php endif; ?>
									<?php if ($user['utype'] != 'staff'): ?>
										<button name="mk-staff" class="btn btn-sm btn-primary">MAKE STAFF</button>
									<?php endif; ?>
									<?php if ($user['utype'] != 'regular'): ?>
										<button name="demote" class="btn btn-sm btn-primary">DEMOTE</button>
									<?php endif; ?>


									<?php if ($user['status'] == 'active'): ?>
										<button name="disable" class="btn btn-sm btn-warning" >Disable</button>
									<?php else: ?>
										<button name="enable" class="btn btn-sm btn-success">Enable</button>
									<?php endif; ?>


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