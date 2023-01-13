@can('admin')
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('dashboard.dosen')}}">Dosen</a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.karyawan')}}">Karyawan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('dashboard.absensi')}}"><i class="fa fa-table fa-fw"></i>Absensi</a>
            </li>
            <li>
                <a href="{{route('rekapAbsen')}}"><i class="fa fa-edit fa-fw"></i>Rekap Absensi</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
@endcan