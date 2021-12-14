<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa fa-gavel" aria-hidden="true"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Law Firm</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{url('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
    <hr class="sidebar-divider">

<!-- Heading -->
    <div class="sidebar-heading">
        Petitions Setup
    </div>

<!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('petitions')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Petitions</span></a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">

<!-- Heading -->
    <div class="sidebar-heading">
        System Setup
    </div>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Settings</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('users')}}">Users</a>
        </div>
    </div>
</li> 




 
</ul>
<!-- End of Sidebar -->