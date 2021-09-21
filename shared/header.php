<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logistics data</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php if (isset($_SESSION['user'])): ?>
		<nav class="navbar sticky-top p-3 bg-primary navbar-dark">
			<a class="navbar-brand" href="../dash"><span class="fa fa-dashboard"></span> Logistics Dashboard</a>
			<ul class="navbar-nav mr-auto"></ul>
			<ul class="navbar-nav">
				<li class="nav-item"><span class="fa fa-map-marker"></span>
					<?php echo $_SESSION['station']['name'].", ".$_SESSION['station']['city'].", ".$_SESSION['station']['country']; ?>
				</li>
			</ul>
		</nav>
		<div class="row">
			<div class="row">
				<div class="col-sm-3">
					<div class="card text-info">
						<div class="card-header text-center p-5">
							<?php if (isset($_SESSION['user']['avatar'])): ?>
								<img src="<?php echo '../files/'.$_SESSION['user']['avatar'] ?>" class="rounded-circle img-fluid" alt="Cinque Terre"> 
							<?php else: ?>
								<img style="height:99px" src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
							<?php endif; ?>
							<p class="pt-4"><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></p>
							<p>@<?php echo $_SESSION['user']['username']; ?></p>
							<a class="btn btn-outline-danger" href="../auth/signout.php"><span class="fa fa-sign-out"></span> Sign out</a>
						</div>
						<div class="text-start card-body d-grid gap-4">
							<a class="btn btn-outline-info text-start" href="../auth/profile.php"> <span class="fa fa-user"></span> Edit Profile</a>
							<a class="btn btn-outline-info text-start" href="../dash/new_shipment.php"> <span class="fa fa-plus-circle"></span> Add Shipment</a>

							<?php if ($_SESSION['user']['utype'] == 'admin' || $_SESSION['user']['utype'] == 'staff'): ?>

								<?php if ($_SESSION['user']['utype'] == 'admin'): ?>

									<a class="btn btn-outline-info text-start" href="../dash/users.php"> <span class="fa fa-users"></span> Users</a>
									<a class="btn btn-outline-info text-start" href="../dash/shipments.php"> <span class="fa fa-truck"></span> Shipments</a>
									<a class="btn btn-outline-info text-start" href="../dash/locations.php"> <span class="fa fa-map-marker"></span> Locations</a>

								<?php endif ?>

								<a class="btn btn-outline-info text-start" href="../dash/incoming.php"> <span class="fa fa-truck"></span> Incoming</a>
								<a class="btn btn-outline-info text-start" href="../dash/outgoing.php"> <span class="fa fa-truck"></span> Outgoing</a>
								<a class="btn btn-outline-info text-start" href="../dash/pickup.php"> <span class="fa fa-truck"></span> Awaiting Pickup</a>
								<a class="btn btn-outline-info text-start" href="../dash/delivery.php"> <span class="fa fa-truck"></span> Awaiting Delivery</a>

							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="col-md-9">
		
	<?php else: ?>

		<div class="container container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-8">

	<?php endif ?>
				