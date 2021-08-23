<?php 

include '../shared/session.php';
include '../shared/header.php';


$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();

if ($user['utype'] == 'admin') {
	if (isset($_POST['add_location'])) {
		if ($conn->query("SELECT * FROM locations WHERE name='".$_POST['name']."'")) {
			if ($conn->query("INSERT INTO locations(name,country,city) VALUES ('".$_POST['name']."','".$_POST['country']."','".$_POST['city']."')") == true) {
				$_SESSION['good-mes'] = "Location was added successfully";
			} else {
				$_SESSION['bad-mes'] = "Database error";
			}
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

<?php endif ?>

<div class="row justify-content-center p-5">
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">New location</h1>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="name">Name;</label>
					<input class="form-control" type="text" name="name" placeholder="Enter Location Name..." required>
				</div><br>
				<div class="form-group">
					<label for="country">Country;</label>
					<input class="form-control" type="text" name="country" placeholder="Enter Location Country..." required>
				</div><br>
				<div class="form-group">
					<label for="city">City;</label>
					<input class="form-control" type="text" name="city" placeholder="Enter Location City..." required>
				</div><br>
				<button style="float:right;" name="add_location" class="btn btn-primary">SUBMIT</button>
			</form>
		</div>
	</div>
</div>


<?php include '../shared/footer.php'; ?>
