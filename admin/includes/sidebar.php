<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?page=dashboard" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-center">Assets Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php?page=user_profile" class="d-block nav-user_profile"><?php echo $user_firstname . " " . $user_lastname ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
              <a href="index.php?page=dashboard" class="nav-link nav-dashboard">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          
          <!-- Inventory -->
          <li class="nav-item nav-invent">
            <a href="index.php?page=inventory" class="nav-link nav-inventory">
              <i class="nav-icon fas fa-list"></i>
              <p>
                List of Assets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=All" class="nav-link nav-All">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=OE" class="nav-link nav-OE">
                  <i class="far fa-circle nav-icon"></i>
                  <p>*OE*</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=ME" class="nav-link nav-ME">
                  <i class="far fa-circle nav-icon"></i>
                  <p>*ME*</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=TE" class="nav-link nav-TE">
                  <i class="far fa-circle nav-icon"></i>
                  <p>*TE*</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=CE" class="nav-link nav-CE">
                  <i class="far fa-circle nav-icon"></i>
                  <p>*CE*</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=inventory&bar=JT" class="nav-link nav-JT">
                  <i class="far fa-circle nav-icon"></i>
                  <p>*JT*</p>
                </a>
              </li>
            </ul>
          </li>

          
          <!-- Find Assets -->
          <li class="nav-item">
            <a href="index.php?page=find_asset" class="nav-link nav-find_asset">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Physical Count
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?page=dep_value" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Depreciation Value
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?page=archieve" class="nav-link nav-archieve">
              <i class="nav-icon fas fa-trash"></i>
              <p>
                Asset Disposal
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?page=users" class="nav-link nav-archieve">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          
          <li class="nav-header"></li>

          <!-- Log Out -->
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#logout">
              <i class="nav-icon fa fa-solid fa-power-off"></i>
              <p>Log Out</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Add Folder Modal -->
  <div class="modal fade" id="logout">
            <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">Logout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="h3">Are you sure?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a type="button" href="logout.php" class="btn btn-danger" title="Add File">Logout</a>
                    </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->