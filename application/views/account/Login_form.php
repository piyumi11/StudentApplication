<div class="container">
  <h4 class = "app-header" ><?php echo $page_title;?></h4>
        <form action="<?php echo base_url();?>index.php/account/login" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                  value="<?php echo (!empty($username)) ? $username : ''; ?>">
                <span class="help-block"><?php echo (!empty($username_err)) ? $username_err : ''; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo (!empty($password_err)) ? $password_err:''; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="<?php echo base_url();?>index.php/account/signin">Sign up now</a>.</p>
        </form>
    </div>
