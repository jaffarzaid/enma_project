<div class="left_col scroll-view">

    <!-- sidebar menu -->
    <div class="navbar nav_title" style="border: 0;">
        <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>Enma Institute</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ asset('backend/assets/production/images/no_image.jpg') }}" alt="..."
                class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <h2>Welcome {{ Auth::user()->name }}</h2>
        </div>
    </div>

    <br />

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                {{-- Dashboard --}}
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>

                {{-- List of Trainees --}}
                @if (Auth::user()->list_of_trainees == 1)
                    <li><a><i class="fa fa-group"></i></i> Trainees <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('view.all.trainees') }}">All Trainees</a></li>
                            <li><a href="{{ route('view.employee.trainees') }}">Employee Trainees</a></li>
                            <li><a href="{{ route('view.job_seeker.trainees') }}">Job Seeker Trainees</a></li>
                            <li><a href="{{ route('view.univ_students.trainees') }}">University Student Trainees</a></li>
                        </ul>
                    </li>
                @endif

                {{-- Trainers --}}
                @if (Auth::user()->list_of_trainees == 1)
                    <li><a><i class="fa fa-mortar-board"></i> Trainers <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.trainers') }}">List of Trainers</a></li>
                            <li><a href="{{ route('add.trainer') }}">Add Trainer</a></li>
                        </ul>
                    </li>
                @endif

                {{-- Courses --}}
                @if (Auth::user()->courses == 1)
                    <li><a><i class="fa fa-book"></i></i> Courses <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Tamkeen Registered Courses</a></li>
                            <li><a href="#">Preparatory Registered Courses</a></li>
                            <li><a href="{{ route('add.course') }}">Add Course</a></li>
                            <li><a href="{{ route('view.courses') }}">All Courses</a></li>
                        </ul>
                    </li>
                @endif

                {{-- Examamination --}}
                @if (Auth::user()->examination == 1)
                    <li><a><i class="fa fa-solid fa-question"></i> Examination <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Pre-Assessment</a></li>
                            <li><a href="#">Quizzes</a></li>
                            <li><a href="#">Post-Tests</a></li>
                            <li><a href="#">Mock-Exam</a></li>
                            <li><a href="#">Final Exams</a></li>
                        </ul>
                    </li>
                @endif

                {{-- Learning Support --}}
                @if (Auth::user()->learning_support == 1)
                    <li><a><i class="fa fa-solid fa-chalkboard-user"></i> Learning Support <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Test 1</a></li>
                            <li><a href="#">Test 2</a></li>
                            <li><a href="#">Test 3</a></li>
                        </ul>
                    </li>
                @endif

                {{-- Reading Material --}}
                @if (Auth::user()->reading_materials == 1)
                    <li><a><i class="fa fa-solid fa-book-open-reader"></i> Reading Material <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Test 1</a></li>
                            <li><a href="#">Test 2</a></li>
                            <li><a href="#">Test 3</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

        @if (Auth::user()->child_admin == 1)
            <div class="menu_section">
                <h3>Admin</h3>
                {{-- add child user admin --}}
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-child"></i> Child Admin <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('all.child_admins') }}">All Child Admins</a></li>
                            <li><a href="{{ route('create.child_admin') }}">Create Child Admin</a></li>
                        </ul>
                    </li>
                    {{-- <li><a><i class="fa fa-solid fa-fire"></i> Firewall <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="page_403.html">403 Error</a></li>
                        <li><a href="page_404.html">404 Error</a></li>
                        <li><a href="page_500.html">500 Error</a></li>
                    </ul>
                </li> --}}
                </ul>
            </div>
        @endif
    </div>

    <!-- /sidebar menu -->
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
