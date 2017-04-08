<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Product Listings</title>
    <?php $this->load->view('partials/head.php'); ?>
</head>
	<body>
		<div class="container">
			<nav>
				<div class="navbar">
					<div class="row">
						<div class='col s1' style='text-align:center'>
							<a href='#' class='brand-logo'>Products</a>
						</div>
						<div class='col s12' style='text-align:center'>
							<ul id='nav-mogile' class='right hide-on-med-and-down'>
								<li><a href='#'>Your Cart (0)</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
        <?php $this->load->view('partials/scripts.php'); ?>
	</body>
</html>