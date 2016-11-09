<?php session_start();
if(!isset($_SESSION["user_id"]))header("location:index.php");
require_once("db_config.php");
$db=new MySQLi(SERVER,USER,PSWD,DB);
?>
<!Doctype html>
<html>
<head>
    <title>Winskit - <?php echo $_SESSION["user_name"];?></title>
    
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		});<!--placeholder-->
	</script>

</head>
<body>
	<div class="container">
		<div class="row">
            <div class="col-lg-12">
			
			<?php
				$role_name=$_SESSION["role_name"];

				if($role_name === 'teacher'){
					include("nav/nav_teacher.php");
				}else if($role_name === 'student') {
					include("nav/nav_student.php");
				}
			?>
			   
            </div><!-- .col-lg-12 .....-->
		</div><!-- .row -->
	</div><!-- .container-->

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1>Home winskit</h1>
			<?php
			include("placeholder.php");
			?>
			</div>
			<div class="col-sm-3">
			<?php
				include("sidebar/sidebar_right.php");
			?>
			</div>
		</div><!-- .row -->
	</div><!-- .container-->
</body>
</html>