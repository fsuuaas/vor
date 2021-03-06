<?php

require_once 'lib/config.php';

if(!isset($_SESSION["username"])) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Mosaddek">
		<link rel="shortcut icon" href="assets/img/logo.png">
		
		<title>
		<?php
			function head_settings($val) {
				return end((db_get('vor_settings')))[$val];
			}
			echo strip_tags(head_settings('header'));
		?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-reset.css">
		<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style-responsive.css">
		<link rel="stylesheet" type="text/css" href="assets/lib/sweet-alert.css">
		
		<script src="js/jquery.js"></script>
		<script src="assets/lib/sweet-alert.min.js"></script>
		<script type="text/javascript">
		function logout(){
			swal({
				title: "Logout Success!",
				text: "redirecting....",
				type: "success",
				confirmButtonText: "OK",
				timer: 1500
			});
		}
		</script>
	</head>
	<body>
		<section id="container" class="">
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
				</div>
				<a href="index.php" class="logo" >V<span>O</span>R</a>
				<div class="nav notify-row" id="top_menu">
					<ul class="nav top-menu">
						<?php include('top.php'); ?>
					</ul>
				</div>
				<div class="top-nav ">
					<ul class="nav pull-right top-menu">
						<li>
							<input type="text" class="form-control search" placeholder="Search">
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								<?php
									require_once 'lib/config.php';
									
									$username = $_SESSION['username'];
									
									mysql_connect(HOST, USER, PASS);
									mysql_select_db(DB);
									
									$sql = mysql_query("SELECT * FROM vor_admin WHERE `username` = '{$username}'");
									$result = mysql_fetch_assoc($sql);
									
									$default_img = 'img/user/admin_1.png';
									$user_image  = (empty($result['image'])) ? $default_img : 'img/user/'.$result['image']; ;
								?>
								<img alt="" src="<?php if(file_exists($user_image)) { echo $user_image; } else { echo $default_img; } ?>" height="29" width="29">
								<span class="username">
									<?php
										echo $result['username'];
									?>
								</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu extended logout">
								<div class="log-arrow-up"></div>
								<div class="profile-head">
									<img class="img-circle" alt="" src="<?php if(file_exists($user_image)) { echo $user_image; } else { echo $default_img; } ?>" height="100px" width="100px">
									<h3><?php echo $result['full_name']; ?></h3>
								</div><hr>
								
								<li><a href="profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
								<li><a href="settings"><i class="fa fa-cog"></i> Settings</a></li>
								<li><a href="status"><i class="fa fa-bell-o"></i> Status</a></li>
								<li><a href="logout"><i class="fa fa-key"></i> Log Out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</header>
