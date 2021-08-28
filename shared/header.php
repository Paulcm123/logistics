<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logistics data</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
	<?php if (isset($_SESSION['user'])): ?>
		<nav class="navbar sticky-top p-3 bg-primary navbar-dark">
			<a class="navbar-brand" href="../dash">Logistics Dashboard</a>
		</nav>
		<div class="row">
			<div class="row">
				<div class="col-sm-2">
					<div class="card text-center text-info">
						<div class="card-header p-5">
							<?php if (isset($_SESSION['user']['avatar'])): ?>
								<img src="<?php echo '../files/'.$_SESSION['user']['avatar'] ?>" class="rounded-circle img-fluid" alt="Cinque Terre"> 
							<?php else: ?>
								<img style="height:99px" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
							<?php endif; ?>
							<p class="pt-4"><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></p>
							<p>@<?php echo $_SESSION['user']['username']; ?></p>
							<a class="btn btn-outline-danger" href="../auth/signout.php">Sign out</a>
						</div>
						<div class="card-body d-grid gap-4">
							<a class="btn btn-outline-info" href="../auth/profile.php">Edit Profile</a>
							<a class="btn btn-outline-info" href="../dash/new_shipment.php">+ Add Shipment</a>

							<?php if ($_SESSION['user']['utype'] == 'admin' || $_SESSION['user']['utype'] == 'staff'): ?>

								<?php if ($_SESSION['user']['utype'] == 'admin'): ?>

									<a class="btn btn-outline-info" href="../dash/users.php">Users</a>
									<a class="btn btn-outline-info" href="../dash/shipments.php">Shipments</a>
									<a class="btn btn-outline-info" href="../dash/locations.php">Locations</a>

								<?php endif ?>

								<a class="btn btn-outline-info" href="../dash/incoming.php">Incoming</a>
								<a class="btn btn-outline-info" href="../dash/outgoing.php">Outgoing</a>
								<a class="btn btn-outline-info" href="../dash/pickup.php">Awaiting Pickup</a>
								<a class="btn btn-outline-info" href="../dash/delivery.php">Awaiting Delivery</a>

							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="col">
		
	<?php else: ?>

		<div class="container container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-8">

	<?php endif ?>
				