<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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
          
            <!-- main col -->
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

                <!-- main content -->	
                <div class="padding">
                    <div class="full col-sm-9">

                        <!-- content -->                      
                      	<div class="row">
                      		<!-- Header in top of content section -->
                        	<div class = "col-sm-12">
                        		<div class="col-sm-8 col-sm-offset-2">
                        		<div class="panel panel-default">
	                                <div class="panel-body">
	                                  <h3 class = "text-center bottom-spacer"> Admin Controls </h4>
		                                  <div class="text-center">
		                                  	  <h4>Resident Tools</h3>
		                                  	  <ul class="list-group list-inline">
			                                  	  <li> <a href="#" id="addResLink">Add Resident</a></li>
			                                  	  <li> <a href="#" id="chooseResLink">Remove/Update Resident</a></li>
			                                  	  <li> <a href="#" id="updateResProgramLink">Update Residency Program</a></li>
			                                  	  <li> <a href="#" id="addCourseLink">Add Resident Courses</a></li>
		                                  	  </ul>
		                                  </div>
		                                  <div class="text-center">
		                                  	  <h4>Fellow Tools</h3>
		                                  	  <ul class="list-group list-inline">
			                                  	  <li> <a href="#" id="addFelLink">Add Fellow</a></li>
			                                  	  <li> <a href="#" id="chooseFelLink">Remove/Update Fellow</a></li>
			                                  	  <li> <a href="#" id="updateFelProgram">Update Fellowship</a></li>
			                                  	  <li> <a href="#" id="convertFellow">Convert Resident to Fellow</a></li>
			                                  	  <li> <a href="#" id="addCourseLink">Add Fellow Courses</a></li>
		                                  	  </ul>
		                                  </div>
	                                </div>
	                            </div><!--panel panel-default-->
	                            </div><!-- col-sm-5 col-sm-offset-4-->
	                                <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
	                                	<div class = "panel panel-default">
											<div class="panel-body text-center">
												<div class = "col-sm-4 col-sm-offset-4 text-center">

													<p id = "defaultP"> Choose an action from above </p>

													<!-- Add Resident Form -->
													<form id="addResidentForm" action="<?php echo base_url()?>admin/addResident" method="post"
														data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
									                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
									                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">

														<h4 class="bottom-spacer"> Add A Resident </h4>
													    <div class="form-group">
													        <label for="resName">First Name</label>
													        <input type="text" class="form-control" name="firstName" placeholder="First Name"
													        	data-bv-notempty = "true"
													        	data-bv-notempty-message="First name is required and cannot be empty"/>
													    </div>
													    <div class="form-group">
													        <label for="resName">Last Name</label>
													        <input type="text" class="form-control" name="lastName" placeholder="Last Name"
													        	data-bv-notempty = "true"
													        	data-bv-notempty-message="Last name is required and cannot be empty"/>
													    </div>
													    <div class="form-group">
													        <label for="resEmail">Email</label>
													        <input type="text" class="form-control" name="resEmail" placeholder="Email"
													        	
								                                data-bv-emailaddress="true"
								                                data-bv-emailaddress-message="The email address is not a valid"/>
													    </div>
													    <div class="form-group">
													        <label for="startYear">Post-Graduate Year</label>
													        <select class="form-control text-center" name="startYear">
													        	<?php 
													        		for ($i = 1; $i<6; $i++)
													        		{
													        			echo '<option value ="' . $i . '">' . $i . '</option>';
													        		}
													        	?>
													        </select>
													    </div>
													    <div class="form-group">
													        <label for="resPhone">Phone</label>
													        <input type="text" class="form-control" name="resPhone" placeholder="Format: 201-831-5555"
													        	data-bv-phone="true"
													        	data-bv-phone-country="US"
													        	data-bv-phone-message="The value is not a valid phone number."/>
													    </div>
													    <div class="form-group" id="programSelect" name="program">
													        <label for="selectRes">Residency Program</label>
															<select class="form-control" id="selectResProgram" name="selectResProgram">
															<?php
																foreach($residencyProgram as $program)
																{	
																	echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
																} 
															?>
															</select>
													    </div>

													    <button type="submit" class="btn btn-primary" id="addResBtn">Add Resident</button>
													    <button type="button" class="btn btn-warning" id="resetBtn">Reset Form</button>
													</form>

													<!-- Remove/Update Resident Form -->
													<form id="chooseResidentForm">
														<h4 class="bottom-spacer"> Remove or Update a Resident </h4>
													    <div class="form-group">
													        <label for="resName">Last Name</label>
													        <input type="text" class="form-control" id = "resLastName" name="resLastName" placeholder="Last Name"
													        data-bv-notempty="true"
													        data-bv-notempty-message="Last name is required and cannot be empty"/>
													    </div>

													    <button type="submit" id = "removeResidentBtn" class="btn btn-primary">Search</button>
													</form>

													<!-- submits via jquery and ajax, no action or method -->
													<!-- Update Program Form -->
													<form id="updateProgramForm">
														<h4 class="bottom-spacer"> Update a Residency Program </h4>

													    <div class="form-group" id="programSelect2">
													        <label for="selectRes">Residency Program</label>
															<select class="form-control" id="selectResProgram2" name="selectResProgram2">
															<?php
																foreach($residencyProgram as $program)
																{	
																	echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
																} 
															?>
															</select>
													    </div>
													    
													    <button type="submit" class="btn btn-primary">Select Program</button>
													</form>

													<!-- submits via jquery and ajax, no action or method -->
													<!-- Update Fellowship Program Form -->
													<form id="updateFellowshipProgramForm">
														<h4 class="bottom-spacer"> Update a Fellowship Program </h4>

													    <div class="form-group" id="fellowProgramSelect">
													        <label for="felProgramType">Choose Type</label>
															<select class="form-control" id="felProgramType" name="felProgramType">
																<option value="Trauma">Trauma</option>
																<option value = "Hand">Hand</option>
																<option value="FA">Foot & Ankle</option>
																<option value="Shoulder">Shoulder</option>
															</select>
															<div id="felProgramSelectDiv" class="top-spacer">
																<!-- ajax goes here -->
															</div>
													    </div>
													    
													    <button type="submit" class="btn btn-primary">Select Program</button>
													</form>
													<form id="addCourseForm" action ="<?php echo base_url()?>admin/addCourse" method="post">
														<h4 class="bottom-spacer"> Add a Course </h4>

													    <div class="form-group">
													        <label for="courseName">Course Name</label>
													        <input type="text" class="form-control" name="courseName" placeholder="Course Name"
													        	data-bv-notempty = "true"
													        	data-bv-notempty-message="Course name is required and cannot be empty"/>
													    </div>
													    <div class="form-group">
													        <label for="courseDesc">Course Description (max. 1000 char)</label>
													        <textarea type="text" cols="40" rows="4" maxlength="1000" name="courseDesc"
										                		data-bv-notempty="true"
		                               							data-bv-notempty-message="This field cannot be empty"></textarea>
													    </div>
													    <div class="form-group">
													        <label for="startDate">Course Start Date (YYYY-MM-DD)</label>
													        <input type="text" class="form-control" name="startDate" placeholder="YYYY-MM-DD"
													        	data-bv-notempty = "true"
													        	data-bv-date="true"
												                data-bv-date-format="YYYY-MM-DD"
												                data-bv-date-message="The value is not a valid date"
												                data-bv-notempty-message="Start date is required and cannot be empty"/>
													    </div>
													    
													    <button type="submit" class="btn btn-primary">Add Course</button>
													</form>

													<!-- THIS SECTION FOR RESIDENT FORMS-->
														<!-- Add Resident Form -->
														<form id="addResidentForm" action="<?php echo base_url()?>admin/addResident" method="post"
															data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
										                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
										                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">

															<h4 class="bottom-spacer"> Add A Resident </h4>
														    <div class="form-group">
														        <label for="resName">First Name</label>
														        <input type="text" class="form-control" name="firstName" placeholder="First Name"
														        	data-bv-notempty = "true"
														        	data-bv-notempty-message="First name is required and cannot be empty"/>
														    </div>
														    <div class="form-group">
														        <label for="resName">Last Name</label>
														        <input type="text" class="form-control" name="lastName" placeholder="Last Name"
														        	data-bv-notempty = "true"
														        	data-bv-notempty-message="Last name is required and cannot be empty"/>
														    </div>
														    <div class="form-group">
														        <label for="resEmail">Email</label>
														        <input type="text" class="form-control" name="resEmail" placeholder="Email"
														        	
									                                data-bv-emailaddress="true"
									                                data-bv-emailaddress-message="The email address is not a valid"/>
														    </div>
														    <div class="form-group">
														        <label for="startYear">Post-Graduate Year</label>
														        <select class="form-control text-center" name="startYear">
														        	<?php 
														        		for ($i = 1; $i<6; $i++)
														        		{
														        			echo '<option value ="' . $i . '">' . $i . '</option>';
														        		}
														        	?>
														        </select>
														    </div>
														    <div class="form-group">
														        <label for="resPhone">Phone</label>
														        <input type="text" class="form-control" name="resPhone" placeholder="Format: 201-831-5555"
														        	data-bv-phone="true"
														        	data-bv-phone-country="US"
														        	data-bv-phone-message="The value is not a valid phone number."/>
														    </div>
														    <div class="form-group" id="programSelect" name="program">
														        <label for="selectRes">Residency Program</label>
																<select class="form-control" id="selectResProgram" name="selectResProgram">
																<?php
																	foreach($residencyProgram as $program)
																	{	
																		echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
																	} 
																?>
																</select>
														    </div>

														    <button type="submit" class="btn btn-primary" id="addResBtn">Add Resident</button>
														</form>

														<!-- Remove Resident Form -->
														<form id="chooseResidentForm">
															<h4 class="bottom-spacer"> Remove or Update a Resident </h4>
														    <div class="form-group">
														        <label for="resName">Last Name</label>
														        <input type="text" class="form-control" id = "resLastName" name="resLastName" placeholder="Last Name"
														        data-bv-notempty="true"
														        data-bv-notempty-message="Last name is required and cannot be empty"/>
														    </div>

														    <button type="submit" id = "removeResidentBtn" class="btn btn-primary">Search</button>
														</form>

														<!-- submits via jquery and ajax, no action or method -->
														<!-- Update Program Form -->
														<form id="updateProgramForm">
															<h4 class="bottom-spacer"> Update a Residency Program </h4>

														    <div class="form-group" id="programSelect2">
														        <label for="selectRes">Residency Program</label>
																<select class="form-control" id="selectResProgram2" name="selectResProgram2">
																<?php
																	foreach($residencyProgram as $program)
																	{	
																		echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
																	} 
																?>
																</select>
														    </div>
														    
														    <button type="submit" class="btn btn-primary">Select Program</button>
														</form>
														<form id="addCourseForm" action ="<?php echo base_url()?>admin/addCourse" method="post">
															<h4 class="bottom-spacer"> Add a Course </h4>

														    <div class="form-group">
														        <label for="courseName">Course Name</label>
														        <input type="text" class="form-control" name="courseName" placeholder="Course Name"
														        	data-bv-notempty = "true"
														        	data-bv-notempty-message="Course name is required and cannot be empty"/>
														    </div>
														    <div class="form-group">
														        <label for="courseDesc">Course Description (max. 1000 char)</label>
														        <textarea type="text" cols="40" rows="4" maxlength="1000" name="courseDesc"
											                		data-bv-notempty="true"
			                               							data-bv-notempty-message="This field cannot be empty"></textarea>
														    </div>
														    <div class="form-group">
														        <label for="startDate">Course Start Date (YYYY-MM-DD)</label>
														        <input type="text" class="form-control" name="startDate" placeholder="YYYY-MM-DD"
														        	data-bv-notempty = "true"
														        	data-bv-date="true"
													                data-bv-date-format="YYYY-MM-DD"
													                data-bv-date-message="The value is not a valid date"
													                data-bv-notempty-message="Start date is required and cannot be empty"/>
														    </div>
														    
														    <button type="submit" class="btn btn-primary">Add Course</button>
														</form>
													<!-- END SECTION OF RESIDENT FORMS --> 
													<!-- THIS SECTION FOR FELLOW FORMS -->
														<form id="addFellowForm" method="post"
															data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
										                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
										                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">

															<h4 class="bottom-spacer"> Add A Fellow </h4>
														    <div class="form-group">
														        <label for="felName">First Name</label>
														        <input type="text" class="form-control" name="firstname" id = "firstname" placeholder="First Name"
														        	data-bv-notempty = "true"
														        	data-bv-notempty-message="First name is required and cannot be empty"/>
														    </div>
														    <div class="form-group">
														        <label for="felName">Last Name</label>
														        <input type="text" class="form-control" name="lastname" id = "lastname" placeholder="Last Name"
														        	data-bv-notempty = "true"
														        	data-bv-notempty-message="Last name is required and cannot be empty"/>
														    </div>
														    <div class="form-group">
														        <label for="felEmail">Email</label>
														        <input type="text" class="form-control" name="felEmail" id="felEmail" placeholder="Email"
									                                data-bv-emailaddress="true"
									                                data-bv-emailaddress-message="The email address is not valid."/>
														    </div>
														    <div class="form-group">
														        <label for="resPhone">Phone</label>
														        <input type="text" class="form-control" name="felPhone" id="felPhone" placeholder="Format: 201-831-5555"
														        	data-bv-phone="true"
														        	data-bv-phone-country="US"
														        	data-bv-phone-message="The value is not a valid phone number."/>
														    </div>
														    <div class="form-group">
														        <label for="year_attended">Year Started</label>
														        <select class="form-control text-center" name="year_attended" id="year_attended">
														        	<?php 
														        		for ($i = 0; $i<10; $i++)
														        		{
														        			echo '<option value ="' . date("Y", strtotime("-$i years")) . '">' . date("Y", strtotime("-$i years")) . '</option>';
														        		}
														        	?>
														        </select>
														    </div>
														    <div class="form-group" id="programSelect" name="program">
														        <label for="selectFelProgram">Fellowship Program</label>
																<select class="form-control" id="selectFelProgram" name="selectFelProgram">
																<?php
																	foreach($fellowshipProgram as $program)
																	{	
																		echo '<option value ="' . $program->id . '">' . $program->program_name . ' - ' . $program->type . '</option>';
																	} 
																?>
																</select>
														    </div>

														    <button type="submit" class="btn btn-primary" id="addFelBtn">Add Fellow</button>
														    <button type="button" class="btn btn-warning" id="resetBtn">Reset Form</button>
														</form>

														<!-- Remove/Update Fellow Form -->
														<form id="chooseFellowForm">
															<h4 class="bottom-spacer"> Remove or Update a Fellow </h4>
														    <div class="form-group">
														        <label for="felLastName">Last Name</label>
														        <input type="text" class="form-control" id = "felLastName" name="felLastName" placeholder="Last Name"
														        data-bv-notempty="true"
														        data-bv-notempty-message="Last name is required and cannot be empty"/>
														    </div>

														    <button type="submit" id = "removeFellowBtn" class="btn btn-primary">Search</button>
														</form>

													<!-- END SECTION FELLOW FORMS-->

												</div><!--col-sm-4 col-sm-offset-4 text-center-->
											</div><!--panel-body-->
										</div><!--panel panel-default -->
											<div id = "ajaxGoesHere" class="text-center">

											</div>
	                                </div><!--formGoesHere-->
                              	</div><!--col-sm-12-->
                        	</div><!--/row-->
                       </div><!--/full col-9-->
                    </div><!-- /padding -->
                </div><!-- column col-sm-10 col-xs-11 -->
            </div><!-- /row row-offcanvas row-offcanvas-left -->

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
  		</div><!--box-->
    </div><!-- wrapper -->



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
		$(document).ready(function(){

			$("form").hide(); //hide form on page load

			//these are for the links under "admin controls"

			/**
			* RESIDENT LINKS
			**/

			//Add resident click
  			$('#addResLink').click(function() {
  				//hide all other forms open 
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#addResidentForm').show(); 
  			})

  			//Remove resident click
  			$('#chooseResLink').click(function() {
  				//hide all other forms open
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#chooseResidentForm').show(); 
  			})

  			//Update residency program click
  			$('#updateResProgramLink').click(function() {
  				//hide all other forms open
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#updateProgramForm').show(); 
  			})

  			//Update courses click
  			$('#addCourseLink').click(function() {
  				//hide all other forms open
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#addCourseForm').show(); 
  			})

  			/**
  			* FELLOW LINKS
  			**/
  			//Add resident click
  			$('#addFelLink').click(function() {
  				//hide all other forms open 
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#addFellowForm').show(); 
  			})

  			//Choose resident click
  			$('#chooseFelLink').click(function() {
  				//hide all other forms open 
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#chooseFellowForm').show(); 
  			})

  			//Update fellowship program click
  			$('#updateFelProgramLink').click(function() {
  				//hide all other forms open
  				$("form").hide(); 
  				$('#defaultP').hide(); 
  				//show resident form
  				$('#updateFellowshipProgramForm').show(); 
  				//trigger change event to load programs 
  				$('#selectFelProgram').trigger('change');
  			})

  			//******* end of links ********************

  			//form validation initalizations
			$('#addResidentForm').bootstrapValidator(); 

			$('#addFellowForm').bootstrapValidator(); 

			$('#chooseResidentForm').bootstrapValidator(); 

			$('#addCourseForm').bootstrapValidator(); 
 		});
	</script>

	<script> 
		/**
		* Handle submission of the form to update a residency program's info
		* Loads a form in confirmModal and submits via ajax
		*/
		$('#updateProgramForm').submit(function( event ) {
			event.preventDefault(); 

			$("#confirmModal").modal('show');
			
			var base_url = '<?php echo site_url();?>'; 
			
			$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/checkUpdateProgram',
			  data: {selectResProgram : $('#selectResProgram2').val()},
			  dataType: "html",
			  success: function(data) {
					$('#ajaxModal').html(data);
					}
				})
		})
	</script>

	<script>
		/**
		* For Remove/Update Resident
		* Checks if resident exists and loads their info into confirmModal for updating or deleting
		*/
		$('#chooseResidentForm').submit(function( event ) {
			event.preventDefault(); 
			
			var base_url = '<?php echo site_url();?>'; 
			console.log($('#resLastName').val());
			
			$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/checkExistResident/' + $('#resLastName').val(),
			  dataType: "html",
			  success: function(data) {
					$('#ajaxGoesHere').html(data);
					}
				})
		});
	</script>

	<script> 
		/**
		* Handles deleting of resident
		*/
		$(document).on("click","#deleteResBtn",function(){

			if($('#resID').val() != 0)
			{
				console.log($('#resID').val()); 
				$("#confirmModal").modal('show');
				
				var base_url = '<?php echo site_url();?>'; 
				
				$.ajax({
				  type: "POST",
				  url: base_url + 'admin' + '/checkRemoveResident/' + $('#resID').val(),
				  dataType: "html",
				  success: function(data) {
						$('#ajaxModal').html(data);
						}
					})
			}
			else
			{
				//do nothing
			}
		})
	</script>

	<script>
		/**
		* For updating of resident
		**/
		$(document).on("click","#updateResBtn",function(){
			if($('#resID').val() != 0)
			{
				$("#confirmModal").modal('show');
				
				var base_url = '<?php echo site_url();?>'; 
				
				$.ajax({
				  type: "POST",
				  url: base_url + 'admin' + '/checkUpdateResident/' + $('#resID').val(),
				  dataType: "html",
				  success: function(data) {
						$('#ajaxModal').html(data);
						}
					})
			}
			else
			{
				//do nothing
			}
		})
	</script>

	<!-- FELLOW FORMS --> 

	<!-- ADD FELLOW FORM SUBMISSION HANDLE -->
	<script>
		$('#addFellowForm').submit(function(event){
			event.preventDefault(); 

		$("#confirmModal").modal('show');

		var base_url = '<?php echo site_url();?>';  

		$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/addFellow',
			  data: {
			  	firstname : $('#firstname').val(),
			  	lastname : $('#lastname').val(),
			  	felEmail : $('#felEmail').val(),
			  	felPhone : $('#felPhone').val(),
			  	year_attended : $('#year_attended').val(),
			  	selectFelProgram : $('#selectFelProgram').val(),
			  },
			  dataType: "html",
			  success: function(data) {
					$('#ajaxModal').html(data);
					}
				})
		})
	</script>

	<!--For Remove/Update Fellow
	    Checks if fellow exists and loads their info into confirmModal to update or delete -->
	<script>
		$('#chooseFellowForm').submit(function( event ) {
			event.preventDefault(); 
			
			var base_url = '<?php echo site_url();?>'; 
			
			$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/checkExistFellow/' + $('#felLastName').val(),
			  dataType: "html",
			  success: function(data) {
					$('#ajaxGoesHere').html(data);
					}
				})
		});
	</script>

	<!-- Check to delete a fellow --> 
	<script> 
		$(document).on("click","#deleteFelBtn",function(){

			if($('#felID').val() != 0)
			{
				$("#confirmModal").modal('show');
				
				var base_url = '<?php echo site_url();?>'; 
				
				$.ajax({
				  type: "POST",
				  url: base_url + 'admin' + '/checkRemoveFellow/' + $('#felID').val(),
				  dataType: "html",
				  success: function(data) {
						$('#ajaxModal').html(data);
						}
					})
			}
			else
			{
				//do nothing
			}
		})
	</script>

	<!-- Check to update a fellow -->
	<script>
		$(document).on("click","#updateFelBtn",function(){
			if($('#felID').val() != 0)
			{
				$("#confirmModal").modal('show');
				
				var base_url = '<?php echo site_url();?>'; 
				
				$.ajax({
				  type: "POST",
				  url: base_url + 'admin' + '/checkUpdateFellow/' + $('#felID').val(),
				  dataType: "html",
				  success: function(data) {
						$('#ajaxModal').html(data);
						}
					})
			}
			else
			{
				//do nothing
			}
		})
	</script>

	<script>
		//Handle dropdown select for fellowship program type
			$('#felProgramType').on('change', function() {
				var base_url = '<?php echo site_url();?>'; 
		
			$.ajax({
			  type: "POST",
			  url: base_url + 'admin' + '/getFellowshipPrograms/' + this.value,
			  dataType: "html",
			  success: function(data) {
					$('#felProgramSelectDiv').html(data);
					}
				})
			})
	</script>

	<script>
		$('#updateFellowshipProgramForm').submit(function(event){
			event.preventDefault(); 

			$("#confirmModal").modal('show');

			var base_url = '<?php echo site_url();?>';  

			$.ajax({
				  type: "POST",
				  url: base_url + 'admin' + '/checkFellowProgram/' + $('#felProgramType').val(),
				  data: {selectFelProgram : $('#selectFelProgram').val()},
				  dataType: "html",
				  success: function(data) {
						$('#ajaxModal').html(data);
						}
					})
		})
	</script>

	<!-- handle the modal form submissions -->
	<script>
		$('#modalOK').click(function() {
			$('#modalForm').submit();
		});
	</script>
	<!--reset addresident and add fellow form -->
	<script>
		$(document).on("click","#resetBtn",function() {
			$('form').trigger("reset");
		})
	</script>
	</body>
</html>


