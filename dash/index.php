<?php 

include '../shared/session.php';
include '../shared/header.php';

if (!isset($_SESSION['user'])) {
	header("location: ../");
}
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
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query('select * from users')); ?></h1>
					</div>
					<div class="card-footer">

						<p>Total Users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments")); ?></h1>
					</div>
					<div class="card-footer">
						<p>Total Shipments</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Shipping'")); ?></h1>
					</div>
					<div class="card-footer">
						<p>In Transit</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Awaiting delivery'")); ?></h1>
					</div>
					<div class="card-footer">
						<p>Awaiting Delivery</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Awaiting shipment'")); ?></h1>
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
</div><br>
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
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Shipping' and destination=".$_SESSION['user']['location']."")); ?></h1>
					</div>
					<div class="card-footer">
						<a href="incoming.php"><p>Incoming</p></a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Awaiting shipment' and origin=".$_SESSION['user']['location']."")); ?></h1>
					</div>
					<div class="card-footer">
						<a href="outgoing.php"><p>Outgoing</p></a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Awaiting delivery' and destination=".$_SESSION['user']['location']."")); ?></h1>
					</div>
					<div class="card-footer">
						<a href="delivery.php"><p>Awaiting Delivery</p></a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1"><?php echo mysqli_num_rows($conn->query("select * from shipments where status='Awaiting pickup' and origin=".$_SESSION['user']['location']."")); ?></h1>
					</div>
					<div class="card-footer">
						<a href="pickup.php"><p>Awaiting Pickup</p></a>
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
</div><br>


<?php endif ?>

<div class="card">
	<div class="card-header">
		<h1>Track My Shipments</h1>
	</div>
	<div class="card-body">
		<div class="card bg-info">
			<div class="card-body text-end">
				<a href="new_shipment.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add New Shipment</a>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Incoming</h1>
			</div>
			<div class="card-body">
				<?php if ($incoming=$conn->query("select u1.fname,u1.lname,shipments.description,shipments.status,locations.name,locations.city,locations.country from shipments inner join users on shipments.receiver_id=users.id inner join users u1 on shipments.sender_id=u1.id inner join locations on shipments.destination=locations.id where shipments.receiver_id=".$_SESSION['user']['id']."")): ?>

					<?php if (mysqli_num_rows($incoming) == 0): ?>

						<div class="alert alert-info">
							You do not have any incoming shipments
						</div>

					<?php endif; ?>

					<?php while ($item=$incoming->fetch_assoc()): ?>

					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
									<b>From:</b><br>
									<img style="height: 30px;" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
									<b><?php echo $item['fname'].' '.$item['lname']; ?></b>
								</div>

								<div class="col">
									<b>Description:</b>
									<p><?php echo $item['description']; ?></p>
								</div>

								<div class="col-sm-2">
									<b>Address:</b>
									<p><?php echo $item['name'].', '.$item['city'].', '.$item['country'].' '; ?></p>
								</div>

								<div class="col-sm-3 text-end">
									<b>Status:</b>
									<button class="btn btn-info disabled"><?php echo $item['status']; ?></button>
								</div>
							</div>
						</div>
					</div><br>

					<?php endwhile; ?>

				<?php endif ?>

			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Outgoing</h1>
			</div>
			<div class="card-body">
				<?php if ($outgoing=$conn->query("select u1.fname,u1.lname,shipments.description,shipments.status,locations.name,locations.city,locations.country from shipments inner join users on users.id=shipments.sender_id inner join users u1 on u1.id=shipments.receiver_id inner join locations on shipments.destination=locations.id where shipments.sender_id=".$_SESSION['user']['id']."")): ?>
					
					<?php if (mysqli_num_rows($outgoing) == 0): ?>

						<div class="alert alert-info">
							You do not have any outgoing shipments
						</div>

					<?php endif; ?>

					<?php while ($item=$outgoing->fetch_assoc()): ?>

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<b>To:</b><br>
										<img style="height: 30px;" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
										<b><?php echo $item['fname'].' '.$item['lname']; ?></b>
									</div>

									<div class="col">
										<b>Description:</b>
										<p><?php echo $item['description']; ?></p>
									</div>

									<div class="col-sm-2">
										<b>Address:</b>
										<p><?php echo $item['name'].', '.$item['city'].', '.$item['country'].' '; ?></p>
									</div>

									<div class="col-sm-3 text-end">
										<b>Status:</b>
										<button class="btn btn-info disabled"><?php echo $item['status']; ?></button>
									</div>
								</div>
							</div>
						</div><br>

					<?php endwhile; ?>
				
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>


<?php include '../shared/footer.php'; ?>