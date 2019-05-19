
     <div class="container">
     <h4 class = "app-header" ><?php echo $page_title;?></h4>
     <div class="row">
      <form method = "post" action = "<?php echo base_url();?>index.php/stud/add">

         <?php
            echo form_open('Stud_controller/add_student');
            echo form_label('Registartion No. : ');
            echo form_input(array('id'=>'roll_no','name'=>'roll_no'));
            echo "<br/>";

            echo form_label('Name : ');
            echo form_input(array('id'=>'name','name'=>'name'));
            echo "<br/>";

            echo form_submit(array('id'=>'submit','value'=>'Add'));
            echo form_close();
         ?>

      </form>
    </div>
  </div>
