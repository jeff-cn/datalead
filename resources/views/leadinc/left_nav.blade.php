
<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
        <h1 class="h4">{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->name }}</p>
    </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('home')}}"> <i class="icon-home"></i>总览</a></li>
        <li><a href="tables.html"> <i class="fa fa-bar-chart"></i>实时</a></li>
        <li><a href="charts.html"> <i class="icon-grid"></i>对比</a></li>
    </ul>
    <span class="heading">EXTRAS</span>
    <ul class="list-unstyled">
        <!-- <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li> -->
    </ul>
</nav>