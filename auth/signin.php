<?php 
include '../shared/session.php';
include '../shared/header.php';

if (isset($_POST['login'])) {
	$users=$conn->query("SELECT * FROM users WHERE username='".$_POST['username']."'");
	$user=$users->fetch_assoc();

	if (!is_null($user)) {
		$passwd=md5($_POST['pass']);
		if ($passwd==$user['pass']) {
			if ($user['status']=='disabled') {
				$_SESSION['bad-mes'] = "Your account has been disabled, please contact administrator!";
			} else{
				$_SESSION['user'] = $user;
				$_SESSION['good-mes'] = "Logged in Successfully!";
				header("location: ../dash");			}
		} else {
			$_SESSION['bad-mes'] = "Incorrect password!";
		}
		
	} else {
		$_SESSION['bad-mes'] = "User account was not found!";
	}
}

?>

<div class="p-5">
	<div class="card">
		<div class="card-header">
			<h1>LOGIN</h1>
		</div>

		<div class="card-body">
			<?php if (isset($_SESSION['bad-mes'])): ?>

				<div class="alert alert-danger">
					<?php echo $_SESSION['bad-mes']; unset($_SESSION['bad-mes']); ?>
				</div>

			<?php endif ?>
			
			<form method="post">
				<div class="form-group">
					<label for="username">@username;</label>
					<input class="form-control" type="text" name="username" placeholder="Enter username..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="password">Password;</label>
					<input class="form-control" type="password" name="pass" placeholder="Enter password..." required>
				</div><br>
				<a href="signup.php">Don't have an account?</a>
				<button style="float:right;" name="login" class="btn btn-primary" type="submit">LOGIN</button>
			</form>
		</div>
	</div>
</div>
<?php include '../shared/footer.php'; ?>