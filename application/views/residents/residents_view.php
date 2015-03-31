<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link rel="stylesheet" href="/residentTracker/assets/css/validate/bootstrapValidator.min.css"/>
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
                    <li><a href="<?php echo base_url()?>stats"><i class="fa fa-bar-chart"></i> Stats</a></li>
                    <li><a href="<?php echo base_url()?>admin/loadAdminView"><i class="glyphicon glyphicon-file"></i> Admin</a></li>
                  </ul>
                                    
                  <!-- tiny only nav-->
                <ul class="nav visible-xs" id="xs-menu">
                    <li><a href="<?php echo base_url()?>login" class="text-center"><i class="fa fa-hospital-o"></i></a></li>
                    <li><a href="<?php echo base_url()?>fellowshipprogram/loadFellowshipView" class="text-center"><i class="fa fa-user-md"></i></a></li>
                    <li><a href="<?php echo base_url()?>residents/loadSearchView" class="text-center"><i class="fa fa-search"></i></a></li>
                    <li><a href="<?php echo base_url()?>stats" class="text-center"><i class="fa fa-bar-chart"></i></a></li>
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
		                <div class="padding">
		                    <div class="full col-sm-9">

		                        <!-- content -->                      
		                      	<div class="row">
		                      		<!-- Header in top of content section -->
		                        	<div class = "col-sm-12">
		                        		<div class="col-sm-8 col-sm-offset-2">
		                        		<div class="panel panel-default">
			                                <div class="panel-body">
			                                  <h4 class = "text-center bottom-spacer"> Search for a Resident </h4>
				                            </div>
			                            </div><!--panel panel-default-->
			                            </div><!-- col-sm-5 col-sm-offset-4-->
			                                <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
			                                	<div class = "panel panel-default">
													<div class="panel-body text-center">
														<div class = "col-sm-4 col-sm-offset-4 text-center">
															<form id = "resSearchForm">
															<div class="form-group">
																<label for="resLastName">Last Name: </label> 
																<input class = "form-control" type = "text" name = "resLastName" id = "resLastName" placeholder = "Last Name"
																	data-bv-notempty = "true"
																	data-bv-notempty-message = "Last name is required and cannot be empty." />
															</div>

															<button type="submit" class="btn btn-primary" id="searchBtn">Search</button>

															</form>
														</div>
													</div>
												</div>
												<div id = "ajaxGoesHere">

												</div>
			                                </div> <!--formGoesHere-->
		                              	</div> <!-- col-sm-12-->
		                        	</div> <!-- row -->
		                       </div><!--full col-sm-9-->
		                    </div><!-- padding -->
		                </div><!-- column col-sm-10 col-xs-11 -->
		            </div><!-- row row-offcanvas row-offcanvas-left -->		            

		             <!-- confirmation modal -->
		            <!-- Modal -->
					<!-- Modal HTML -->
					<div id="confirmModal" class="modal fade">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <h4 class="modal-title text-center">Verification</h4>
					            </div>
						            <div class="modal-body col-xs-10 col-xs-offset-1">
						            	<div class = "panel panel-default top-spacer">
											<div class="panel-body text-center">
								            	<div id="ajaxModal">
								                	<p>Loading...</p>
								                	<!-- ajax forms here will be called 'modalForm' -->
								                </div>
								            </div>
								        </div>
						            </div>
						            <div class="modal-footer">
						                <button type="button" id = "modalOK" class="btn btn-danger" data-dismiss="modal">OK</button>
						                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
						            </div>
					        </div>
					    </div>
					</div>


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
		          
		        </div><!-- box -->
		    </div><!--wrapper-->

	<!--CORE JS BOOTSTRAP AND JQUERY -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<!-- BOOTSTRAP VALIDATOR -->
	<script type="text/javascript" src="/residentTracker/assets/js/validate//bootstrapValidator.min.js"></script>

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

	<script> 
		$(document).ready(function(){
			
			//form validation initalizations
			$('#resSearchForm').bootstrapValidator();

		});
	</script>

	<script>
		$('#resSearchForm').submit(function( event ) {
			event.preventDefault(); 
			
			var base_url = '<?php echo site_url();?>'; 
			
			$.ajax({
			  type: "POST",
			  url: base_url + 'residents' + '/lastNameSearch/' + $('#resLastName').val(),
			  dataType: "html",
			  success: function(data) {
					$('#ajaxGoesHere').html(data);
					}
				})
		})

		//form is loaded by ajax, handle the submit
		$('#selectResBtn').click(function() {
			$('#selectResForm').submit();
		});
	</script>

	</body>
</html>


