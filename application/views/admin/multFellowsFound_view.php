<div class="col-sm-12 text-center">
	<form id = 'confirmAddFelForm' action="<?php echo base_url()?>admin/addFellow" method="post">
		<h4 class = "text-center">Fellows Found</h4>
		<div class = "form-group">
			<p> The following fellows with the same last name, year, and program name were found. </p>  
			<br/>
			<?php
			foreach($existingFellows as $fellow)
			{	
				echo '<p><b>' . $fellow->firstname . " " . $fellow->lastname . " - " . $fellow->program_name . '</b></p>';
			} 
			?>
			<br/>

			<p>If you still want to add <b><?php echo $newFellow->firstname . " " . $newFellow->lastname; ?></b>, please hit "Add Fellow".  Otherwise, please hit cancel and use the search button in the navbar to visit the fellow's existing page. </p>
		
		</div>
		<!--Pass values for original fellow if user still wants to add -->
		<input type="hidden" name="confirmAddFel" value="TRUE">
		<input type="hidden" name="firstname" value="<?php echo $newFellow->firstname; ?>"/>
		<input type="hidden" name="lastname" value="<?php echo $newFellow->lastname; ?>"/>
		<input type="hidden" name="selectFelProgram" value="<?php echo $newFellow->program_name; ?>"/>
		<input type="hidden" name="year_attended" value="<?php echo $newFellow->year_attended; ?>"/>
		<input type="hidden" name="email" value="<?php if(isset($newFellow->email)){echo $newFellow->email;} ?>"/>
		<input type="hidden" name="phone" value="<?php if(isset($newFellow->phone)){echo $newFellow->phone;} ?>"/>

		<input type="submit" class="btn btn-warning text-center" id="confirmAddFelBtn" value="Add Fellow">
	</form>
</div>