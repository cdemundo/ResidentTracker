<div class="col-sm-6 col-sm-offset-3 text-center">
    <form action="<?php echo base_url()?>residents/addResidentToCourse/<?php echo $id ?>" method = "post">
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
        <button type="submit" id = "addCourseBtn" class="btn btn-primary">Add</button>
    </form>
</div>
