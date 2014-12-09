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
		                    <li class="active"><a href="<?php echo base_url()?>main"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
                    		<li><a href=""><i class="glyphicon glyphicon-user"></i> Residents</a></li>
                    		<li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin Controls </a></li>
		                </ul>
		                		              
		              	<!-- tiny only nav-->
		              <ul class="nav visible-xs" id="xs-menu">
		                  	<li><a href="" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    		<li><a href="" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
                    		<li><a href="<?php echo base_url()?>admin/loadAdminView" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
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
		                        	<div class = "col-sm-12 hidden-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom">Residency Locator</p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- FIXES BUG WHERE NAVBAR OVERLAPS ON SMALLER BROWSERS, USES BIG-TOP-SPACER CLASS -->
		                        	<div class = "col-sm-12 visible-xs">
		                        		<div class="panel panel-default big-top-spacer">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom">Residency Locator</p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- US MAP DIV -->
		                        	<!-- MAP FOR SCREENS BIGGER THAN XS -->
		                        	<div class = "col-sm-12 hidden-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body text-center" id = "map" style="width: 768px; height: 500px;">
			                                	<!-- map goes here -->
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!--VISIBLE ON PHONES -->
		                        	<div class = "col-sm-12 visible-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body" id = "map">
			                                	<select class="form-control" id = "stateDropdown">
													<option value="AL">Alabama</option>
													<option value="AK">Alaska</option>
													<option value="AZ">Arizona</option>
													<option value="AR">Arkansas</option>
													<option value="CA">California</option>
													<option value="CO">Colorado</option>
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="DC">District Of Columbia</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="HI">Hawaii</option>
													<option value="ID">Idaho</option>
													<option value="IL">Illinois</option>
													<option value="IN">Indiana</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NV">Nevada</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NM">New Mexico</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="ND">North Dakota</option>
													<option value="OH">Ohio</option>
													<option value="OK">Oklahoma</option>
													<option value="OR">Oregon</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="SD">South Dakota</option>
													<option value="TN">Tennessee</option>
													<option value="TX">Texas</option>
													<option value="UT">Utah</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WA">Washington</option>
													<option value="WV">West Virginia</option>
													<option value="WI">Wisconsin</option>
													<option value="WY">Wyoming</option>
												</select>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- Residency Program content -->
		                        	<div class = "col-sm-12 col-sm-offset-5">
		                        		<p class="lead"> Residency Programs</p>
		                        	</div>
		                        	

		                        	<!-- RESIDENCY PROGRAM INFO GOES HERE -->
		                        	<div class = "col-sm-12 equalheight">
		                        		<div id = "residencyinfo">
		                        			<?php
		                        			if(isset($residencyProgram))
											{
												foreach($residencyProgram as $program):?>
												<!-- Uses col-sm so that on mobile devices, these should stack so the user can scroll down.  on bigger screens - display 3xn table -->
												
												<div class="col-sm-4">
													<div class = "panel panel-default demo">
														<div class="panel-body">
															<a href='<?php echo site_url();?>residencyprogram/getProgram/<?php echo $program->program_name ?>' class="lead bottom-spacer"> <?php echo $program->program_name ?> </a>
															<p class="top-spacer"> State: <?php echo $program->state ?> </p>
															<?php 
															//this can probably be removed in final version, but don't have directors for each program yet
															if(!isset($program->director)){?>
															<p> Director: <?php echo $program->director ?> </p>
															<?php } ?>
														</div>
													</div>
												</div>

												<?php endforeach; } ?>
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
						getPrograms(data.name);
					}
    		});
  		});
	</script>

	<!-- SCRIPT FOR STATE DROPDOWN LIST.. SHOWS UP ON PHONES INSTEAD OF MAP -->
	<script>
		$(document).ready(function() {
			$('#stateDropdown').on('change', function() {
				var state = $("#stateDropdown").val(); 
				getPrograms(state); 
			});
		});
	</script>
	
	<!-- Jquery function, ajax to get residency program info - takes state abbreviation as input 
		 ajax request to residencyprogram/getStateInfo                                      	-->
	<script>
		function getPrograms(state) {
			var base_url = '<?php echo site_url();?>'; 

			$.ajax({
			  type: "POST",
			  url: base_url + 'residencyprogram' + '/getStateInfo',
			  dataType: "html",
			  data: { 'state' : state },
			  success: function(data) {
					$('#residencyinfo').html(data);
					}
				})
		}
	</script>	
	</body>
</html>


