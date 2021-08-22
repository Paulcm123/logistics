<?php 
include '../shared/session.php';
include '../shared/header.php';

if (isset($_POST['register'])) {
	#check passwords
	if ($_POST['pass']==$_POST['con-pass']) {
		#check if account is in use
		$users=$conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'");
		$user=$users->fetch_assoc();

		if (is_null($user)) {
			#proceed to insert
			$sql = "INSERT INTO users(fname,lname,email,pass) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".md5($_POST['pass'])."')";

			if ($conn->query($sql)==TRUE) {
				# make session
				$users=$conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'");
				$user=$users->fetch_assoc();
				$_SESSION['user'] = $user;
				$_SESSION['good-mes'] = "registration was successful";
				header('location: ../dash');
			} else {
				$_SESSION['bad-mes'] = "Database error";
			}
			
		} else {
			$_SESSION['bad-mes'] = "Email already in use";
		}
		
	}
	else{
		$_SESSION['bad-mes'] = "Passwords should match!";
	}
}

?>

<div class="p-5">
	<div class="card">
		<div class="card-header">
			<h1>REGISTER</h1>
		</div>

		<div class="card-body">
			<?php if (isset($_SESSION['bad-mes'])): ?>

				<div class="alert alert-danger">
					<?php echo $_SESSION['bad-mes']; unset($_SESSION['bad-mes']); ?>
				</div>

			<?php endif ?>
			
			<form method="post">
				<div class="form-group">
					<label for="fname">First Name;</label>
					<input class="form-control" type="text" name="fname" placeholder="Enter first name..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="lname">Last Name;</label>
					<input class="form-control" type="text" name="lname" placeholder="Enter last name..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="email">Email;</label>
					<input class="form-control" type="email" name="email" placeholder="Enter email..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="pass">Password;</label>
					<input class="form-control" type="password" name="pass" placeholder="Enter password..." required>
				</div>
				<br>
				<div class="form-group">
					<label for="con-pass">Confirm Password;</label>
					<input class="form-control" type="password" name="con-pass" placeholder="Re-enter password..." required>
				</div><br>
				<a href="signin.php">Already have an account?</a>
				<button style="float:right;" name="register" class="btn btn-primary" type="submit">REGISTER</button>
			</form>
		</div>
	</div>
</div>
<?php include '../shared/footer.php'; ?>