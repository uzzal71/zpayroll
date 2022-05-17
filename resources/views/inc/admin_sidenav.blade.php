<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('home') }}" class="d-block text-left">
                    <img class="mw-100" src="{{ static_asset('assets/img/smart-payroll.png') }}" class="brand-icon" alt="SmartPay">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="Search in menu" id="menu-search" onkeyup="">
            </div>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('home')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Dashboard</span>
                    </a>
                </li>
                <!-- Software Settings Start-->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-wrench aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Software Settings</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('companies.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Company Information</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('departments.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Departments</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('designations.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Designations</span>
                            </a>
                        </li>
                        
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('schedules.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Schedules</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('leaves.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Leaves Type</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('taxs.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Taxs Setup</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('provident_founds.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Provident Found Setup</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Software Settings End -->


                <!-- Employee Management Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Employee Management</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('employees.create') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Add New Employee</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('employees.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Employee List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Employee Management End -->

                <!-- HR Management Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">HR Management</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('employee_leaves.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Employee Leave</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('holiday_entries.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Holiday Entry</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('weekend_entries.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Weekend Entry</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('employee_promotions.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Employee Promotion</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('salary_increments.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Salary Increment</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- HR Management End -->

                <!-- Payroll & Attendance Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-file-excel aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Payroll & Attendance</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('upload.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Excel Sheet Upload</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('attendances.create') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Manual Entry</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('cronjobs.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Cron Jobs</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <!-- Payroll & Attendance End -->


                <!-- HR Reports Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-fingerprint aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">HR Reports</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Daily Present</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Daily Absent</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Daily Late</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Daily Leave</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Daily Over Time</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Range Attendance</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Monthly Attendance</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Monthly OT</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- HR Reports End -->

                <!-- Salary Report Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-file aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Salary Reports</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Monthly Salary Sheet</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Monthly Payship</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Tax Report</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Salary Report End -->

                <!-- System Start -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">System</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">User Management</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">System Information</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- System End -->

                <!-- Database Backup Start-->
                <li class="aiz-side-nav-item">
                    <a href="{{route('home')}}" class="aiz-side-nav-link">
                        <i class="las la-database aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Data Backup</span>
                    </a>
                </li>
                <!-- Database Backup End -->

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
