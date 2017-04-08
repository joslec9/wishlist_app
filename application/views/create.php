<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Create Item</title>
    <?php $this->load->view('partials/head.php'); ?>
</head>
	<body>
		<div class="container">
			<div class="row" style='text-align:right'>
				<div class='section'>
					<a href='/dashboard'>Home</a>
					<a href='/logout' style='margin-left:4%'>Log out</a>
				</div>
			</div>
		</div>
		<div class="container">
			<h2>Create a new wish list item</h2>
		</div>
		<div class="container">
			<div class="row">
				<p><?=$this->session->flashdata('errors')?></p>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<form action="/add" method='post'>
						Item/Product <input type="text" name='item'>
						<input type="hidden" name='user_id' value=<?=$this->session->userdata('logged_user')['id']?>>
						<button type='submit' class="btn btn-info">Add</button>
					</form>
				</div>
			</div>
		</div>
        <?php $this->load->view('partials/scripts.php'); ?>
	</body>
</html>