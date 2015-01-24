<!-- Fellowship PROGRAM INFO GOES HERE -->
<?php
  if(isset($fellowshipPrograms))
  {

  foreach($fellowshipPrograms as $program):?>
  <!-- Uses col-sm so that on mobile devices, these should stack so the user can scroll down.  on bigger screens - display 3xn table -->
  
  <div class="col-md-4">
    <div class = "panel panel-default" style="height: 200px;">
      <div class="panel-body top-spacer">
        <a href='<?php echo site_url();?>fellowshipprogram/getProgram/<?php echo $program->program_name ?>' class="bottom-spacer"><b> <?php echo $program->program_name ?></b> </a>
        <p class="top-spacer"><b> State: </b><?php echo $program->state ?></p>
        <p><b> Director: </b> <?php echo $program->director ?> </p>
      </div>
    </div>
  </div>

<?php   endforeach; } ?>
