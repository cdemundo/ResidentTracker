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
						         <li><a href="#" data-toggle="modal" data-target="#aboutModal">About</a></li>
					         	<li><a href="#" data-toggle="modal" data-target="#contactModal">Contact</a></li>
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
	                		<li><a href="<?php echo base_url()?>residents/loadResidentsView"><i class="glyphicon glyphicon-user"></i> Residents</a></li>
	                		<li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
	                	</ul>
	                		              
		              	<!-- tiny only nav-->
		            	<ul class="nav visible-xs" id="xs-menu">
		                	<li><a href="<?php echo base_url()?>main" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
	                		<li><a href="<?php echo base_url()?>residents/loadResidentsView" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
	                		<li><a href="<?php echo base_url()?>admin/loadAdminView" class="text-center"><i class="glyphicon glyphicon-file"></i></a></li>
		              	</ul>	              
	            	</div><!--col-sm-2-->
		            <!-- /sidebar -->
	          
	          		<div id="aboutModal" class="modal fade">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <h4 class="modal-title text-center">About</h4>
					            </div>
						            <div class="modal-body col-xs-10 col-xs-offset-1">
						            	<div class = "panel panel-default top-spacer">
											<div class="panel-body text-center">
								            	<div id="websiteAbout">
								                	<p class="text-left">
								                		This website was created by the Stryker Trauma & Extremities Medical Education team to facilitate engagement
								                		with residents across the country.  It provides a record of residents our education team and sales force have interacted with
								                		and notes on courses that residents have attended with Stryker.  
								                	</p>
								                	<p class="text-left">
								                		On this website you can: 
								                	</p>
								                	<ul class="text-left">
								                		<li> Look at individual pages for each residency program in the country.  These pages contain contact information, information about the
								                			 residency program, and a list of the residents currently at each program that Stryker has interacted with </li>
								                		<li> Look at each individual residents profile - see what courses they have attended and contact information available. </li>
								                	</ul>
								                </div>
								            </div>
								        </div>
						            </div>
						            <div class="modal-footer">
						                <button type="button" id = "modalOK" class="btn btn-primary" data-dismiss="modal">OK</button>
						            </div>
					        </div><!--modal content-->
					    </div><!--modal dialog-->
					</div><!--about modal-->

					<div id="contactModal" class="modal fade">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <h4 class="modal-title text-center">Contact Us</h4>
					            </div>
						            <div class="modal-body col-xs-10 col-xs-offset-1">
						            	<div class = "panel panel-default top-spacer">
											<div class="panel-body text-center">
								            	<div id="websiteAbout">
								                	<p class="text-left">
								                		Stryker Trauma & Extremities has a team of dedicated resident education experts.  By region they are:   
								                	</p>
								                	<ul class="text-left">
								                		<li> <b>East Coast:</b> Matt Murphy </li>
								                		<li> <b>Central:</b> Cindy Immel </li>
								                		<li> <b>Mid-South:</b> Brent Benham </li>
								                		<li> <b>West Coast:</b> Fred Habel </li>
								                	</ul>
								                </div>
								            </div>
								        </div>
						            </div>
						            <div class="modal-footer">
						                <button type="button" id = "modalOK" class="btn btn-primary" data-dismiss="modal">OK</button>
						            </div>
					        </div><!--modal content-->
					    </div><!--modal dialog-->
					</div><!--contact modal-->

		            <!-- main content -->
		            <div class="column col-sm-11 col-xs-11" id="main">
						<div class="inner-wrapper">
		                <div class="padding">
		                    <div class="full col-sm-10">
		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12 hidden-xs">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom"><?php echo $residencyProgram[0]->program_name ?></p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- FIXES BUG WHERE NAVBAR OVERLAPS ON SMALLER BROWSERS, USES BIG-TOP-SPACER CLASS -->
		                        	<div class = "col-sm-12 visible-xs">
		                        		<div class="panel panel-default big-top-spacer">
			                                <div class="panel-body">
			                                	<p class="lead no-bottom"><?php echo $residencyProgram[0]->program_name ?></p>
			                                </div>
		                              	</div>
		                        	</div>

		                        	<!-- LEFT COLUMN -->

		                        	<div class ="col-sm-6">

			                        	<!-- CONTACT INFO HERE -->
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Contact Information  </p>	
			                                <p class="top-spacer"> <b> Address: </b> <?php echo $residencyProgram[0]->address ?> </p>
			                                <p> <b> City + State: </b> <?php echo $residencyProgram[0]->city . "," . $residencyProgram[0]->state ?></p>
			                                <p> <b> Telephone: </b> <?php echo $residencyProgram[0]->telephone ?> </p>
			                                <p> <b> Fax: </b> <?php echo $residencyProgram[0]->fax ?> </p>
			                                <p> <b> Contact: </b> <?php echo $residencyProgram[0]->contact_name ?> </p>
			                                <p> <b> Contact Email: </b> <?php echo $residencyProgram[0]->contact_email ?> </p>
			                                </div>
		                              	</div>


			                        	<!-- DIRECTOR INFO GOES HERE -->
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Director and Faculty </p>
			                                <p class="top-spacer"> <b> Director: </b> <?php echo $residencyProgram[0]->director ?> </p>	
			                                <p> <b> Email: </b> <?php echo $residencyProgram[0]->director_email ?> </p>
			                                </div>
		                              	</div>

			                        	<!-- STRYKER CONTACT INFO -->
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
				                                <p class="lead"> Stryker Contacts  </p>	
				                                <p class="top-spacer"> <b> TSM: </b> <?php echo $residencyProgram[0]->tsm_name ?> </p>
				                                <p> <b> TSM Email: </b> <?php echo $residencyProgram[0]->tsm_email ?></p>
				                                <p> <b> Sales Rep: </b> <?php echo $residencyProgram[0]->rep_name ?> </p>
				                                <p> <b> Sales Rep Email: </b> <?php echo $residencyProgram[0]->rep_email ?> </p>
			                                </div>
		                              	</div>
			                       </div> <!--col-sm-6 left col-->

			                       <!-- RIGHT COLUMN --> 
			                       <div class="col-sm-6">
			                       		<!-- Alumni content -->
		                        		<div class="panel panel-default">
			                        		<div class="panel-body">
				                        		<p class="lead"> Current Residents </p>
				                        		<div id="listdiv">
					                        		<?php for ($i = 0; $i <= 4; $i++)
					                        		{ 
					                        			//date('Y') - $1 in the first iteration is the current 0.. current date - 0
					                        			//then it goes back, -1, -2, -3, -4 to get the last 5 years
					                        			echo '<h4> PGY ' . ($i + 1) . ' - Started in '  . (date('Y') - $i) . '</h4>';
					                        			echo '<ul>';
					                        			//if there are any residents in a given year
					                        			if(!empty($residents[date('Y') - $i]))
					                        			{
					                        				//print out each one of those residents, key is resident name, value is resident id
					                        				foreach($residents[date('Y') - $i] as $key => $value)
					                        				{
					                        					//url link is to the specific residents page, based on ID
					                        					//display is the residents name
					                          					echo '<p><a href="' . base_url() . 'residents/getResident/' . $value .'">' . $key . '</a></p>';
					                        				}
					                        			}
					                        			else
					                        			{
					                        				echo '<p> No residents found in this year </p>';
					                        			}
					                        			echo '</ul>';
					                        		}?>
				                        		</div><!--list div -->
			                        		</div><!-- panel body -->
		                        		</div><!-- panel -->
			                       </div><!--col-sm-6 right col -->
		                       </div><!--/row-->
		                    </div><!-- full col-sm-10 -->
		                </div><!--padding-->
		                </div><!-- inner wrapper -->
		                	<div class="row footer" id="footer">    
			                    	<hr>
		                            	<h4 class="text-center">
				                      		<p>This website courtesy of Stryker Medical Education</p>
				                        </h4>
	 	                        	<hr>
	                    	</div>
		            </div><!-- /main -->
		        </div><!--row row-offcanvas row-offcanvas-left-->
		    </div><!--box-->
		</div><!--wrapper-->

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


