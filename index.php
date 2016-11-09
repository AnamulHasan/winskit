<?php session_start();
	
	if(isset($_POST["submit"])){
		$username=htmlspecialchars(stripslashes(trim($_POST["username"])));
		$password=htmlspecialchars(stripslashes(trim($_POST["password"])));

		require_once("db_config.php");
		require('functions/users.php');
		
		$db = new MySQLi(SERVER,USER,PSWD,DB);
		$username = mysqli_real_escape_string($db,$username);
		$password = mysqli_real_escape_string($db,$password);

		$user_login=$db->query("select u.user_id, u.user_name, r.role_name from users u, role r where u.role_id = r.role_id and (u.user_name='$username' and u.user_password='$password')");

		list($user_id,$user_name,$role_name)=$user_login->fetch_row();

		if(isset($user_id) === TRUE){
			
			$_SESSION["user_id"] = $user_id;
			$_SESSION["user_name"] = $user_name;
			$_SESSION["role_name"] = $role_name;

			header("location:home.php");
			exit();
		}else if(empty($username)===true || empty($password)===true){
			$errors[]="Please enter valid username and password";
		}else if(user_exists($username)===false){
			$errors[]="We can't find that username. Have you registered?";
		}else{
			$errors[] = "Password not match! Please try again.";
		}
		
	}//end of isset;
?>
<!doctype html>
<html>
<head>
	<title>WinsKit</title>
	<script src="resource/js/jquery.min.js"></script>
	<script src="resource/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resource/css/custom.css">
	<script>
		$(function () {
			$('input,textarea').focus(function () {
				$(this).data('placeholder', $(this).attr('placeholder')).attr('placeholder', '');
			}).blur(function () {
				$(this).attr('placeholder', $(this).data('placeholder'));
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<!--Header-->
		<header>
			<h1>Winskit School Management</h1>
		</header><!--end of Header-->

		<!--Content-->
		<section>
			<div class="myStyle col-lg-4 col-md-6 col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">
				<h2>Login Form</h2>
				<hr>
				<form action="index.php" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Enter Username">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Enter Password">
					</div>
					<div class="form-group myStyle2">
						<input type="submit" name="submit" value="Login" class="btn btn-lg btn-success" />
					</div>
				</form>
			</div><!--end of .myStyle-->
		</section><!--end of content-->
	</div><!--end of container-->
	<br><br>
	<div>
		<?php
		if(!empty($errors)){
			output_errors($errors);
		}
		?>
	</div>
</body>
</html>