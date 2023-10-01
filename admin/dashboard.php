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
                      <?php 
                      $total_asset = $con->query("SELECT * FROM assets");
                      $total_asset = mysqli_num_rows($total_asset);
                      echo "<h3>{$total_asset}</h3>";
                      
                      ?>
                      

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
                      <?php 
                        $total_asset_OE = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*OE%'");
                        $total_asset_OE = mysqli_num_rows($total_asset_OE);
                        echo "<h3>{$total_asset_OE}</h3>";
                      ?>

                      <p>Number of Office Equipments</p>
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
                      <?php 
                        $total_asset_ME = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*ME%'");
                        $total_asset_ME = mysqli_num_rows($total_asset_ME);
                        echo "<h3>{$total_asset_ME}</h3>";
                      ?>

                      <p>Number of Machiniries and Equipments</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-solid fa-cogs"></i>
                    </div>
                  </div>
                </div>
                
                <!-- Total Documents -->
                <div class="col-3">
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <?php 
                        $total_asset_TE = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*TE%'");
                        $total_asset_TE = mysqli_num_rows($total_asset_TE);
                        echo "<h3>{$total_asset_TE}</h3>";
                      ?>

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
                      <?php 
                        $total_asset_CE = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*CE%'");
                        $total_asset_CE = mysqli_num_rows($total_asset_CE);
                        echo "<h3>{$total_asset_CE}</h3>";
                      ?>

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
                      <?php 
                        $total_asset_JT = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*JT%'");
                        $total_asset_JT = mysqli_num_rows($total_asset_JT);
                        echo "<h3>{$total_asset_JT}</h3>";
                      ?>

                        <p>Number of Jigs and Tools</p>
                      </div>
                      <div class="icon">
                        <i class="nav-icon fas fa-solid fa-toolbox"></i>
                      </div>
                    </div>
                  </div>

              </div>

              <div class="row">

                  
                <div class="col-sm-6">
                  <!-- PIE CHART -->
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">Pie Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <?php 
                        $percent_OE = $con->query("SELECT * FROM assets WHERE asset_barcode LIKE '*OE%' AND asset_remarks = 'Counted'");
                        $percent_OE = mysqli_num_rows($percent_OE);
                        $OE_percentage_count = ($percent_OE / $total_asset_OE) * 100;
                        $OE_percentage_count = round($OE_percentage_count,2);
                      
                      
                      ?>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                          var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                                  <?php 
                                      $element_text = ['Office Equipments','Machiniries and Equipments','Transportation Equipments', 'Computer Equipment and Software', 'Jigs and Tools'];
                                      $element_percent = [$OE_percentage_count];
                                      $element_count = [$percent_OE, $total_asset_ME, $total_asset_TE, $total_asset_CE, $total_asset_JT];

                                      for($i = 0; $i < 1; $i++){
                                          echo"['{$element_text[$i]} ($element_percent[$i]%)'" . "," . "{$element_count[$i]}],";
                                      }

                                  ?>
                          ]);

                          var options = {
                              pieSliceText: 'percentage',
                              pieSliceTextStyle: {
                              color: 'black',
                            },
                          };

                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                          chart.draw(data, options);
                        }
                      </script>
                      
                      <div id="piechart" style="width: auto; height: auto;"></div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

              

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
