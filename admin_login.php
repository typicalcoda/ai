<?php
include('header.php');

if(isset($_SESSION['Admin'])){
	header("location:".site_url()."admin");
}

?>


<div class="container none">
	<div class="col-md-12 login-section">
		<div class="members-bar">
			<p><span class="fa fa-sign-in"></span><span class="members-title">Admin sign-in</span></p>
		</div>


		<div class="bar-desc">
		</div>

		<?php
		if(isset($_POST['submit-login'])){

			if(set('email') && set('password')){

				//attempt to login the user
				$admin = new Admin();
				if( $admin->attempt($_POST['email'], md5($_POST['password'])) ){
					header("location:admin/index.php");
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
			<button type="submit" name="submit-login" class="btn btn-default btn-success mem-login-btn">Log in</button>
		</form>
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

		</div>
	</div>
</body>
</html>