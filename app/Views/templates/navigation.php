<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/admin/adminDashboard">
            <span class="align-middle">Admin-DAS</span>
        </a>

    <ul class="nav nav-pills nav-sidebar flex-column">

        <li class="nav-item">
            <a class="nav-link" href="/admin/adminDashboard">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/profile">
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/clientList">
                <i class="align-middle" data-feather="figma"></i> <span class="align-middle">Client</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/agentList">
                <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Agent</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            </a>
        </li>
    </ul>

    </div>
</nav>

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