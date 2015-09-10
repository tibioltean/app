<!DOCTYPE html>
<html>
<head>
	<title>RIS APP </title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/style.css">

	<script src="<?=base_url()?>public/js/jquery.js"></script>
	<script src="<?=base_url()?>public/js/bootstrap.js"></script>
	<script src="<?=base_url()?>public/js/ris/dashboard/result.js"></script>
	<script src="<?=base_url()?>public/js/ris/dashboard/event.js"></script>
	<script src="<?=base_url()?>public/js/ris/dashboard/template.js"></script>
	<script src="<?=base_url()?>public/js/ris/dashboard.js"></script>
	<script>
	$(function() {
		// Init the Dashboard Application
		var dashboard = new Dashboard();

	});
	</script>
</head>
<body>

<nav class="navbar">
	<div class="navbar-inner">
	<span class="brand">RIS</span>
		<ul class="nav">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">User</a></li>
			<li><a href="<?=site_url('dashboard/logout')?>">Logout</a></li>
		</ul>
	</div>
</nav>


<!-- start:wrapper -->
<div class="wrapper">
