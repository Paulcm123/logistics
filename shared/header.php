<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logistics data</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar sticky-top p-3 bg-dark navbar-dark">
		<a class="navbar-brand" href="#">Logistics Dashboard</a>
		<div class="d-flex flex-row">
			<form class="form-inline p-1">
			    <div class="input-group">
			      	<div class="input-group-prepend">
			        	<span class="input-group-text">@</span>
			      	</div>
			      	<input type="text" class="form-control" placeholder="name...">
			    </div>
			</form>
			<form class="form-inline p-1">
			    <div class="input-group">
			      	<div class="input-group-prepend">
			        	<span class="input-group-text">@</span>
			      	</div>
			      	<input type="text" class="form-control" placeholder="from...">
			    </div>
			</form>
			<form class="form-inline p-1">
			    <div class="input-group">
			      	<div class="input-group-prepend">
			        	<span class="input-group-text">@</span>
			      	</div>
			      	<input type="text" class="form-control" placeholder="to...">
			    </div>
			</form>
		</div>
	</nav>
	<div class="container container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-3">
				<div class="card text-center">
					<div class="card-header p-5">
						 <img src="../files/user-icon.jpg" class="rounded-circle img-fluid" alt="Cinque Terre"> 
						 <p class="p-3">username</p>
						 <a class="btn btn-secondary" href="">Sign out</a>
					</div>
					<div class="card-body p-4 d-grid gap-4">
						<a class="btn btn-primary" href="">All Goods</a>
						<a class="btn btn-primary" href="">In Transit</a>
						<a class="btn btn-primary" href="">Awaiting Pickup</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				