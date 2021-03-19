
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/agents/agentsDashboard" class="brand-link">
      <span class="brand-text font-weight-light pb-3">DAS Version 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="/agents/agentsDashboard" class="d-block">
            Welcome: &nbsp; 
            <?php 
            //$session = session();
            //echo $session->accountEmail;
            //echo $agent;
            ?>

          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/agents/agentsDashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/agents/agentsProfile" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/agents/clientListView" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Client
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/agents/logout" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $(document).ready(function () {

            var path = window.location.pathname;

            $('.nav li a.nav-link').each(function () {

                $('[href="' + path + '"]').addClass('active');

            });

        }); 

    });
</script>
  <div class="content-wrapper">