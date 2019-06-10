
<div class="container">
  <h4 class = "app-header" ><?php echo $page_title;?></h4>
        <form action="<?php echo base_url();?>index.php/account/signin" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                  value="<?php echo (!empty($username)) ? $username : ''; ?>">
                <span class="help-block"><?php echo (!empty($username_err)) ? $username_err : ''; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control"
                  value="<?php echo (!empty($password)) ? $password : ''; ?>">
                <span class="help-block"><?php echo (!empty($password_err)) ? $password_err : ''; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"
                  value="<?php echo (!empty($confirm_password)) ? $confirm_password : ''; ?>">
                <span class="help-block"><?php echo (!empty($confirm_password_err)) ? $confirm_password_err : ''; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="<?php echo base_url();?>index.php/account/login">Login here</a>.</p>
        </form>
    </div>
