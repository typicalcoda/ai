<?php
include('header.php');

if(isset($_SESSION['User'])){
	header("location:".site_url()."members");
}

?>


<div class="container none">
	<div class="col-md-1"></div>
	<div class="col-md-5 login-section">
		<div class="members-bar">
			<p><span class="fa fa-sign-in"></span><span class="members-title">Already a member, please sign in</span></p>
		</div>


		<div class="bar-desc">
			<p>If you already have an account with us, please sign in. Being an All India  member will enable you to leave reviews on our website and place orders onine.</p>
		</div>

		<?php
		if(isset($_POST['submit-login'])){

			if(set('email') && set('password')){

				//attempt to login the user
				$cust = new Customer();
				if( $cust->attempt($_POST['email'], md5($_POST['password'])) ){
					header("location:members/index.php");
					exit;

				}



			}
			else {

				error("Incorrect credentials!");

			}
		}
		?>

		<!-- Login Form -->
		<form class="login-form" method="POST">
			<div class="form-group">
				<label>Email address</label>
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox">Remember Me
				</label>
			</div>
			<button type="submit" name="submit-login" class="btn btn-default btn-success mem-login-btn">Log in</button>
			<p><a href="#">Forgot Your Password?</a></p>
		</form>
	</div>


	<div class="col-md-5 register-section">
		<div class="register-bar">
			<p><span class="fa fa-sign-in"></span><span class="register-title">Not a member, register for free</span></p>

		</div>


		<div class="bar-desc">
			<p>You can register your account completely free of charge, and start placing your takeaway orders straight away.</p>
		</div>
		<?php

		if(isset($_POST['submit-register'])){
			if(set('reg-email') && set('reg-password'))
			{
				if($_POST['reg-password'] === $_POST['confirm-password']){

					//the button was clicked
					//email passed through, and
					//the two passwords match


					//insert it into the db
					$stmt = $db->prepare("INSERT INTO customers(firstname,lastname,email,password,telephone) VALUES(:firstname,:lastname,:email,:password,:telephone)");

					//encrypt
					$pwd = md5($_POST['reg-password']);

					$stmt->bindParam(':firstname', $_POST['firstname']);
					$stmt->bindParam(':lastname', $_POST['lastname']);
					$stmt->bindParam(':email', $_POST['reg-email']);
					$stmt->bindParam(':password', $pwd);
					$stmt->bindParam(':telephone', $_POST['telephone']);

					$stmt->execute();

					$cust = new Customer();			
					if( $cust->attempt($_POST['reg-email'], md5($_POST['reg-password'])) ){
						echo "works3";
						header("location:members/index.php");
						exit;

					}

				} else {error("The two password don't match.");}} else {error("You need to fill in at least an email and password");}

			}

			?>
			<form class="login-form" method="POST">

				<div class="form-group">
					<label>First Name</label>
					<input type="firstname" class="form-control" name="firstname" placeholder="First Name">
				</div>

				<div class="form-group">
					<label>Last Name</label>
					<input type="lastname" class="form-control" name="lastname" placeholder="Last Name">
				</div>

				<div class="form-group">
					<label>Email Address</label>
					<input type="email" class="form-control" name="reg-email" placeholder="Email Address">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="reg-password" placeholder="Password">
				</div>

				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
				</div>

				<div class="form-group">
					<label>Telephone</label>
					<input type="telephone" class="form-control" name="telephone" placeholder="Telephone">
				</div>


				<button type="submit" name="submit-register" class="btn btn-default btn-danger">Register Now</button>
			</form>	
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>