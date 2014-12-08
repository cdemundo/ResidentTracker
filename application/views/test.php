<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/main_view.css" rel="stylesheet">
	</head>
	<body>
		<!-- top nav -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        </button>
		        <a class="navbar-brand" href="#">Stryker Trauma and Extremities</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
		        <ul class="nav navbar-nav">
			         <li class="active"><a href="#">Home</a></li>
			         <li><a href="#about">About</a></li>
			         <li><a href="#contact">Contact</a></li>
			         <li class="dropdown">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
			            <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Action</a></li>
				            <li><a href="#">Another action</a></li>
				            <li><a href="#">Something else here</a></li>
				            <li class="divider"></li>
				            <li class="dropdown-header">Nav header</li>
				            <li><a href="#">Separated link</a></li>
				            <li><a href="#">One more separated link</a></li>
			            </ul>
		          	</li>
		        </ul>
		        <ul class="nav navbar-nav navbar-right"
		        	<li><a href="<?php echo base_url()?>main/logout/" class="btn btn-primary top-spacer">Logout</a></li>
		        </ul>
	        </div><!--/.nav-collapse -->
	      </div><!--container -->
	    </nav>