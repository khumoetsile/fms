<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @can('SuperUser-list')
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">USERS/ROLE </span>
                        <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('users.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">-- All Users</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a href="{{ route('roles.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">-- Roles</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="sidebar-item">
                    <a href="{{ route('departments.index') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View Department</span>
                    </a>
                </li>
                 <li class="sidebar-item">
                    <a href="{{ route('buildings.index') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View Buildings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('offices.index') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View Offices</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('categories.index') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('files.index') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View Files</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('files.need_aprove') }}" class="sidebar-link">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="hide-menu">-- View File Requests</span>
                    </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('files.create') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Submit New</span>
                 </a>
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Feedbacks </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- View Feedbacks</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Search </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Files</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Mails</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Users</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                <hr>
                @endcan
                 @can('RMU-list')
                <li class="sidebar-item">
                 <a href="{{ route('recieved.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Recieve New</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('recieved.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Routed/Icoming</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('files.pening_files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Pending</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('forwarded.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Forwarded</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $fwd_file }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('deferred_list.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Defered</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
                 <li class="sidebar-item">
                 <a href="{{ route('cancelled_list.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Cancelled</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $cancelled_files }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('released_list.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Released</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
                <li class="sidebar-item">
                 <a href="{{ route('kept_list.files') }}" class="sidebar-link">
                    <i class="mdi mdi-account-plus"></i>
                    <span class="hide-menu">-- Kept Files</span>
                    <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                 </a>
                </li>
              	<li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Manage File</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                         <li class="sidebar-item">
                            <a href="{{ route('files.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View Files</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a href="{{ route('sections.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View Sections</span>
                            </a>
                        </li>
                          
                        <li class="sidebar-item">
                            <a href="{{ route('genders.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- Genders</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Feedbacks </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- View Feedbacks</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Search </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Files</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Mails</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                @endcan
                @can('ActionOfficer-list')
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Remarks </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Send remarks</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- View remarks</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Feedbacks </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- View Feedbacks</span>
                        </a>
                    </li>
                    </ul>
                </li> 
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Search </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Files</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Search Mails</span>
                        </a>
                    </li>
                    </ul>
                     
                </li> 
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Files </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('files.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View All Files</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('files.request_files') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View Requested Files</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('files.aprove_files') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View Aproved Files</span>
                            </a>
                        </li>
                    </ul>
                     
                </li> 
                
                @endcan
                @can('SuperAdmin-list')
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Backup </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                       <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Backup and Restore</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- System Upgrades</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Maintenance of System</span>
                        </a>
                    </li>
                    </ul>
                </li>
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                         <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Last back up</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Last restore</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Last system maintenance</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="hide-menu">-- Last upgrades</span>
                        </a>
                    </li>
                    </ul>
                </li>
                 
                @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
