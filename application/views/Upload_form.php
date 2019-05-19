<html>

   <head>
      <title>Upload Form</title>
      <link rel = "stylesheet" type = "text/css"
         href = "<?php echo base_url(); ?>css/bootstrap/css/bootstrap.min.css">
   </head>

   <body class="container-fluid">
      <?php echo $error;?>
      <?php echo form_open_multipart('upload/do_upload');?>

      <form action = "" method = "">
         <input type = "file" name = "userfile" size = "20" />
         <br /><br />
         <input type = "submit" value = "upload" />
      </form>

   </body>

</html>
