
<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <div id="search-results"></div>
                </div>
                <div class="col-sm-2">
                    <a type="button" href="index.php?page=add_users" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> Add Users</a>
                </div>
            </div>
        </div>
    </div> <!-- /. content header -->

    <!-- Main Content -->
    <section class="context">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <table id="example2" class="table table-bordered table-hover ">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <select name="select_role" id="" class="form-control" required>
                                            <option value="" selected hidden>Select Option</option>
                                            <option value="Admin">Admin</option>
                                            <option value="End User">End Users</option>
                                            <option value="Delete">Delete</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                                <button type="submit" name="changeRole" id="deleteBTN" value="borrow" class="btn btn-primary" disabled><i class="nav-icon fas fa-apply"></i> Apply</button>
                                        <div id="search-results"></div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>User Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $query = mysqli_query($con, "SELECT * FROM users WHERE user_role != 'Admin'");
                                        while($row = mysqli_fetch_assoc($query)){
                                            echo"
                                            <tr>
                                                <td class='text-center'><input type='checkbox' name='user_id[]' id='user_id' value='{$row['user_id']}'></td>
                                                <td>{$row['user_firstname']}</td>
                                                <td>{$row['user_lastname']}</td>
                                                <td>{$row['user_email']}</td>
                                                <td>{$row['user_role']}</td>
                                                <td>
                                                <button type='submit' name='borrow' id='editBTN' value='borrow' class='btn btn-warning' title='Borrow Book'><i class='nav-icon fas fa-edit'></i></button></td>
                                            </tr>";
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- /. content wrapper -->

<script>
    $('input[type="checkbox"]').on('change', function() {
        $('#deleteBTN').prop('disabled', !$('input[type="checkbox"]:checked').length);
        
  });
</script>
<?php 

  
if(isset($_POST['changeRole'])){
    $select_role = $_POST['select_role'];
    $user_id = $_POST['user_id'];
    change_role($user_id, $select_role);
}
?>