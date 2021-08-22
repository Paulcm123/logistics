<?php 

include '../shared/session.php';
include '../shared/header.php';

?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif ?>


<?php if ($_SESSION['user']['utype'] == 'regular'): ?>

<div class="card text-primary">
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
						<p>Total users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>In transit</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Awaiting pickup</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center">
					<div class="card-body">
						<h1 class="display-1">33</h1>
					</div>
					<div class="card-footer">
						<p>Outlets</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<br>
<div class="card text-primary">
	<div class="card-header p-4">
		<h1 class="card-title">ANALYTICS</h1>
	</div>
	<div class="card-body p-4">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/bar_graph.png" alt="Cinque Terre">
					</div>
					<div class="card-footer">
						<p>Users</p>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body text-center">
						<img src="../files/chart.png" alt="Cinque Terre">
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
		head
	</div>
	<div class="card-body">
		bnb
	</div>
</div>

<?php endif ?>


<?php include '../shared/footer.php'; ?>