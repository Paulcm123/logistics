<?php 
include '../shared/header.php';
include '../shared/session.php';

if (isset($_POST['login'])) {
	$users=$conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'");
	$user=$users->fetch_assoc();

	if (!is_null($user)) {
		$passwd=md5($_POST['pass']);
		if ($passwd==$user['pass']) {
				$_SESSION['uid'] = $user['id'];
				$_SESSION['utype'] = $user['utype'];
				$_SESSION['good-mes'] = "Logged in Successfully!";
				header("location: ../dash");
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
			<form method="post">
				<div class="form-group">
					<label for="email">Email;</label>
					<input class="form-control" type="email" name="email" placeholder="Enter email..." required>
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