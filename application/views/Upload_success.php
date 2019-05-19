<html>

   <head>
      <title>Upload Form</title>
      <link rel = "stylesheet" type = "text/css"
         href = "<?php echo base_url(); ?>css/bootstrap/css/bootstrap.min.css">
   </head>

   <body class="container">
      <h3>Your file was successfully uploaded!</h3>

      <ul>
         <?php foreach ($upload_data as $item => $value):
           echo "<li>";
              echo $item; echo ":"; echo $value;
           echo "</li>";
         endforeach; ?>
      </ul>

      <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
   </body>

</html>
