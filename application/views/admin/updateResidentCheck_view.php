<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/errorstyle.css" rel="stylesheet">
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
				        	<li><a href="<?php echo base_url()?>login/logout/" class="btn btn-primary">Logout</a></li>
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
		                    <li class="active"><a href="<?php echo base_url()?>login"><i class="glyphicon glyphicon-map-marker"></i> Residency Programs</a></li>
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
		          
		            <!-- main content -->
		            <div class="column col-sm-10 col-xs-11" id="main">
		            	<div class="inner-wrapper">
		                <div class="padding">
		                    <div class="full col-sm-9">

		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12">
		                        		<div class="col-sm-8 col-sm-offset-2">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                	<h4 class="text-center"> Update Resident </h4>	
			                                </div>
			                            </div><!--panel panel-default-->
			                            </div><!-- col-sm-5 col-sm-offset-4-->
			                                <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
			                                	<div class = "panel panel-default">
													<div class="panel-body text-center">
														<div class = "col-sm-4 col-sm-offset-4 text-center">
															<form id="addResidentForm" action="<?php echo base_url()?>admin/addResident" method="post">
																<h4 class="bottom-spacer"> Add A Resident </h4>
															    <div class="form-group">
															        <label for="resName">First Name</label>
															        <input type="text" class="form-control" name="firstName" placeholder="First Name" value = "<?php echo $residentToUpdate->firstName ?>">
															    </div>
															    <div class="form-group">
															        <label for="resName">Last Name</label>
															        <input type="text" class="form-control" name="lastName" placeholder="Last Name" value = "<?php echo $residentToUpdate->lastName ?>">
															    </div>
															    <div class="form-group">
															        <label for="resEmail">Email</label>
															        <input type="text" class="form-control" name="resEmail" placeholder="Email" value = "<?php echo $residentToUpdate->email ?>">
															    </div>
															    <div class="form-group">
															        <label for="startYear">Post-Graduate Year</label>
															        <select class="form-control text-center" name="startYear" value = "<?php echo $residentToUpdate->pgy ?>">
															        	<?php 
															        		for ($i = 1; $i<6; $i++)
															        		{
															        			if($i == $residentToUpdate->pgy)
															        			{
															        				echo '<option selected="selected" value ="' . $i . '">' . $i . '</option>';
															        			}
															        			else
															        			{
															        				echo '<option value ="' . $i . '">' . $i . '</option>';
															        			}
															        		}
															        	?>
															        </select>
															    </div>
															    <div class="form-group">
															        <label for="resPhone">Phone</label>
															        <input type="text" class="form-control" name="resPhone" placeholder="Phone" value = "<?php echo $residentToUpdate->telephone ?>">
															    </div>
															    <div class="form-group" id="programSelect" name="program">
															       	<!-- ajax goes here -->
															    </div>

															    <button type="submit" class="btn btn-primary" id="addResBtn">Update Resident</button>
															</form>
														</div>
													</div>
												</div>
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
		$(document).ready(function(){
	
			var base_url = '<?php echo site_url();?>'; 

			$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/getAllPrograms',
			  dataType: "html",
			  success: function(data) {
					$('#programSelect').html(data);
					//$('#selectRes').val("<?php echo $residentToUpdate->program_name?>"); 
					}
				})
		});
	</script>
	</body>
</html>


