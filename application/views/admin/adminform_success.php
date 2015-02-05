<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/errorstyle.css" rel="stylesheet">
		<link href="/residentTracker/assets/css/main_styles.css" rel="stylesheet">
	</head>
<body>
	<div class="wrapper">
    	<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">
                      
	            <!-- sidebar -->
	            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
	              
	              	<ul class="nav">
	          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
	            	</ul>
	               
	               <ul class="nav hidden-xs" id="lg-menu">
                      <li class="active"><a href="<?php echo base_url()?>login"><i class="fa fa-hospital-o"></i> Residency Programs</a></li>
                      <li><a href="<?php echo base_url()?>fellowshipprogram/loadFellowshipView"><i class="fa fa-user-md"></i> Fellowship Programs</a></li>
                    <li><a href="<?php echo base_url()?>residents/loadSearchView"><i class="fa fa-search"></i> Search</a></li>
                    <li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
                  </ul>
                                    
                  <!-- tiny only nav-->
                <ul class="nav visible-xs" id="xs-menu">
                    <li><a href="<?php echo base_url()?>login" class="text-center"><i class="fa fa-hospital-o"></i></a></li>
                    <li><a href="<?php echo base_url()?>fellowshipprogram/loadFellowshipView" class="text-center"><i class="fa fa-user-md"></i></a></li>
                    <li><a href="<?php echo base_url()?>residents/loadSearchView" class="text-center"><i class="fa fa-search"></i></a></li>
                    <li><a href="<?php echo base_url()?>admin/loadAdminView" class="text-center"><i class="glyphicon glyphicon-file"></i></a></li>
                </ul>
	              
	            </div>
	            <!-- /sidebar -->
	          
	            <!-- main right col -->
	            <div class="column col-sm-10 col-xs-11" id="main">
	                
	                <!-- top nav -->
	              	<div class="navbar navbar-blue navbar-static-top">  
	                    <div class="navbar-header">
	                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="sr-only">Toggle</span>
	                        <span class="icon-bar"></span>
	          				<span class="icon-bar"></span>
	          				<span class="icon-bar"></span>
	                      </button>
	                      <a href="<?php echo base_url()?>login" class="navbar-brand logo"><img src="<?php echo base_url()?>assets/images/stryker_web_logo.png" /></a>
	                  	</div>
	                  	<nav class="collapse navbar-collapse" role="navigation">
	                    <ul class="nav navbar-nav">
	                       <li class="active"><a href="<?php echo base_url()?>login">Home</a></li>
	                       <li><a href="#" data-toggle="modal" data-target="#aboutModal">About</a></li>
	                       <li><a href="#" data-toggle="modal" data-target="#contactModal">Contact</a></li>
	                    </ul>
	                    <ul class="nav navbar-nav navbar-right">
	                    <li><a href="<?php echo base_url()?>login/logout/" class="btn-sm btn-primary right-spacer">Logout</a></li>
	                    </ul>
	                  	</nav>
	                </div>
	                <!-- /top nav -->
		          
	            	<!-- main content -->
	                <div class="padding">
	                    <div class="full col-sm-9">

	                        <!-- content -->                      
	                      	<div class="row">
	                      		<!-- Header in top of content section -->
	                        	<div class = "col-sm-12">
	                        		<div class="col-sm-8 col-sm-offset-2">
	                        		<div class="panel panel-default">
		                                <div class="panel-body">
		                                	<?php 
		                                		if(!empty($successHeading))
		                                		{
			                                		echo '<p class="success-header text-center">' . $successHeading . '</p>'; 
			                                	}
			                                	else
		                                		{
		                                			if(!empty($errorHeading))
		                                			{
			                                			echo '<p class="error-header text-center">' . $errorHeading . '</p>'; 
			                                		}
			                                	}
		                                	?>
		                                </div>
		                            </div><!--panel panel-default-->
		                            </div><!-- col-sm-5 col-sm-offset-4-->
		                                <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
		                                	<div class = "panel panel-default">
												<div class="panel-body text-center">
													<div class = "col-sm-8 col-sm-offset-2">
														<?php 
						                                	if(!empty($successMessage))
						                                	{
						                                		echo '<p class="success text-center">' . $successMessage . '</p>'; 
						                                	}
						                                	else
						                                	{
						                                		if(!empty($errorMessage))
						                                		{
						                                			echo '<p class="error text-center">' . $errorMessage . '</p>';
						                                		}
						                                	}
					                                	?>	
					                                	<a href="<?php echo base_url()?>admin/loadAdminView" class="btn btn-primary btn-lg top-spacer">Back to Admin Tools </a>	
				                                	</div>
												</div>
											</div>
		                            </div><!--formGoesHere -->
	                            </div><!-- /col-sm-12 -->
	                      	</div><!-- /row -->
	                    </div><!--/full col-sm-9-->
	                </div><!-- /padding -->
	            </div><!-- column col-sm-10 col-xs-11 -->
            </div><!-- /row row-offcanvas row-offcanvas-left -->
	    </div><!-- /box -->  
	</div><!--/wrapper-->

	<!--CORE JS BOOTSTRAP AND JQUERY -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  	<!--JS FOR SELECT PICKER -->
  	<script src="<?=base_url()?>assets/js/bootstrap-select/bootstrap-select.min.js"></script>


  	<!-- SCRIPT FOR OFF CANVAS LEFT SIDEBAR -->
	<script>
		$('[data-toggle=offcanvas]').click(function() {
		  	$(this).toggleClass('visible-xs text-center');
		    $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
		    $('.row-offcanvas').toggleClass('active');
		    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
		    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
		    $('#btnShow').toggle();
		});
	</script>
	</body>
</html>


