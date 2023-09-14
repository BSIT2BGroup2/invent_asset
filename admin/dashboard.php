<?php 
if(isset($_POST['cancel'])){
  $b_book_id = $_POST['b_book_id'];
  $book->cancel($b_book_id);   

}
?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              <div class="row">
                
                <!-- Total Books -->
                <div class="col-3">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>85</h3>

                      <p>Total Books</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-book"></i>
                    </div>
                  </div>
                </div>

                <!-- Borrowed Books -->
                <div class="col-3">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>53</h3>

                      <p>Borrowed Books</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-book"></i>
                    </div>
                  </div>
                </div>

                <!-- Peding Books -->
                <div class="col-3">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>32</h3>

                      <p>Pending Books</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-book"></i>
                    </div>
                  </div>
                </div>
                
                <!-- Total Documents -->
                <div class="col-3">
                  <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3>12</h3>

                      <p>Your Uploaded Documents</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-copy"></i>
                    </div>
                  </div>
                </div>
              </div>



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
