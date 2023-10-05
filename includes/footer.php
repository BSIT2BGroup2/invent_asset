

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
    
$(document).ready(function(){
  <?php
    if(!empty($_SESSION['toast'])){
      if($_SESSION['toast'] == 'wrongEmail'){
        echo"
          toastr.warning('Wrong Email/Password. Please try again')
        ";
      }unset($_SESSION['toast']);
    }
  ?>
});
</script>
</script>
</body>
</html>
