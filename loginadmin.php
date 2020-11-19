<!DOCTYPE html>
<html lang="en">
<head>
	<title> Đăng nhập | Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="layouts/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="layouts/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="layouts/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="layouts/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
		include('modules/config.php');
		session_start();
		
		if(isset($_POST['loginadmin'])){
			mysqli_select_db("loginadmin",$conn);
			$username=$_POST['username'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$sql="SELECT * FROM admin WHERE username='$username' and email='$email' and password='$password' ";
			$query=mysqli_query($conn,$sql);
			$nums=mysqli_num_rows($query);
			if($nums==0){
				echo("Username or Password is not correct, please try again");
				header('location:loginadmin.php');
			}else{
				$_SESSION['loginadmin']=$username;
				header('location:index.php');
			}
		}
?>
<div class="form">
    <form action="" method="post" name="login">	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Xin chào admin
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email" required>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="loginadmin" id="loginadmin" >
								Đăng nhập
							</button>
						</div>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="layouts/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="layouts/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="layouts/login/vendor/bootstrap/js/popper.js"></script>
	<script src="layouts/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="layouts/login/vendor/select2/select2.min.js"></script>
	<script src="layouts/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="layouts/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="layouts/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="layouts/login/js/main.js"></script>

</body>
</html>