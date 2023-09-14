<?php include('includes/header.php'); ?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Asset Inventory</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="includes/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="user_email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="user_password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <?php 
                if(isset($_SESSION['user_id'])){
                    echo "<a href='admin/' class='btn btn-primary btn-block'>Sign In</a>";
                }else{
                    echo "<input type='submit' name='login' value='Sign In' class='btn btn-primary btn-block'></input>";
                }
            
            ?>
            
          </div>
          <!-- /.col -->
        </div>
      </form>
<!--
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
              -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?php include('includes/footer.php');?>