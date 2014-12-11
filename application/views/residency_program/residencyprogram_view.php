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
			                                <p class="top-spacer"> Address: <?php echo $residencyProgram[0]->address ?> </p>
			                                <p> City + State: <?php echo $residencyProgram[0]->city . "," . $residencyProgram[0]->state ?></p>
			                                <p> Telephone: <?php echo $residencyProgram[0]->telephone ?> </p>
			                                <p> Fax: <?php echo $residencyProgram[0]->fax ?> </p>
			                                <p> Contact: <?php echo $residencyProgram[0]->contact_name ?> </p>
			                                <p> Contact Email: <?php echo $residencyProgram[0]->contact_email ?> </p>
			                                </div>
		                              	</div>


			                        	<!-- DIRECTOR INFO GOES HERE -->
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                <p class="lead"> Director and Faculty </p>
			                                <p class="top-spacer"> Director: <?php echo $residencyProgram[0]->director ?> </p>	
			                                <p> Email: <?php echo $residencyProgram[0]->director_email ?> </p>
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
					                          					echo '<p><a href="' . base_url() . 'residencyprogram/getResident/' . $value .'">' . $key . '</a></p>';
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


