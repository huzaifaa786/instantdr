<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item mt-4">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#city" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">City</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="city">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin/city') }}">Create
                            City</a>
                    </li>
                
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hospital" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Hospitals</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="hospital">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.hospital.create') }}">Create Hospital</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.hospital.allhospitals') }}">All Hospitals</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#speciality" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Doctor's Speciality</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="speciality">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.speciality.doctor-speciality') }}">Create
                            Speciality</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.speciality.all-speciality') }}">All Speciality</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#doctor" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Doctors</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="doctor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctor.createe') }}">Create Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctor.alldoctors') }}">All Doctors</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ambulance" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Ambulance</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ambulance">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin/ambulance') }}">Create Ambulance</a>
                    </li>
                   
                </ul>
            </div>
        </li>
        
        
    

    </ul>


</nav>
