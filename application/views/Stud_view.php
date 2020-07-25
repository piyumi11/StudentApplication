<div class="container">
  <h4 class = "app-header" ><?php echo $page_title;?></h4>
  <div class="row">
    <a class ='app-icon' href = "<?php echo base_url();?>index.php/stud/add_view">Add new student</a>
  </div>
  <div>
  	<a class ='app-icon' href = "<?php echo base_url();?>index.php/stud/pdf"  target="blanck"><i class="fas fa-file-pdf"></i></a>
  </div>
    <div class="row">
      <table border = "1" class="table table-bordered">
         <?php
            $i = 1;
            echo "<tr>";
            echo "<td>#</td>";
            echo "<td>Registration No.</td>";
            echo "<td>Name</td>";
            echo "<td>Subjects</td>";
            echo "<td></td>";
            echo "<tr>";

            foreach($records as $r) {
               echo "<tr>";
               echo "<td>".$i++."</td>";
               echo "<td>".$r->roll_no."</td>";
               echo "<td>".$r->name."</td>";
               echo "<td><a class ='app-icon' href = '".base_url()."index.php/subject/subjects/"
                     .$r->roll_no."'>see all</a></td>";
               echo "<td><a href = '".base_url()."index.php/stud/edit/"
                  .$r->roll_no."'><i class='fas fa-edit app-icon'></i></a>
                  &nbsp;&nbsp;
                  <a href = '".base_url()."index.php/stud/delete/"
                     .$r->roll_no."'><i class='fas fa-trash app-icon'></i></a>
                  </td>";
               echo "<tr>";
            }
         ?>
      </table>
    </div>

</div>
