<?php 

include '../shared/session.php';
include '../shared/header.php';

?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif ?>


<?php if ($_SESSION['user']['utype'] == 'admin'): ?>

<div class="card text-info">
	<div class="card-header p-4">
		<h1 class="card-title">USAGE STATISTICS</h1>
	</div>
	<div class="card-body p-4">
		<div class="row">
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Total Users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Total Shipments</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>In Transit</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Awaiting Delivery</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Awaiting Dispatch</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<br>
<div class="card text-info">
	<div class="card-header p-4">
		<h1 class="card-title">ANALYTICS</h1>
	</div>
	<div class="card-body p-4">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/bar_graph.png" class="img-fluid" alt="Cinque Terre">
					</div>
					<div class="card-footer">
						<p>Users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/chart.png" class="img-fluid" alt="Cinque Terre">
					</div>
					<div class="card-footer">
						<p>Shipments</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php elseif ($_SESSION['user']['utype'] == 'staff'): ?>

<div class="card text-info">
	<div class="card-header p-4">
		<h1 class="card-title">STATION STATISTICS</h1>
	</div>
	<div class="card-body p-4">
		<div class="row">
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Incoming</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Outgoing</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Awaiting Delivery</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Awaiting Dispatch</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<br>
<div class="card text-info">
	<div class="card-header p-4">
		<h1 class="card-title">ANALYTICS</h1>
	</div>
	<div class="card-body p-4">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/bar_graph.png" class="img-fluid" alt="Cinque Terre">
					</div>
					<div class="card-footer">
						<p>Users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/chart.png" class="img-fluid" alt="Cinque Terre">
					</div>
					<div class="card-footer">
						<p>Shipments</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php else: ?>

<div class="card">
	<div class="card-header">
		<h1>Track My Shipments</h1>
	</div>
	<div class="card-body">
		<div class="card bg-info">
			<div class="card-body text-end">
				<a href="new_shipment.php" class="btn btn-primary">+ Add New Shipment</a>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Incoming</h1>
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					You do not have any outgoing shipments
				</div>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<b>From:</b><br>
								<img style="height: 30px;" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
								<p>@username</p>
							</div>

							<div class="col">
								<b>Description:</b>
								<p>Description</p>
							</div>

							<div class="col-sm-2">
								<b>Address:</b>
								<p>Address</p>
							</div>

							<div class="col-sm-3 text-end">
								<b>Status:</b>
								<button class="btn btn-info disabled">Status</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Outgoing</h1>
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					You do not have any incoming shipments
				</div>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<b>To:</b><br>
								<img style="height: 30px;" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
								<p>@username</p>
							</div>

							<div class="col">
								<b>Description:</b>
								<p>Description</p>
							</div>

							<div class="col-sm-2">
								<b>Address:</b>
								<p>Address</p>
							</div>

							<div class="col-sm-3 text-end">
								<b>Status:</b>
								<button class="btn btn-info disabled">Awaiting delivery</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif ?>


<?php include '../shared/footer.php'; ?>