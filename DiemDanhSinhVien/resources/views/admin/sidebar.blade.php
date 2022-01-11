<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKAcs1mHNZFKSk_G129tBfBmgKpr0no-S2Ow&usqp=CAU"
            alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/logout" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('facultys.list') }}" class="nav-link">
                        <i class="nav-icon fab fa-affiliatetheme"></i>
                        <p>
                            Khoa
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('facultys.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách khoa</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

                <li class="nav-item">
                    <a href="{{ route('class.list') }}" class="nav-link">
                        <i class="nav-icon fab fa-accusoft"></i>
                        <p>
                            Lớp
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('studentM.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Sinh viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacherM.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Giảng viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subjects.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Môn học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('semester.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>
                            Học kỳ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('room.list') }}" class="nav-link">
                        <i class="nav-icon fab fa-codepen"></i>
                        <p>
                            Phòng học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('lesson.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Ca học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('term.list') }}" class="nav-link">
                        <i class="nav-icon fab fa-buffer"></i>
                        <p>
                            Lớp học phần
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('schedule.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Lịch học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('attendance.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Điểm danh
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('user.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tài khoản
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
