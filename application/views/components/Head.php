<!DOCTYPE html>
<html>
<head>
	<title>Apotek - Toko Obat Paling Lengkap</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/styles.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-custom">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?= base_url() ?>">
	      	<img src="<?= base_url() ?>assets/images/brand/logo_2.PNG" style="max-width:100px; margin-top: -10px;"">
	      </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <form method="POST" action="<?= base_url() ?>v/search" class="navbar-form navbar-left">
	      	<div class="input-group">
				<input type="search" name="q" placeholder="Cari obat yang kamu inginkan" class="form-control input-grey" style="width: 400px;">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">
				</span></button>
				</span>
			</div>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php
  			if($this->session->userdata('status') != 'pembeli'){
			?>
	        <li><a href="<?= base_url() ?>v/login">Login</a></li>
	        <li><a href="<?= base_url() ?>v/register">Register</a></li>
	        <?php
	    	} else {
	        ?>
	        <li class="cart"><a href="<?= base_url() ?>v/keranjang"><span class="glyphicon glyphicon-shopping-cart"></span> <?= count($this->cart->contents()) ?></a></li>
	        <li><a href="<?= base_url() ?>v/logout">Logout</a></li>
	        <?php
		    }
		    ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>