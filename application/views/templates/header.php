<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">
		<link rel="shortcut icon" href="<?php echo base_url("assets/img/user.ico"); ?>">
		<title>Portal de Autentificación</title>

		
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-latest.js"); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url("assets/js/perfil.js"); ?>"></script>
	</head>

    <body>
	    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?php echo site_url('/') ?>">Autentificación</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="<?php echo site_url('/') ?>"><span class="glyphicon glyphicon-off"></span> Login</a></li>
	            <li><a href="<?php echo site_url('auth/register')?>"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
	            <li><a href="<?php echo site_url('auth/about') ?>"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
