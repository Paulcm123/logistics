<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Logistics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
  <nav class="navbar transparent p-4 navbar-expand-lg navbar-inverse navbar-fixed-top">
    <a class="navbar-brand" href=""><h1 class="display-3">LOGISTICS</h1></a>
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link px-3" href="">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-3" href="auth/signin.php">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-3" href="">ABOUT</a>
      </li>
      <?php 
        session_start();
        if (isset($_SESSION['user'])): ?>
        <li>
          <a class="btn btn-primary btn-lg" href="dash">DASHBOARD</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="btn btn-outline-primary mr-1 btn-lg" href="auth/signup.php">REGISTER</a>
        </li>
        <li>
          <a class="btn btn-primary btn-lg" href="auth/signin.php">SIGN IN</a>
        </li>
      <?php endif; ?>
    </ul>
    
  </nav>

  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-md-7">
          <img class="img-fluid" src="files/delivery_vehicle.png" alt="dfn">
        </div>
      </div>
      <div class="carousel-caption">
        <div class="row">
          <div class="col"></div>
          <div class="col-md-4 text-left">
            <h1 >Welcome to Logistics</h1><br><br>
            <p></p><br><br>
            <a class="btn btn-primary btn-lg" href="auth/signin.php">GET STARTED</a>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-6">
          <img class="img-fluid" src="files/delivery_scooter.png" alt="fgd">
        </div>
      </div>
      
      <div class="carousel-caption">
        <div class="row">
          <div class="col"></div>
          <div class="col-md-4 text-left">
            <h1 >Welcome to Logistics</h1><br><br><br><br>
            <a class="btn btn-primary btn-lg" href="auth/signin.php">GET STARTED</a>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-5">
          <img class="img-fluid" src="files/delivery_drone.png" alt="dfn">
        </div>
      </div>
      <div class="carousel-caption">
        <div class="row">
          <div class="col"></div>
          <div class="col-md-4 text-left">
            <h1 >Welcome to Logistics</h1><br><br>
            <p></p><br><br>
            <a class="btn btn-primary btn-lg" href="auth/signin.php">GET STARTED</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

</body>
</html>
