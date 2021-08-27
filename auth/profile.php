<?php 

include '../shared/session.php';
include '../shared/header.php';


if (isset($_POST['fname'])) {

	if ($conn->query("UPDATE users SET fname='".$_POST['fname']."' WHERE id=".$_SESSION['user']['id']."")) {
		$_SESSION['good-mes'] = 'Update success';
	} else {
		$_SESSION['bad-mes'] = 'Update failed';
	}
}
if (isset($_POST['lname'])) {

	if ($conn->query("UPDATE users SET lname='".$_POST['lname']."' WHERE id=".$_SESSION['user']['id']."")) {
		$_SESSION['good-mes'] = 'Update success';
	} else {
		$_SESSION['bad-mes'] = 'Update failed';
	}
}
if (isset($_POST['location'])) {

	if ($conn->query("UPDATE users SET location='".$_POST['location']."' WHERE id=".$_SESSION['user']['id']."")) {
		$_SESSION['good-mes'] = 'Update success';
	} else {
		$_SESSION['bad-mes'] = 'Update failed';
	}
}
if (isset($_POST['email'])) {

	if ($conn->query("UPDATE users SET email='".$_POST['email']."' WHERE id=".$_SESSION['user']['id']."")) {
		$_SESSION['good-mes'] = 'Update success';
	} else {
		$_SESSION['bad-mes'] = 'Update failed';
	}
}
if (isset($_POST['pass'])) {

	if (isset($_POST['new-pass']) && isset($_POST['con-pass'])) {

		if ($_POST['new-pass'] == $_POST['con-pass']) {

			$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
			$user=$users->fetch_assoc();

			if (md5($_POST['pass']) == $user['pass']) {

				if ($conn->query("UPDATE users SET pass='".md5($_POST['pass'])."' WHERE id=".$_SESSION['user']['id']."")) {
					$_SESSION['good-mes'] = 'Update success';
				} else {
					$_SESSION['bad-mes'] = 'Update failed';
				}
			} else {
				$_SESSION['bad-mes'] = 'Old password is wrong';
			}
		} else {
			$_SESSION['bad-mes'] = 'Password must match confirmation';
		}
	} else {
		$_SESSION['bad-mes'] = 'New password is invalid';
	}
}

$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();
$_SESSION['user'] = $user;

?>


<div class="p-5">
	<div class="card">
		<div class="card-header">
			<h1>UPDATE PROFILE</h1>
		</div>

		<div class="card-body">
			<?php if (isset($_SESSION['bad-mes'])): ?>

				<div class="alert alert-danger">
					<?php echo $_SESSION['bad-mes']; unset($_SESSION['bad-mes']); ?>
				</div>

			<?php endif ?>
						
			<?php if (isset($_SESSION['good-mes'])): ?>

				<div class="alert alert-success">
					<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
				</div>

			<?php endif ?>

			<form method="post">
				<div class="form-group">
					<label for="fname">First Name;</label>
					<input class="form-control" type="text" name="fname" value="<?php echo $_SESSION['user']['fname']; ?>" placeholder="Enter new first name..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="lname">Last Name;</label>
					<input class="form-control" type="text" name="lname" value="<?php echo $_SESSION['user']['lname']; ?>" placeholder="Enter new last name..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="location">Location;</label>
					<select class="form-select" name="location" aria-label="Default select example">
						<?php 

						$locations=$conn->query("SELECT * FROM locations WHERE id='".$_SESSION['user']['location']."'");
						$current=$locations->fetch_assoc();
						 ?>
						<option selected><?php echo $current['name'].', '.$current['city'].', '.$current['country']; ?></option>
						<?php 
							$locations=$conn->query("SELECT * FROM locations");

							while ($location=$locations->fetch_assoc()): ?>
							   	<option value="<?php echo $location['id'] ?>"><?php echo $location['name'].', '.$location['city'].', '.$location['country']; ?></option>
							<?php endwhile; ?>
					</select>
				</div>
				<br>
				<div class="form-group">
					<label for="email">Email;</label>
					<input class="form-control" type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" placeholder="Enter new email..." required>
				</div>
				<br>
				<h3>Change Password;</h3>
				<br>
				<div class="form-group">
					<label for="pass">Old Password;</label>
					<input class="form-control" type="password" name="pass" placeholder="Enter old password...">
				</div>
				<br>
				<div class="form-group">
					<label for="pass">New Password;</label>
					<input class="form-control" type="password" name="new-pass" placeholder="Enter new password...">
				</div>
				<br>
				<div class="form-group">
					<label for="con-pass">Confirm Password;</label>
					<input class="form-control" type="password" name="con-pass" placeholder="Re-enter password...">
				</div><br>
				<button style="float:right;" class="btn btn-primary" type="submit">CONFIRM CHANGES</button>
			</form>
		</div>
	</div>
</div>

<?php include '../shared/footer.php'; ?>