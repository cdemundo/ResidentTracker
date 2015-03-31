<form id="modalForm" action="<?php echo base_url()?>admin/updateFellow" method="post">
	<h4 class="bottom-spacer"> Update A Fellow </h4>
    <div class="form-group">
        <label for="felName">First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="First Name" value = "<?php echo $fellow->firstname ?>">
    </div>
    <div class="form-group">
        <label for="resName">Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value = "<?php echo $fellow->lastname ?>">
    </div>
    <div class="form-group">
        <label for="felEmail">Email</label>
        <input type="text" class="form-control" name="felEmail" placeholder="Email" value = "<?php echo $fellow->email ?>">
    </div>
    <div class="form-group">
        <label for="year_attended">Year Fellowship Began</label>
            <select class="form-control text-center" name="year_attended" value = "<?php echo $fellow->year_attended ?>">
            	<?php 
                    for ($i = 0; $i<10; $i++)
                    {
                        //compare the date from the DB to the dates in the dropdown and select the correct one, using strcmp
                        $date = strtotime($fellow->year_attended);

                        if(strcmp(date("Y", $date), date("Y", strtotime("-$i years"))) == 0)
                        {
                            echo '<option selected="selected" value ="' . date("Y", strtotime("-$i years")) . '">' . date("Y", strtotime("-$i years")) . '</option>';
                        }
                        else
                        {
                            echo '<option value ="' . date("Y", strtotime("-$i years")) . '">' . date("Y", strtotime("-$i years")) . '</option>';
                        }
                    }
            	?>
            </select>
    </div>
    <div class="form-group">
        <label for="felPhone">Phone</label>
        <input type="text" class="form-control" name="felPhone" placeholder="Phone" value = "<?php echo $fellow->telephone ?>">
    </div>
    <div class="form-group" id="programSelect" name="program">
    	<label>Fellowship</label>
       	<p><b><?php echo $fellow->program_name ?>: </b> Cannot be changed - remove and readd fellow to modify. </p>
    </div>
    <input type="hidden" name="fellowID" value="<?php echo $fellow->getID();?>"/>
</form>