<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/error.css" rel="stylesheet">
		<link href="/residentTracker/assets/css/main_view.css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
    	<div class="box">
			<!-- top nav -->
			<nav class="navbar navbar-blue navbar-fixed-top" role="navigation">
	    		<div class="container">
		        	<div class="navbar-header">
			        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
			        	</button>
			        	<a class="navbar-brand" href="http://stryker.com/en-us/products/Trauma/index.htm">Stryker Trauma & Extremities</a>
		        	</div> <!-- navbar header -->
			        <div id="navbar" class="navbar-collapse collapse">
				        <ul class="nav navbar-nav">
					         <li class="active"><a href="<?php echo base_url()?>main">Home</a></li>
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
				        <ul class="nav navbar-nav navbar-right">
				        	<li><a href="<?php echo base_url()?>main/logout/" class="btn btn-primary">Logout</a></li>
				        </ul>
			        </div><!--/.nav-collapse -->
	      		</div><!--container -->
	    	</nav>

        		<div class="row row-offcanvas row-offcanvas-left">
		            <!-- sidebar -->
		            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
		              	<ul class="nav">
		          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
		            	</ul>
		               
		                <ul class="nav hidden-xs" id="lg-menu">
		                    <li class="active"><a href="<?php echo base_url()?>main"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
                    		<li><a href=""><i class="glyphicon glyphicon-user"></i> Residents</a></li>
                    		<li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
		                </ul>
		                		              
		              	<!-- tiny only nav-->
		              <ul class="nav visible-xs" id="xs-menu">
		                  	<li><a href="" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    		<li><a href="" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
                    		<li><a href="" class="text-center"><i class="glyphicon glyphicon-file"></i></a></li>
		                </ul>
		              
		            </div>
		            <!-- /sidebar -->

		            <!-- confirmation modal -->
		            <!-- Modal -->
					<!-- Modal HTML -->
					<div id="confirmModal" class="modal fade">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <h4 class="modal-title">Are you sure?</h4>
					            </div>
					            <div class="modal-body col-xs-10 col-xs-offset-1">
					            	<div class = "panel panel-default top-spacer">
										<div class="panel-body text-center">
							            	<div id="ajaxModal">
							                	<p>Loading...</p>
							                </div>
							            </div>
							        </div>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-danger" data-dismiss="modal">Delete Resident</button>
					                <button type="button" class="btn btn-primary">Cancel</button>
					            </div>
					        </div>
					    </div>
					</div>
		          
		            <!-- main content -->
		            <div class="column col-sm-10 col-xs-11" id="main">
		            	<div class="inner-wrapper">
		                <div class="padding">
		                    <div class="full col-sm-9">
		                        <!-- content -->                      
		                      	<div class="row">
		                      		<div class="col-md-12">
							            <div class="error-template">
							                <h1>Oops!</h1>
							                <h2><?php echo $errorHeading ?></h2>
							                <div class="error-details">
							                    <?php 
							                    	if(!empty($errorMessage))
							                    	{
							                    		echo $errorMessage;
							                    	}
							                    	else
							                    	{
							                    		echo "Sorry, there was an error!  Please try again.";
							                    	}
							                    ?>
							                </div>
							                <div class="error-actions">
							                    <a href="http://www.jquery2dotnet.com" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
							                        Take Me Home </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
							                </div>
							            </div>
							        </div>
		                       </div><!--/row-->
		                    </div><!-- /col-9 -->
		                </div><!-- inner-wrapper -->
		                <div class="row footer" id="footer">    
		                    <hr>
                            	<h4 class="text-center">
		                      		<p>This website courtesy of Stryker Medical Education</p>
		                        </h4>
 	                        <hr>
                        </div>
		                      
		                      
		                </div><!-- /padding -->

		            </div>
		            <!-- /main -->
		          
		        </div><!-- box -->
		    </div>
		</div>

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


