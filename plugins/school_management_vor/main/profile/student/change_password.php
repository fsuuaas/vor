<?php
	$rows = db_get_where('vor_admin', array('username' => $_SESSION['username']));
?>

<div class="row">
	<aside class="profile-nav col-lg-3">
		<section class="panel">
			<div class="user-heading round">
				<a href="#">
					<img src="<?php if(file_exists('img/admin/avatar.jpg')) { echo 'img/admin/avatar.jpg'; } else { echo 'https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg'; } ?>" alt="">
				</a>
				<h1><?php echo $rows[0]['full_name']; ?></h1>
				<p><?php echo $rows[0]['email']; ?></p>
			</div>
			<ul class="nav nav-pills nav-stacked">
				<li><a href="profile"> <i class="fa fa-user"></i> Profile</a></li>
        		<li class="active"><a href="change_password"> <i class="fa fa-lock"></i> Change Password</a></li>
			</ul>
		</section>
	</aside>
	<aside class="profile-info col-lg-9">
		<section>
			<div class="panel panel-primary">
				<div class="panel-heading">Change your password</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-2 control-label">Current Password</label>
							<div class="col-lg-6">
								<input type="password" class="form-control" id="c-pwd" placeholder=" ">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">New Password</label>
							<div class="col-lg-6">
								<input type="password" class="form-control" id="n-pwd" placeholder=" ">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Re-type New Password</label>
							<div class="col-lg-6">
								<input type="password" class="form-control" id="rt-pwd" placeholder=" ">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="btn btn-danger">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</aside>