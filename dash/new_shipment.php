<?php 

include '../shared/session.php';
include '../shared/header.php';


if (!isset($_SESSION['user'])) {
	header("location: ../");
}

if (isset($_SESSION['user'])) {

	if (isset($_POST['shipment'])) {
		if ($users=$conn->query("SELECT * FROM users WHERE username='".$_POST['receiver']."'")) {
			$user=$users->fetch_assoc();

			$sql = "INSERT INTO shipments(sender_id,receiver_id,origin,destination,description) VALUES ('".$_SESSION['user']['id']."','".$user['id']."','".$_POST['origin']."','".$_POST['destination']."','".$_POST['description']."')";

			if ($conn->query($sql)) {
				$_SESSION['good-mes'] = "Shipment was added successfully";
			} else {
				echo $conn->error;
				$_SESSION['bad-mes'] = "Database error";
			}
		} else {
			$_SESSION['bad-mes'] = "User was not found";
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
			<h1 class="card-title">New Shipment</h1>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="receiver">Receiver;</label>
					<input class="form-control" type="text" name="receiver" placeholder="Enter Receiver @username..." required>
				</div><br>
				<div class="form-group">
					<label for="origin">From;</label>
					<select class="form-select" name="origin">
						<option selected>Select Pickup location</option>
						<?php 
							$locations=$conn->query("SELECT * FROM locations");

							while ($location=$locations->fetch_assoc()): ?>
							   	<option value="<?php echo $location['id'] ?>"><?php echo $location['name'].', '.$location['city'].', '.$location['country']; ?></option>
							<?php endwhile; ?>
					</select>
				</div><br>
				<div class="form-group">
					<label for="destination">To;</label>
					<select class="form-select" name="destination" data-live-search="true">
						<option selected>Select Drop off location</option>
						<?php 
							$locations=$conn->query("SELECT * FROM locations");

							while ($location=$locations->fetch_assoc()): ?>
							   	<option value="<?php echo $location['id'] ?>"><?php echo $location['name'].', '.$location['city'].', '.$location['country']; ?></option>
							<?php endwhile; ?>
					</select>
				</div><br>
				<div class="form-group">
					<label for="description">Description;</label>
					<textarea class="form-control" type="text" name="description" rows="5" placeholder="Write any important details about your item..." required></textarea>
				</div><br>
				<button style="float:right;" name="shipment" class="btn btn-primary">SUBMIT</button>
			</form>
		</div>
	</div>
</div>


<?php include '../shared/footer.php'; ?>
