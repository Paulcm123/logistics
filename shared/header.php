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
			<a class="navbar-brand" href="#">Logistics Dashboard</a>
		</nav>
		<div class="row">
			<div class="row">
				<div class="col-sm-3">
					<div class="card text-center text-primary">
						<div class="card-header p-5">
							<?php if (isset($_SESSION['user']['avatar'])): ?>
								<img src="<?php echo '../files/'.$_SESSION['user']['avatar'] ?>" class="rounded-circle img-fluid" alt="Cinque Terre"> 
							<?php else: ?>
								<img src="../files/user_icon.png" class="rounded-circle img-fluid" alt="Cinque Terre">
							<?php endif; ?>
							<p class="p-3"><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></p>
							<a class="btn btn-outline-danger" href="../auth/signout.php">Sign out</a>
						</div>
						<div class="card-body p-4 d-grid gap-4">
							<p>@Admin</p>
							<a class="btn btn-outline-dark" href="">Shipments</a>
							<a class="btn btn-outline-dark" href="">In Transit</a>
							<a class="btn btn-outline-dark" href="">Awaiting Pickup</a>
						</div>
					</div>
				</div>
				<div class="col">
		
	<?php else: ?>

		<div class="container container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-8">

	<?php endif ?>
				