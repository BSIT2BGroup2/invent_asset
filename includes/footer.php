

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
    <?php 
      if(isset($_GET['page'])){
        $p = $_GET['page'];
        if($p == 'inventory'){?>
          $('.nav-invent').addClass('menu-open')
          <?php
        }
      }
    ?>
    $('.nav-<?php echo isset($_GET['bar']) ? $_GET['bar'] : '' ?>').addClass('active')
    
    
  // Get the master checkbox and all the individual checkboxes
  const masterCheckbox = document.getElementById('selectAllBoxes');
  const checkboxes = document.querySelectorAll('.checkBoxes');

 

        // Add an event listener to each checkbox
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                // Check if any individual checkbox is unchecked
                const isAnyUnchecked = [...checkboxes].some(function (checkbox) {
                    return !checkbox.checked;
                });

                // Update the "Toggle All" checkbox accordingly
                masterCheckbox.checked = !isAnyUnchecked;
            });
        });

        // Add an event listener to the "Toggle All" checkbox
        masterCheckbox.addEventListener("change", function () {
            const isChecked = masterCheckbox.checked;

            // Loop through all checkboxes and set their state to match the "Toggle All" checkbox
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = isChecked;
            });
        });

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,"pageLength":100,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "pageLength":100,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "pageLength":100,
    });
  });
  

    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
    $('#summernote2').summernote()

$(function () {
  bsCustomFileInput.init();
});
  
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
})

$(document).ready(function(){
  <?php
    if(!empty($_SESSION['toast'])){
      if($_SESSION['toast'] == 'fileInserted'){
        echo"
          toastr.success('The Excel File is Inserted into Database')
        ;";
      }if($_SESSION['toast'] == 'changeRemarks'){
        echo"
          toastr.success('The Asset/s Remarks is been Updated')
        ;";
      }if($_SESSION['toast'] == 'restore_asset'){
        echo"
          toastr.success('The Asset/s is Succesfully Restored')
        ;";
      }if($_SESSION['toast'] == 'disposed_asset'){
        echo"
          toastr.success('The Asset/s have been Moved to Asset Disposal')
        ";
      }if($_SESSION['toast'] == 'quantityOverCount'){
        echo"
          toastr.info('The Count is not equal to quantity recorded')
        ";
      }if($_SESSION['toast'] == 'noAssetFound'){
        echo"
          toastr.warning('No Asset ID Found')
        ";
      }if($_SESSION['toast'] == 'count_asset'){
        echo"
          toastr.success('Asset Counted')
        ";
      }if($_SESSION['toast'] == 'save_asset'){
        echo"
          toastr.success('The Asset/s Count has been Saved')
        ";
      }if($_SESSION['toast'] == 'delete_asset'){
        echo"
          toastr.success('The Asset/s Deleted Permanently')
        ";
      }
    }
  ?>
});
</script>