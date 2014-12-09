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
				    </div><!--container-->
		    	</nav>
		        <!-- sidebar -->
	    		<div class="row row-offcanvas row-offcanvas-left">
		            <div class="column col-sm-1 col-xs-1 sidebar-offcanvas" id="sidebar">
		              	<ul class="nav">
		          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
		            	</ul>
		               
		                <ul class="nav hidden-xs" id="lg-menu">
		                    <li class="active"><a href="<?php echo base_url()?>main"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
	                		<li><a href="#stories"><i class="glyphicon glyphicon-user"></i> Residents</a></li>
	                		<li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
		                </ul>
		                		              
		              	<!-- tiny only nav-->
		            	<ul class="nav visible-xs" id="xs-menu">
		                	<li><a href="<?php echo base_url()?>main" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
	                		<li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
	                		<li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-file"></i></a></li>
		              	</ul>	              
		            </div><!--col-sm-2-->
		            <!-- /sidebar -->
		          
		            <!-- main content -->
		            <div class="column col-sm-11 col-xs-11" id="main">
		                <div class="padding">
		                    <div class="full col-sm-10">
		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12 hidden-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom">
			                                		<?php echo $resident->firstName . " " . $resident->lastName . " - PGY" . $resident->pgy;?>
			                                		<!-- This is a link to the Program page for the residents Residency program -->
			                                		<span class="pull-right"><a href='<?php echo base_url() . "residencyProgram/getProgram/" . $resident->program_name?>'><?php echo $resident->programName ?></a></span>
			                                	</p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- FIXES BUG WHERE NAVBAR OVERLAPS ON SMALLER BROWSERS, USES BIG-TOP-SPACER CLASS -->
		                        	<div class = "col-sm-12 visible-xs">
		                        		<div class="panel panel-default big-top-spacer">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom"><?php echo $resident->firstName . " " . $resident->lastName . " - PGY" . $resident->pgy; ?>
			                                		<span class="pull-right"><a href='<?php echo base_url() . "residencyProgram/getProgram/" . $resident->program_name?>'><?php echo $resident->programName ?></a></span>
			                                	</p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- LEFT COLUMN -->

		                        	<div class ="col-sm-6">

			                        	<!-- CONTACT INFO HERE -->
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Contact Information  </p>	
			                                <p class="top-spacer"> Email: <?php echo $resident->email ?> </p>
			                                <p> Telephone: <?php echo $resident->telephone ?> </p>
			                                </div>
		                              	</div>

			                        	<!-- SOEMTHING GOES HERE -->
		                        		<div class="panel panel-default">
			                        		<div class="panel-body">
			                        			<p class="lead"> Notes: </p>
			                        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt commodo urna ac bibendum. Mauris a interdum leo. Proin ultricies ut felis non interdum. Nulla consectetur placerat rhoncus. Maecenas sed ultrices velit. Vivamus augue sapien, scelerisque eu turpis ac, eleifend semper orci. In malesuada, mauris quis porta viverra, ex mi pulvinar urna, a rutrum ante dui quis leo. </p> 
			                              	</div>
		                              	</div>
			                       </div> <!--col-sm-6 left col-->

			                       <!-- RIGHT COLUMN --> 
			                       <div class="col-sm-6">
			                       		<!-- Courses Attended -->
		                        		<div class="panel panel-default">
			                        		<div class="panel-body">
				                        		<p class="lead"> Courses Attended</p>
				                        		<div id="listdiv">
					                        		<?php 
					                        			//resident may not have gone to any courses or had any recorded
					                        			if(!empty($coursesAttended))
					                        			{
					                        				//key is name, value is date
						                        			foreach($coursesAttended as $key => $value)
						                        			{
						                        				echo "<p><b>" . $value . "</b>: " . $key . "</p>"; 
						                        			}
					                        			}
					                        			else
					                        			{
					                        				echo "<p> No courses recorded. </p>";  
					                        			} 
					                        		?>
				                        		</div><!--list div -->
			                        		</div><!-- panel body -->
		                        		</div><!-- panel -->
			                       </div><!--col-sm-6 right col -->
		                       </div><!--/row-->
		                      
		                        <div class="row footer" id="footer">    
			                    	<hr>
		                            	<h4 class="text-center">
				                      		<p>This website courtesy of Stryker Medical Education</p>
				                        </h4>
	 	                        	<hr>
                        		</div>
		                    </div><!-- full col-sm-10 -->
		                </div><!-- /padding -->
		            </div><!-- /main -->
		        </div><!--row row-offcanvas row-offcanvas-left-->
		    </div><!--box-->
		</div><!--wrapper-->


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


