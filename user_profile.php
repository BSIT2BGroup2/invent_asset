<?php 
    if(isset($_POST['edit_profile'])){
        $user_id = $_POST['user_id'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        edit_profile($user_id, $firstname, $lastname, $email);

    }

    if(isset($_POST['edit_pass'])){
      $user_id = $_POST['user_id'];
      $userName = $_POST['username'];
      $password = md5($_POST['oldPassword']);
      $new_pass = md5($_POST['newPassword']);
      $confirm_pass = md5($_POST['confirmPassword']);

      edit_pass($user_id, $userName, $password, $new_pass, $confirm_pass);
    }
    

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/avatar5.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $user_firstname . " " . $user_lastname; ?></h3>
                <p class="text-muted text-center"><?php echo $user_role; ?></p>

                <!-- <p class="text-muted text-center">Software Engineer</p> -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#edit_profile" data-toggle="tab">Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Username/Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                    <!-- Edit Profile Tab -->
                    <div class="active tab-pane" id="edit_profile">
                        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="firstName" class="form-control" id="inputName" placeholder="First Name" value="<?php echo $user_firstname; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]+/g, '')" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="lastName" class="form-control" id="inputName" placeholder="Last Name" value="<?php echo $user_lastname; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]+/g, '')" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $user_email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <button type="submit" name="edit_profile" value="edit_profile" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  <!-- /.tab-pane -->

                    <!-- Edit Username/Password Tab -->
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="inputName" placeholder="Username" value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                            <input type="password" name="oldPassword" class="form-control" id="inputEmail" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                            <input type="password" name="newPassword" class="form-control" id="inputName2" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                            <input type="password" name="confirmPassword" class="form-control" id="inputName2" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" name="edit_pass" value="edit_pass" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
