

  <?php
  include ('includes/header.php');
  include('includes/sidebar.php'); ?> 

    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; 
        include $page.'.php';
    ?>

    
<footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
<?php include ('includes/footer.php'); ?>

  </body>
  
</html>