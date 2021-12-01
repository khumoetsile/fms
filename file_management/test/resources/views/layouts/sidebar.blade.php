<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
               <!-- @can('Admin-list') -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">USERS </span>
                        <span class="badge m-l-5 badge-pill badge-info noti">{{ $verification_requests }}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('users.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">-- All Users</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Contacts</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('contacts.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-plus"></i>
                                <span class="hide-menu">-- View Contacts</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
               <!-- @endcan -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
