<form id="modalForm" action="<?php echo base_url()?>admin/updateResident" method="post">
	<h4 class="bottom-spacer"> Update A Resident </h4>
    <div class="form-group">
        <label for="resName">First Name</label>
        <input type="text" class="form-control" name="firstName" placeholder="First Name" value = "<?php echo $resident->firstName ?>">
    </div>
    <div class="form-group">
        <label for="resName">Last Name</label>
        <input type="text" class="form-control" name="lastName" placeholder="Last Name" value = "<?php echo $resident->lastName ?>">
    </div>
    <div class="form-group">
        <label for="resEmail">Email</label>
        <input type="text" class="form-control" name="resEmail" placeholder="Email" value = "<?php echo $resident->email ?>">
    </div>
    <div class="form-group">
        <label for="startYear">Post-Graduate Year</label>
        <select class="form-control text-center" name="startYear" value = "<?php echo $resident->pgy ?>">
        	<?php 
        		for ($i = 1; $i<6; $i++)
        		{
        			if($i == $resident->pgy)
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
        <input type="text" class="form-control" name="resPhone" placeholder="Phone" value = "<?php echo $resident->telephone ?>">
    </div>
    <div class="form-group" id="programSelect" name="program">
    	<label>Residency Program</label>
       	<p><b><?php echo $resident->programName ?>: </b> Cannot be changed - remove and readd resident to modify. </p>
    </div>
    <?php echo form_hidden('residentID', $resident->getID()); ?> 
</form>