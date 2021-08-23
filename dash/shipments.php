<?php 

include '../shared/session.php';
include '../shared/header.php';

# search goods
# add goods
# delete goods

?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif ?>


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
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$shipments=$conn->query("SELECT * FROM shipments");

					while ($shipment=$shipments->fetch_assoc()): ?>

						<tr>
							<td><?php echo $shipment['id']; ?></td>
							<td><?php echo $shipment['sender_id']; ?></td>
							<td><?php echo $shipment['receiver_id']; ?></td>
							<td><?php echo $shipment['origin']; ?></td>
							<td><?php echo $shipment['destination']; ?></td>
							<td><?php echo $shipment['date']; ?></td>
							<td><?php echo $shipment['status']; ?></td>
							<td>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $shipment['id']; ?>">

									<?php if ($shipment['status'] == 'pickup'): ?>
										<button name="collect" class="btn btn-sm btn-success">Collect</button>

									<?php elseif ($shipment['status'] == 'shipment'): ?>
										<button name="dispatch" class="btn btn-sm btn-success">Dispatch</button>

									<?php elseif ($shipment['status'] == 'shipping'): ?>
										<button name="receive" class="btn btn-sm btn-success">Receive</button>

									<?php elseif ($shipment['status'] == 'delivery'): ?>
										<button name="deliver" class="btn btn-sm btn-success">Deliver</button>

									<?php else: ?>
										<button class="btn btn-sm btn-success disabled">Delivered</button>

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