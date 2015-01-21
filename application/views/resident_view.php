<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link rel="stylesheet" href="/residentTracker/assets/css/validate/bootstrapValidator.min.css"/>
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
						        <li class="active"><a href="<?php echo base_url()?>login">Home</a></li>
						        <li><a href="#" data-toggle="modal" data-target="#aboutModal">About</a></li>
					         	<li><a href="#" data-toggle="modal" data-target="#contactModal">Contact</a></li>
					        </ul>
					        <ul class="nav navbar-nav navbar-right">
					        	<li><a href="<?php echo base_url()?>login/logout/" class="btn btn-primary">Logout</a></li>
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
		                    <li class="active"><a href="<?php echo base_url()?>login"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
	                		<li><a href="<?php echo base_url()?>residents/loadResidentsView"><i class="glyphicon glyphicon-user"></i> Residents</a></li>
	                		<li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
		                </ul>
		                		              
		              	<!-- tiny only nav-->
		            	<ul class="nav visible-xs" id="xs-menu">
		                	<li><a href="<?php echo base_url()?>login" class="text-center"><i class="glyphicon glyphicon-map-marker"></i></a></li>
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

					<div id="notesModal" class="modal fade">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <h4 class="modal-title text-center">Add a Note</h4>
					            </div>
						            <div class="modal-body col-xs-10 col-xs-offset-1">
						            	<div class = "panel panel-default top-spacer">
											<div class="panel-body text-center">
												<form id="addNoteForm" action = '<?php echo base_url() . "residents/addNote/" . $resident->getID()?>' method="post">
								            	<div id="noteBox">
								            		<p> (Max char limit of 1000) </p>
								                	<textarea type="text" cols="40" rows="4" maxlength="1000" name="newNote" autofocus
								                		data-bv-notempty="true"
                               							data-bv-notempty-message="This field cannot be empty"></textarea>
								                </div>
								            </div>
								        </div>
						            </div>
						            <div class="modal-footer">
						                <button type="button" id = "addNoteBtn" class="btn btn-primary" data-dismiss="modal">OK</button>
						                <button type="button" id = "cancelNoteBtn" class="btn btn-primary" data-dismiss="modal">Cancel</button>
						            </div>
						            </form>
					        </div><!--modal content-->
					    </div><!--modal dialog-->
					</div><!--notes modal-->

		            <!-- main content -->
		            <div class="column col-sm-11 col-xs-11" id="main">
		            	<div class = "inner-wrapper">
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
				                                <p class="top-spacer"> <b> Email: </b> <?php echo $resident->email ?> </p>
				                                <p> <b> Telephone: </b> <?php echo $resident->telephone ?> </p>
				                                </div>
			                              	</div>

				                        	<!-- NOTES GOES HERE -->
			                        		<div class="panel panel-default">
				                        		<div class="panel-body">
				                        			<p class="lead"> Notes: <span class="pull-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#notesModal">Add a Note</a></span></p>
				                        			<?php
				                        				foreach($resident->notes as $key => $value)
				                        				{
				                        					echo '<p><b>' . $value . "</b>:<br/>  " .  $key . '</p>'; 
				                        				}
				                        			?> 
				                              	</div>
			                              	</div>
				                       </div> <!--col-sm-6 left col-->

				                       <!-- RIGHT COLUMN --> 
				                       <div class="col-sm-6">
				                       		<!-- Courses Attended -->
			                        		<div class="panel panel-default">
				                        		<div class="panel-body">
				                        			<?php 
						                        		echo '<p class="lead"> Courses Attended';
						                        		if($admin)
						                        		{
						                        			echo '<span class="pull-right"><a href="' . site_url() . 'residents/loadAddResidentCourseView/' . $resident->getID() . '" class="btn btn-primary">Add a Course</a></span>';
						                        		}
						                        		echo '</p>'; 
					                        		?>
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
			                    </div><!-- full col-sm-10 -->
			                </div><!-- /padding -->
		                </div><!-- inner wrapper-->
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

	<!-- BOOTSTRAP VALIDATOR -->
	<script type="text/javascript" src="/residentTracker/assets/js/validate//bootstrapValidator.min.js"></script>


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

	<script> 
		$(document).on("click","#findCourseBtn",function(){
			console.log("test"); 
			var base_url = '<?php echo site_url();?>residents/findCourse/'; 
			
			$.ajax({
			  type: "POST",
			  url: base_url + 'residents' + '/findCourse/' + $('#courseName').val(),
			  dataType: "html",
			  data: {residentID : <?php echo $resident->getID() ?>}, 
			  success: function(data) {
					$('#courseBox').html(data);
					}
				})
		})
	</script>

	<!-- handle the modal form submissions -->
	<script>
		$('#addNoteBtn').click(function() {
			$('#addNoteForm').submit();
		});
	</script>
	</body>
</html>