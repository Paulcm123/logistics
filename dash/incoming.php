<?php 

include '../shared/session.php';
include '../shared/header.php';
	

if (!isset($_SESSION['user'])) {
	header("location: ../");
}

$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();

if ($user['utype'] == 'admin' || $user['utype'] == 'staff') {

	if (isset($_POST['receive'])) {

		if ($conn->query("UPDATE shipments SET status='Awaiting delivery' WHERE id=".$_POST['id']."")) {
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
		<h1 class="card-title">INCOMING</h1>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>From</th>
						<th>To</th>
						<th>Origin</th>
						<th>Destination</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$shipments=$conn->query("select distinct shipments.id,shipments.date,shipments.status,sender.username sender,receiver.username receiver,origin.name origin,destination.name destination from shipments inner join users on users.location=shipments.destination inner join users sender on shipments.sender_id=sender.id inner join users receiver on shipments.receiver_id=receiver.id inner join locations origin on shipments.origin=origin.id inner join locations destination on shipments.destination=destination.id where shipments.destination=".$_SESSION['user']['location']." and shipments.status='Shipping'");

					while ($shipment=$shipments->fetch_assoc()): ?>

						<tr>
							<td><?php echo $shipment['id']; ?></td>
							<td><?php echo $shipment['sender']; ?></td>
							<td><?php echo $shipment['receiver']; ?></td>
							<td><?php echo $shipment['origin']; ?></td>
							<td><?php echo $shipment['destination']; ?></td>
							<td><?php echo $shipment['date']; ?></td>
							<td><?php echo $shipment['status']; ?></td>
							<td>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $shipment['id']; ?>">
									<button name="receive" class="btn btn-sm btn-success">Receive</button>
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