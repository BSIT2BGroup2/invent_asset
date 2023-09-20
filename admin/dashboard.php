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
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>85</h3>

                      <p>Total Assets</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-solid fa-building"></i>
                    </div>
                  </div>
                </div>

                <!-- Borrowed Books -->
                <div class="col-3">
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>53</h3>

                      <p>Number of  Office Equipments</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-solid fa-chair"></i>
                    </div>
                  </div>
                </div>

                <!-- Peding Books -->
                <div class="col-3">
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>32</h3>

                      <p>Number of Machiniries and Equipments</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-solid fa-gears"></i>
                    </div>
                  </div>
                </div>
                
                <!-- Total Documents -->
                <div class="col-3">
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <h3>12</h3>

                      <p>Number of Transportation Equipments</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-car"></i>
                    </div>
                  </div>
                </div>

                <!-- Total Documents -->
                <div class="col-3">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>12</h3>

                        <p>Number of Computer Equipment and Software</p>
                      </div>
                      <div class="icon">
                        <i class="nav-icon fas fa-solid fa-desktop"></i>
                      </div>
                    </div>
                  </div>

                  <!-- Total Documents -->
                  <div class="col-3">
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        <h3>12</h3>

                        <p>Number of Jigs and Tools</p>
                      </div>
                      <div class="icon">
                        <i class="nav-icon fas fa-solid fa-toolbox"></i>
                      </div>
                    </div>
                  </div>

              </div>

              

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
