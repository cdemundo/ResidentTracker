<!DOCTYPE html>
<html>
    <head>
        <title>Stryker Resident Engagement</title>

        <!-- CORE BOOTSTRAP --> 
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- PAGE SPECIFIC CSS -->
        <link rel="stylesheet" href="/residentTracker/assets/css/validate/bootstrapValidator.min.css"/>
        <link href="/residentTracker/assets/css/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
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
                                              <h4 class = "text-center bottom-spacer"> Add Course </h4>
                                            </div>
                                        </div><!--panel panel-default-->
                                        </div><!-- col-sm-5 col-sm-offset-4-->
                                            <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
                                                <div class = "panel panel-default">
                                                    <div class="panel-body text-center">
                                                        <div class = "col-sm-4 col-sm-offset-4 text-center">
                                                            <h4 class="bottom-spacer"> Select a Course </h4>
                                                            <div class="form-group">
                                                                <form id="addCourseForm">
                                                                    <div id="courseBox" class="form-group">
                                                                        <label for="courseName"> Course Name: </label>
                                                                        <input type="text" id="courseName" name="courseName" placeholder="Course Name" class="form-control" autofocus
                                                                            data-bv-notempty="true"
                                                                            data-bv-notempty-message="This field cannot be empty"/>
                                                                    </div>
                                                                <button type="submit" id = "findCourseBtn" class="btn btn-primary">Go</button>
                                                            </div>                                                            
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id = "ajaxGoesHere">

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
            $('#addCourseForm').bootstrapValidator();

        });
    </script>

    <script>
        $('#addCourseForm').submit(function( event ) {
            event.preventDefault(); 
            
            var base_url = '<?php echo site_url();?>'; 
            
            $.ajax({
              type: "POST",
              url: base_url + 'residents' + '/findCourse/' + $('#courseName').val() + '/' + <?php echo $id ?>,
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


