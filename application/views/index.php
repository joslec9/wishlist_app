<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->session->sess_destroy();
$this->load->library('form_validation');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <?php $this->load->view('partials/head.php'); ?>
</head>
	<body>
		<div class="container">
			<h2>Welcome!</h2>
		</div>
		<div class='container'>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<?=$this->session->flashdata('errors')?>
					<form action='/register' method='post'>
						<h4>Register</h4>
						Name: <input type='text' name='name'>
						Username: <input type="text" name='username'>
						Password: <input type="password" name='password'>
						Confirm Password: <input type="password" name='confirm_password'>
						Date Hired: <input type="date" name='date_hired'max="2017-04-09" class="datepicker">
						<button type='submit' class="btn btn-info">Register</button>
					</form>
				</div>
				<div class='col-md-6 col-sm-12 col-xs-12'>
					<?=$this->session->flashdata('login_errors')?>
					<form action="/login" method='post'>
						<h3>Login</h3>
                        <p><?= form_error('username'); ?></p>
						Username: <input type="text" name='username'>
                        <p><?= form_error('password'); ?></p>
						Password: <input type="password" name='password'>
						<button type='submit' class="btn btn-info">Login</button>
					</form>
				</div>
			</div>
		</div>
        <?php $this->load->view('partials/scripts.php'); ?>
	</body>
</html>