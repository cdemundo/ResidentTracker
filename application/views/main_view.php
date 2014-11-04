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
	          <ul class="nav navbar-nav navbar-right">
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
		          
		            <!-- main right col -->
		            <div class="column col-sm-10 col-xs-11" id="main">
		                	                
		              
		                <div class="padding">
		                    <div class="full col-sm-9">
		                      
		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom">Residency Locator</p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- US MAP DIV -->
		                        	<!-- HIDE MAP ON PHONES -->
		                        	<div class = "col-sm-12 hidden-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body" id = "map" width="768">

			                                </div>
		                              	</div>
		                        	</div>

		                        	<!--VISIBLE ON PHONES -->
		                        	<div class = "col-sm-12 visible-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body" id = "map" width="768">
			                                	<p> Interactive map is not available on small screen sizes.  Please scroll through all programs. </p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- RESIDENCY PROGRAM INFO GOES HERE -->
		                        	<div class = "col-sm-12">
		                        		<div id = "residencyinfo">
		                        			<!-- ajax goes here -->
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

	<!-- JS INCLUDES FOR US MAP -->
	<script src="<?=base_url()?>assets/js/us-map-1.0.1/lib/raphael.js"></script>
  	<script src="<?=base_url()?>assets/js/us-map-1.0.1/jquery.usmap.js"></script>


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

	<!-- SCRIPT FOR US MAP -->
	<!-- When user clicks a state, ajax request to residencyprogram/getStateInfo
		 Queries db for all residency programs in that state and then fills the residencyinfo div with that -->
	<script>
		$(document).ready(function() {
    		$('#map').usmap({
    			showLabels: true,
    				click: function(event, data) {
    				var base_url = '<?php echo site_url();?>'; 
					$.ajax({
					  type: "POST",
					  url: base_url + 'residencyprogram' + '/getStateInfo',
					  dataType: "html",
					  data: { 'state' : data.name },
					  success: function(data) {
							$('#residencyinfo').html(data);
							}
						})
					}
    		});
  		});
	</script>
		

	</body>
</html>


