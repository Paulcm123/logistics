<?php 

include '../shared/session.php';
include '../shared/header.php';

?>

<?php if (isset($_SESSION['good-mes'])): ?>

	<div class="alert alert-success">
		<?php echo $_SESSION['good-mes']; unset($_SESSION['good-mes']); ?>
	</div>

<?php endif ?>


<div class="card">
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

<?php include '../shared/footer.php'; ?>