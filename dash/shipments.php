<?php 

include '../shared/session.php';
include '../shared/header.php';


if (!isset($_SESSION['user'])) {
	header("location: ../");
}	

$users=$conn->query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
$user=$users->fetch_assoc();

if ($user['utype'] == 'admin' || $user['utype'] == 'staff') {

	if (isset($_POST['collect'])) {

		if ($conn->query("UPDATE shipments SET status='Awaiting shipment' WHERE id=".$_POST['id']."")) {
			$_SESSION['good-mes'] = 'Update success';
		} else {
			$_SESSION['bad-mes'] = 'Update failed';
		}
	}
	if (isset($_POST['dispatch'])) {

		if ($conn->query("UPDATE shipments SET status='Shipping' WHERE id=".$_POST['id']."")) {
			$_SESSION['good-mes'] = 'Update success';
		} else {
			$_SESSION['bad-mes'] = 'Update failed';
		}
	}
	if (isset($_POST['receive'])) {

		if ($conn->query("UPDATE shipments SET status='Awaiting delivery' WHERE id=".$_POST['id']."")) {
			$_SESSION['good-mes'] = 'Update success';
		} else {
			$_SESSION['bad-mes'] = 'Update failed';
		}
	}
	if (isset($_POST['deliver'])) {

		if ($conn->query("UPDATE shipments SET status='Delivered' WHERE id=".$_POST['id']."")) {
			$_SESSION['good-mes'] = 'Update success';
		} else {
			$_SESSION['bad-mes'] = 'Update failed';
		}
	}
	if (isset($_POST['delete'])) {

		if ($conn->query("DELETE FROM shipments WHERE id=".$_POST['id']."")) {
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
		<h1 class="card-title">SHIPMENTS</h1>
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
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$shipments=$conn->query("select distinct shipments.id,shipments.date,shipments.status,sender.username sender,receiver.username receiver,origin.name origin,destination.name destination from shipments inner join users sender on shipments.sender_id=sender.id inner join users receiver on shipments.receiver_id=receiver.id inner join locations origin on shipments.origin=origin.id inner join locations destination on shipments.destination=destination.id");

					while ($shipment=$shipments->fetch_assoc()): ?>

						<tr>
							<td><?php echo $shipment['id']; ?></td>
							<td><?php echo $shipment['sender']; ?></td>
							<td><?php echo $shipment['receiver']; ?></td>
							<td><?php echo $shipment['origin']; ?></td>
							<td><?php echo $shipment['destination']; ?></td>
							<td><?php echo $shipment['date']; ?></td>
							<td><?php echo $shipment['status']; ?></td>
							<form method="post">
								<input type="hidden" name="id" value="<?php echo $shipment['id']; ?>">

								<?php if ($shipment['status'] == 'Awaiting pickup'): ?>
									<td>
										<button name="collect" class="btn btn-sm btn-success">Collect</button>
									</td>

								<?php elseif ($shipment['status'] == 'Awaiting shipment'): ?>
									<td>
										<button name="dispatch" class="btn btn-sm btn-success">Dispatch</button>
									</td>

								<?php elseif ($shipment['status'] == 'Shipping'): ?>
									<td>
										<button name="receive" class="btn btn-sm btn-success">Receive</button>
									</td>

								<?php elseif ($shipment['status'] == 'Awaiting delivery'): ?>
									<td>
										<button name="deliver" class="btn btn-sm btn-success">Deliver</button>
									</td>

								<?php else: ?>
									<td>
										<button class="btn btn-sm btn-success disabled">Delivered</button>
									</td>

								<?php endif; ?>

								<td>
									<button name="delete" class="btn btn-sm btn-danger" ><span class="fa fa-trash-o"></span></button>
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