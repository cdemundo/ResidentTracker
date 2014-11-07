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
		<nav class="navbar navbar-blue navbar-fixed-top" role="navigation">
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
	            <li><a href="<?php echo base_url()?>main/logout/">Logout</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

		<div class="wrapper">
    		<div class="box">

        		<div class="row row-offcanvas row-offcanvas-left">

		            <!-- sidebar -->
		            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
		              
		              	<ul class="nav">
		          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
		            	</ul>
		               
		                <ul class="nav hidden-xs" id="lg-menu">
		                    <li class="active"><a href="#featured"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
                    		<li><a href="#stories"><i class="glyphicon glyphicon-user"></i> Residents</a></li>
		                </ul>
		                		              
		              	<!-- tiny only nav-->
		              <ul class="nav visible-xs" id="xs-menu">
		                  	<li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    		<li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
		                </ul>
		              
		            </div>
		            <!-- /sidebar -->
		          
		            <!-- main content -->
		            <div class="column col-sm-10 col-xs-11" id="main">
	
		                <div class="padding">
		                    <div class="full col-sm-9">
		                      
		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom"><?php echo $residencyProgram[0]->program_name ?></p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- CONTACT INFO HERE -->
		                        	<div class = "col-sm-6">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Contact Information  </p>	
			                                <p class="top-spacer"> Address: <?php echo $residencyProgram[0]->address ?> </p>
			                                <p> City + State: <?php echo $residencyProgram[0]->city . "," . $residencyProgram[0]->state ?></p>
			                                <p> Telephone: <?php echo $residencyProgram[0]->telephone ?> </p>
			                                <p> Fax: <?php echo $residencyProgram[0]->fax ?> </p>
			                                <p> Contact: <?php echo $residencyProgram[0]->contact_name ?> </p>
			                                <p> Contact Email: <?php echo $residencyProgram[0]->contact_email ?> </p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- DIRECTOR INFO GOES HERE -->
		                        	<div class = "col-sm-6">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Director and Faculty </p>
			                                <p class="top-spacer"> Director: <?php echo $residencyProgram[0]->director ?> </p>	
			                                <p> Email: <?php echo $residencyProgram[0]->director_email ?> </p>
			                                </div>
		                              	</div>
		                        	</div>


		                        	<!-- Alumni content -->
		                        	<div class = "col-sm-6">
		                        		<div class="panel panel-default">
		                        		<div class="panel-body">
			                        		<p class="lead"> Program Alumni</p>
			                        		<p class="top-spacer"> 2014 </p>
			                        		<p> 2013 </p>
			                        		<p> 2012 </p>
		                        		</div>
		                        		</div>
		                        	</div>
		                        	

		                        	<!-- SOEMTHING GOES HERE -->
		                        	<div class = "col-sm-6">
		                        		<div class="panel panel-default">
			                        		<div class="panel-body">
			                        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt commodo urna ac bibendum. Mauris a interdum leo. Proin ultricies ut felis non interdum. Nulla consectetur placerat rhoncus. Maecenas sed ultrices velit. Vivamus augue sapien, scelerisque eu turpis ac, eleifend semper orci. In malesuada, mauris quis porta viverra, ex mi pulvinar urna, a rutrum ante dui quis leo. </p> 
			                              	</div>
		                              	</div>
		                        	</div>
		                        
		                          
		                       </div><!--/row-->
		                      
		                        <div class="row">
		                          <div class="col-sm-6">
		                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
		                          </div>
		                        </div>
		                      
		                        <div class="row" id="footer">    
		                          <div class="col-sm-6">
		                            
		                          </div>
		                          <div class="col-sm-6">
		                            <p>
		                            <a href="#" class="pull-right">©Copyright 2014</a>
		                            </p>
		                          </div>
		                        </div>
		                      
		                      <hr>
		                      
		                      <h4 class="text-center">
		                      <p>This website courtesy of Stryker Medical Education</p>
		                      </h4>
		                        
		                      <hr>
		                    </div><!-- /col-9 -->
		                </div><!-- /padding -->
		            </div>
		            <!-- /main -->
		          
		        </div>
		    </div>
		</div>


	<!--post modal-->
	<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				Update Status
	      </div>
	      <div class="modal-body">
	          <form class="form center-block">
	            <div class="form-group">
	              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
	            </div>
	          </form>
	      </div>
	      <div class="modal-footer">
	          <div>
	          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
	            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
			  </div>	
	      </div>
	  </div>
	  </div>
	</div>

	<!--CORE JS BOOTSTRAP AND JQUERY -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


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


