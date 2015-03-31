<!DOCTYPE html>
<html>
	<head>
		<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
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
	          
                <!-- main content -->
	                <div class="padding">
	                    <div class="full col-sm-9">
	                        <!-- content -->                      
	                      	<div class="row">
	                      		<!-- Header in top of content section -->
	                        	<div class = "col-sm-12 bottom-spacer">
	                        		<div class="panel panel-default">
		                                <div class="panel-body">
		                                	<p class="lead no-bottom">Fellowship Locator</p>
		                                </div>
	                              	</div>
                              			<div class="text-center top-spacer">
	                                		<label for="fellowshipType">Fellowship Type </label>
	                                	</div>
                        				<div class="text-center">	                        					
		                        			<select id="fellowshipType">
		                        					<option value="Trauma">Trauma</option>
		                        					<option value="Hand">Hand</option>
		                        					<option value="FA">Foot and Ankle</option>
		                        			</select>
		                        			<div class="top-spacer visible-xs visible-sm">
		                        				<button type="submit" class="btn btn-primary" id="fellowBtn">Get Fellowships</button>
		                        			</div>
                        				</div>
	                        	</div>

	                        	<!-- US MAP DIV -->
	                        	<!-- MAP FOR SCREENS BIGGER THAN XS -->
	                        	<div class = "col-sm-12 hidden-xs hidden-sm">
	                        		<div class="panel panel-default">
		                                <div class="panel-body text-center" id = "map" style="width: 768px; height: 500px;">
		                                	<!-- map goes here -->
		                                </div>
	                              	</div>
	                        	</div>

	                        	<!--VISIBLE ON PHONES -->
	                        	<div class = "col-sm-12 visible-xs visible-sm">
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

	                        	<!-- Fellowship Program content -->
	                        	<div class = "col-sm-12 text-center">
	                        		<p class="lead"> Fellowships</p>
	                        	</div>
	                        	

	                        	<!-- FELLOWSHIP INFO GOES HERE -->
	                        	<div class = "col-sm-12">
	                        		<div class="row text-center" id="fellowshipinfo">
	                        			<!-- will be ajax --> 
	                        			<div id = "ajaxGoesHere" class="big-top-spacer">

	                        			</div>
	                              	</div><!-- row -->
	                        	</div>
	                       </div><!--/row-->
	                    </div><!-- /col-9 -->
	                </div><!-- /padding -->
	            </div><!-- /main -->
	        </div><!--row row-offcanvas row-offcanvas-left-->
        </div><!-- box-->
	</div><!-- wrapper -->

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
    					var type = $("#fellowshipType").val();
						getPrograms(data.name, type);
					}
    		});
  		});
	</script>

	<!-- SCRIPT FOR STATE DROPDOWN LIST.. SHOWS UP ON PHONES INSTEAD OF MAP -->
	<script>
		$(document).ready(function() {
			$('#fellowBtn').on('click', function() {
				var state = $("#stateDropdown").val(); 
				var type = $("#fellowshipType").val();
				getPrograms(state, type); 
			});
		});
	</script>
	
	<!-- Jquery function, ajax to get residency program info - takes state abbreviation as input 
		 ajax request to residencyprogram/getStateInfo                                      	-->
	<script>
		function getPrograms(state, type) {
			var base_url = '<?php echo site_url();?>'; 
			$("#ajaxGoesHere").html('<img src="<?php echo base_url()?>assets/images/load.png" />')
			$.ajax({
			  type: "POST",
			  url: base_url + 'fellowshipprogram' + '/getProgramsByState/' + state + '/' + type,
			  dataType: "html",
			  success: function(data) {
					$('#ajaxGoesHere').html(data);
					}
				})
		}
	</script>	
	</body>
</html>


