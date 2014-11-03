<?php
//SET THE DATA TO PASS TO THE LOGIN FORM
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control', 
	'placeholder' => 'Email',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Password',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);

$openForm = array(
	'class' => 'form-signin',
);

$registerAnchor = array(
	'class' => 'text-center new-account',
);
?>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    	<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/logincss.css" rel="stylesheet">

	</head>
	<body>
		<div class = "container">
			<div class="row">
				<div class="col-md-6 col-md-4 col-md-offset-4">

					<h1 class="text-center login-title">Stryker Resident Engagement</h1>
					<div class="account-wall">
						<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    	alt="">

						<?php echo form_open($this->uri->uri_string(), $openForm); ?>

							<input type="text" name="login" value="" id="login" maxlength="80" size="30" class="form-control" placeholder="Email"  />
							<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>


							<input type="password" name="password" value="" id="password" size="30" class="form-control" placeholder="Password"  />
							<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>

													
							<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">

							<label class="checkbox pull-left">
								<input type="checkbox" name="remember" value="1" id="remember">
								Remember
							</label>

							<?php echo anchor('/auth/forgot_password/', 'Forgot Password', array('class' => 'pull-right need-help')); ?>

						<?php echo form_close(); ?>

					<!--ACCOUNT-WALL-->
					</div>

					<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Create New Account', $registerAnchor); ?>
				<!--COL-XS-4-->
				</div>
			<!-- ROW -->
			</div>
		<!--CONTAINER-FLUID -->
		</div>

		<!--CORE JS BOOTSTRAP AND JQUERY -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</body>
</html>