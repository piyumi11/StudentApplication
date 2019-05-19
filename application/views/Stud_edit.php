     <div class="container">
    <h4 class = "app-header" ><?php echo $page_title;?></h4>
     <div class="row">
      <form method = "post" action = "<?php echo base_url();?>index.php/stud/edit">

         <?php
            echo form_open('Stud_controller/update_student');
            echo form_hidden('old_roll_no',$old_roll_no);
            echo form_label('Registration No. : ');
            echo form_input(array('id'=>'roll_no','name'=>'roll_no','value'=>$records[0]->roll_no));
            echo "<br/>";

            echo form_label('Name : ');
            echo form_input(array('id'=>'name','name'=>'name','value'=>$records[0]->name));
            echo "<br/>";

            echo form_submit(array('id'=>'submit','value'=>'Edit'));
            echo form_close();
         ?>

      </form>
    </div>
  </div>
