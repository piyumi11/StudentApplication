<html>
<head>
  <title><?php echo $page_title;?></title>
  <link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/bootstrap/css/bootstrap.min.css">
   <link rel = "stylesheet" type = "text/css"
    href = "<?php echo base_url(); ?>css/font-awesome/css/all.min.css">

   <link rel = "stylesheet" type = "text/css"
    href = "<?php echo base_url(); ?>css/style.css">
</head>
<body>
  <div class="container">
    <div class="row app-common-header">
      <a type="button" class="btn btn-default" ><?php

            if(empty($_SESSION["username"])){
              echo '';
            }
            else{
              echo htmlspecialchars($_SESSION["username"]);
            }
        ?>
      </a>
      <a type="button" class="btn btn-default" href = "<?php echo base_url();?>index.php/account/signin_view">
        Sign in</a>
      <a type="button" class="btn btn-default" href = "<?php echo base_url();?>index.php/account/<?php
              if(empty($_SESSION["username"])){
                echo 'login_view';
              }
              else{
                echo 'logout';
              }
          ?>">
          <?php
                if(empty($_SESSION["username"])){
                  echo 'Login';
                }
                else{
                  echo 'Logout';
                }
            ?></a>
    </div>
  </div>
</body>
</html>
