<form id="modalForm" action="<?php echo base_url()?>admin/updateProgram" method="post">
	<h4 class="bottom-spacer"> Update A Program </h4>
    <div class="form-group">
        <label for="program_name">Program Name (Cannot be changed)</label>
        <input type="text" class="form-control" placeholder="Program Name" value = "<?php echo $residencyProgram->program_name ?>" disabled>
        <input type="hidden" name="program_name" value = "<?php echo $residencyProgram->program_name ?>">
    </div>
    <div class="form-group">
        <label for="total_residents">Total Residents</label>
        <input type="text" class="form-control" name="total_residents" placeholder="Total Residents" value = "<?php echo $residencyProgram->total_residents ?>">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address" value = "<?php echo $residencyProgram->address ?>">
    </div>
    
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" placeholder="City" value = "<?php echo $residencyProgram->city ?>">
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <select name="state" id = "state" class="form-control">
        <?php foreach($states as $key => $value)
        { 
            if ($key == $residencyProgram->state)
            {
                echo '<option selected value="' . $key . '">' . $value . '</option>';
            }
            else
            {
                echo '<option value="' . $key . '">' . $value . '</option>';
            }
        } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" class="form-control" name="telephone" placeholder="Format: 201-831-5555" value = "<?php echo $residencyProgram->telephone ?>">
    </div>

    <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" class="form-control" name="fax" placeholder="Fax" value = "<?php echo $residencyProgram->fax ?>">
    </div>

    <div class="form-group">
        <label for="contact_name">Contact Name</label>
        <input type="text" class="form-control" name="contact_name" placeholder="Contact Name" value = "<?php echo $residencyProgram->contact_name ?>">
    </div>

    <div class="form-group">
        <label for="contact_email">Contact Email</label>
        <input type="text" class="form-control" name="contact_email" placeholder="Contact Email" value = "<?php echo $residencyProgram->contact_email ?>">
    </div>

    <div class="form-group">
        <label for="contact_phone">Contact Phone</label>
        <input type="text" class="form-control" name="contact_phone" placeholder="Format: 201-831-5555" value = "<?php echo $residencyProgram->contact_phone ?>">
    </div>

    <div class="form-group">
        <label for="tsm_name">TSM Name</label>
        <input type="text" class="form-control" name="tsm_name" placeholder="TSM Name" value = "<?php echo $residencyProgram->tsm_name ?>">
    </div>

    <div class="form-group">
        <label for="tsm_email">TSM Email</label>
        <input type="text" class="form-control" name="tsm_email" placeholder="TSM EMail" value = "<?php echo $residencyProgram->tsm_email ?>">
    </div>

    <div class="form-group">
        <label for="rep_name">Rep Name</label>
        <input type="text" class="form-control" name="rep_name" placeholder="Rep Name" value = "<?php echo $residencyProgram->rep_name ?>">
    </div>

    <div class="form-group">
        <label for="rep_email">Rep Email</label>
        <input type="text" class="form-control" name="rep_email" placeholder="Rep Email" value = "<?php echo $residencyProgram->rep_email ?>">
    </div>

    <div class="form-group">
        <label for="director">Director</label>
        <input type="text" class="form-control" name="director" placeholder="Director" value = "<?php echo $residencyProgram->director ?>">
    </div>

    <div class="form-group">
        <label for="director_email">Director Email</label>
        <input type="text" class="form-control" name="director_email" placeholder="Director Email" value = "<?php echo $residencyProgram->director_email ?>">
    </div>

    <div class="form-group">
        <label for="meded_consultant">Med Ed Consultant</label>
        <input type="text" class="form-control" name="meded_consultant" placeholder="Med Ed Consultant" value = "<?php echo $residencyProgram->meded_consultant ?>">
    </div>
</form>