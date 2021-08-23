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
		<h1 class="card-title">LOCATIONS</h1>
	</div>
	<div class="card-body">
		<div class="card bg-info">
			<div class="card-body text-end">
				<a href="new_location.php" class="btn btn-primary">+ Add New Location</a>
			</div>
		</div><br>
	</div>
</div>


<?php include '../shared/footer.php'; ?>