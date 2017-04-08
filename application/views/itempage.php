<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title><?=$item['item_name']?></title>
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
			<div class="row">
				<h2><?=$item['item_name']?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h4>Users who added this product/item to their wishlist:</h4>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<?php foreach($wishedby as $wished): ?>
						<h5><?=$wished['name']?></h5>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
        <?php $this->load->view('partials/scripts.php'); ?>
	</body>
</html>