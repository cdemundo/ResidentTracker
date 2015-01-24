<?php
    if(!empty($errorMessage))
    {
        echo '<p class = "alert alert-warning"> Not found </p>';
        echo $errorMessage;
    }
    else
    { 
        echo '<h4 class="bottom-spacer"> Remove A Resident </h4>'; 
        $attributes = array('id' => 'modalForm');
        echo form_open('admin/removeResident', $attributes); 

        echo '<p class = "alert alert-danger"> This cannot be reversed </p>'; 
        echo '<p><b>First Name:</b> ' . $resident->firstName . '</p>'; 
        echo '<p><b>Last Name:</b> ' . $resident->lastName . '</p>'; 
        echo '<p><b>Residency Program:</b> ' . $resident->programName . '</p>'; 
        echo '<p><b>PGY:</b> ' . $resident->pgy . '</p>'; 

        echo form_hidden('residentID', $resident->getID()); 
        echo '</form>';
    } 
                                                