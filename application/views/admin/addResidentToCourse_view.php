<form id="modalForm" action="<?php echo base_url()?>admin/updateResident" method="post">
	<h4 class="bottom-spacer"> Select a Course </h4>
    <div class="form-group">
        <label for="resName">Choose Course</label>
        <select class="form-control" id="selectCourse" name="selectCourse">
        <?php
            if(empty($courses))
            {
                echo '<option value ="0">No courses found. Please search again.</option>';
            }
            foreach($courses as $course)
            {   
                echo '<option value ="' . $course->id . '">' . $course->name . " - " . $course->date . '</option>';
            } 
        ?>
        </select>
    </div>
    <?php echo form_hidden('residentID', $id); ?> 
</form>