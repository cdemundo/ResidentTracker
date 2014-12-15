<form id="modalForm" action="<?php echo base_url()?>admin/removeResident" method="post"> 
    <p class = 'alert alert-danger'> This cannot be reversed </p>
    <?php 
        echo '<p><b>First Name:</b> ' . $residentToRemove->firstName . '</p>'; 
        echo '<p><b>Last Name:</b> ' . $residentToRemove->lastName . '</p>'; 
        echo '<p><b>Residency Program:</b> ' . $residentToRemove->programName . '</p>'; 
        echo '<p><b>PGY:</b> ' . $residentToRemove->pgy . '</p>'; 
    ?>
<input type="hidden" name = "residentID" id = "residentID" value = "<?php echo $residentToRemove->getID() ?>" />
</form>                                                     