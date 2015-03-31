<h4 class="bottom-spacer"> Remove A Fellow </h4>
    <form id="modalForm" action="<?php echo base_url()?>admin/removeFellow" method="post">
        <p class = "alert alert-danger"> This cannot be reversed </p>

        <?php
            echo '<p><b>First Name:</b> ' . $fellow->firstname . '</p>'; 
            echo '<p><b>Last Name:</b> ' . $fellow->lastname . '</p>'; 
            echo '<p><b>Fellowship Program:</b> ' . $fellow->program_name . '</p>'; 
            echo '<p><b>Year Attended</b> ' . $fellow->year_attended . '</p>'; 
        ?>

        <input type="hidden" name="fellowID" value="<?php echo $fellow->getID();?>"/>
    </form>
