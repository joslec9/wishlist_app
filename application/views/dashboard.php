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
			<div class="row" style='text-align:right'>
				<div class='section'>
					<a href='/logout'>Log out</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h3>Hello, <?=$this->session->userdata('logged_user')['name']?>!</h3>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h5>Your Wish list</h5>
				<table class='striped'>
					<thead>
						<th>Item</th>
						<th>Added by</th>	
						<th>Date added</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($wishlist as $wishes): ?>
						<tr>
							<td><a href=<?php echo "/wish_items/{$wishes['item_id']}"?>><?=$wishes['item_name']?></a></td>
							<td><?=$wishes['name']?></td>
							<td><?php $date = date_create($wishes['created_at']);
							echo date_format($date, 'F j Y');?></td>
							<?php if($wishes['added_by'] == $this->session->userdata('logged_user')['id']):?>
								<td><a href=<?php echo "/delete/{$wishes['item_id']}"?>>Delete</a></td>
							<?php else: ?>
								<td><a href=<?php echo "/remove/{$wishes['item_id']}"?>>Remove from my wishlist</a></td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h5>Other Users' Wish list</h5>
				<table class='striped'>
					<thead>
						<th>Item</th>
						<th>Added by</th>	
						<th>Date added</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($otherswishes as $otherwish): ?>
						<tr>
							<td><a href=<?php echo "/wish_items/{$otherwish['id']}"?>><?=$otherwish['item_name']?></a></td>
							<td><?=$otherwish['name']?></td>
							<td><?php $date = date_create($otherwish['created_at']);
							echo date_format($date, 'F j Y');?></td>
							<td><a href=<?php echo "/addtowishlist/{$otherwish['id']}"?>>Add to my wishlist</a></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row" style='text-align:right'>
				<div class="section">
					<a href='/wish_items/create'>Add a new item</a>
				</div>
			</div>
		</div>
        <?php $this->load->view('partials/scripts.php'); ?>
	</body>
</html>