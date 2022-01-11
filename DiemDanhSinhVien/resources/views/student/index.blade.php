<?php
function getDateSchedule($dates, $mahp, $tuan)
{
    foreach ($dates as $date) {
        if ($date->tuan == $tuan && $date->mahp_id == $mahp) {
            echo $date->ngay;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cổng thông tin sinh viên</title>
    <!-- <link rel="shortcut icon" href="/Content/AConfig/images/favicon.png" /> -->
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/main.css">
    <link href="/template/teacher/Assets/css/components.min.css" rel="stylesheet" />
    <link href="/template/teacher/Assets/css/profile.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/responsive.css">
    <link rel="stylesheet" href="/template/teacher/Assets/fonts/fontawesome-free-5.15.4-web/css/all.css">
    <script type="text/javascript" src="/template/teacher/Assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-184858033-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-184858033-7');
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <input data-val="true" data-val-number="The field Uid must be a number." id="UID" name="UID" type="hidden"
        value="21" />
    <div id="focus-overlay"></div>
    <div class="wrapper">

        <style>
            @keyframes bellmove {
                from {
                    top: -8px;
                }

                to {
                    top: -5px;
                }
            }

            table,
            th {
                width: auto;
            }

        </style>
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header-content">
                    <div class="logo">
                        <a href="#" title="">
                            <img src="/template/teacher/Assets/images/logo.png" style="max-height: 40px
                                    !important;">
                        </a>
                    </div>

                    {{-- <div class="search-bar">
                        <form action="#">
                            <input type="text" id="k" name="k" placeholder="Tìm kiếm..." required>
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div> --}}

                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>

                    <div class="user-account dropdown">
                        <div class="user-info" data-toggle="dropdown">
                            <img class="user-account-img" src="{{ $data[0]->anh }}" style="width:
                            30px;height: 30px;border-radius: 50%
                            !important;object-fit: cover;" />
                            <a class="user-account-name" href="#" title="">{{ $data[0]->tensv }}</a>
                            <i class="fa fa-caret-down
                                    user-account-name-caret-down"
                                aria-hidden="true"></i>
                        </div>
                        <div class="user-account-info dropdown-menu pull-right">
                            <ul class="us-links">
                                <li><a href="/logout" title="">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="menu-top">
                        <ul>
                            <li>
                                <a href="#" title="">
                                    <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                    Trang chủ
                                </a>
                            </li>

                            {{-- <li>
                                <a id="spanBell" href="#" title="">
                                    <div id="tinTuc" lang="tin-tuc">
                                        <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp&nbspTin
                                        tức
                                    </div>
                                </a>
                            </li> --}}
                            <!-- Animation notify -->
                            <script>
                                CheckNews();

                                function CheckNews() {
                                    if (70 > 0) {
                                        var html = '<span>' + $("#tinTuc").html() + '</span>' +
                                            '<span style=\"left: 7px;top: -7px;min-width:16px ;width:fit-content; max-width:20px ;animation: bellmove 0.5s 5;\" class=\"badge badge-danger\">' +
                                            70 + '</span>';
                                        $("#spanBell").html(html);
                                    }
                                }
                            </script>
                            <!-- End animation notify -->
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--End header -->
        <input id="id-user" type="text" value="{{ $data[0]->masv }}" style="display: none" />
        <input id="WarningKSMode" name="WarningKSMode" type="hidden" value="0" />
        <style>
            .soluong {
                font-size: 11px !important;
                font-weight: 300;
                height: 18px;
                color: #fff;
                -webkit-border-radius: 12px !important;
                -moz-border-radius: 12px !important;
                border-radius: 12px !important;
                text-shadow: none !important;
                text-align: center;
                vertical-align: sub;
                padding: 3px;
                background: #eb2e51;
            }

            .shadow-danhhieu {
                position: relative;
                top: 8px;
                left: -37px;
                font-weight: bold;
                color: #fdc106;
                background-color: white;
                text-shadow: 0px 0px 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 0px 0px 11px #000000;
                font-size: 9px;
            }

            .span-danhhieusv {
                margin-left: -14px;
            }

            .star-danhhieu {
                margin-bottom: 5px;
            }

        </style>

        <div class="main-content main-dashboard">
            <div class="container">
                <div class="main-section-content" id="contnet">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="box-df profile-ds-info">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span
                                                class="caption-subject
                                                    bold"
                                                lang="db-thongtinsinhvien">
                                                Thông tin sinh viên
                                            </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- Infomation student -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="profile-userpic">
                                                    <img src="{{ $data[0]->anh }}" alt="" class="img-responsive"
                                                        style="object-fit:cover;">
                                                </div>


                                                <div class="text-center">
                                                    <a href="#" class="color-active" lang="db-chitiet-button">Xem
                                                        chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <form class="form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-xs-6"><span
                                                                    lang="sv-mssv">MSSV</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->masv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-lophoc">Lớp
                                                                    học</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->malop }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-hoten">Họ
                                                                    tên</span>:
                                                                <span class="bold">
                                                                    {{ $data[0]->tensv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-khoahoc">Khóa
                                                                    học</span>:
                                                                <span class="bold">2018</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-gioitinh">Giới
                                                                    tính</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->gioitinh == 0 ? 'Nam' : 'Nữ' }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-hedaotao">Bậc
                                                                    đào tạo</span>:
                                                                <span class="bold">Đại
                                                                    học</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-ngaysinh">Ngày
                                                                    sinh</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->ngaysinh }}</span></label>
                                                            <label class="col-xs-6"><span
                                                                    lang="sv-loaihinhdt">Loại
                                                                    hình đào
                                                                    tạo</span>:
                                                                <span class="bold">Ch&#237;nh
                                                                    quy</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-noisinh">Nơi
                                                                    sinh</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->diachi }}</span></label>
                                                            <label class="col-xs-6"><span
                                                                    lang="sv-nganh">Ngành</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->tenkhoa }}</span></label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- End infomation student -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="box-menu row">
                                        <div class="col-xs-12">
                                            <div
                                                class="item-box-menu
                                                    box-df">
                                                <h3 class="name" lang="db-nhacnho">Nhắc
                                                    nhở mới, chưa xem</h3>
                                                <div class="desc clearfix">
                                                    <div class="number" style="width:110px
                                                            !important;">0</div>
                                                    <div class="text-runing" style="width:100%;
                                                            height:51px;">
                                                    </div>
                                                    <div
                                                        class="icon-menu
                                                            text-right">
                                                        <i class="icon fa fa-bell" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <a href="/ghi-chu-nhac-nho-sinh-vien.html" class="color-active"
                                                        lang="db-chitiet-button">Xem
                                                        chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="{{ route('student.store', ['user' => $data[0]->masv]) }}"
                                                class="color-active" title="">
                                                <div
                                                    class="item-box-menu
                                                        box-df">
                                                    <h3 class="name" lang="db-lichhoctuan">Lịch
                                                        học trong tuần</h3>
                                                    <div
                                                        class="desc
                                                            clearfix">
                                                        <div class="number">{{ $numSubject }}</div>
                                                        <div
                                                            class="icon-menu
                                                                text-right">
                                                            <i class="icon
                                                                    fa
                                                                    fa-calendar"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-left" lang="db-chitiet-button">
                                                        Xem chi tiết
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="#" class="color-active" title="">
                                                <div
                                                    class="item-box-menu
                                                        box-df">
                                                    <h3 class="name" lang="db-lichthituan">Lịch
                                                        thi trong tuần</h3>
                                                    <div
                                                        class="desc
                                                            clearfix">
                                                        <div class="number">0</div>
                                                        <div
                                                            class="icon-menu
                                                                text-right">
                                                            <i class="icon
                                                                    fa
                                                                    fa-calendar-check-o"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-left" lang="db-chitiet-button">
                                                        Xem chi tiết
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- List column methods -->
                    {{-- Filter --}}
                    <div style="display: flex; justify-content: space-evenly">
                        <div class="form-group"
                            style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                            <label style="width:auto; margin-right: 10px " for="">Năm học</label>
                            <select style="width:200px;" name="namhoc" id="namhoc-filter" class="form-control"
                                required="required">
                                <option value="All">Tất cả</option>
                                @foreach ($years as $year) {
                                    <option value="{{ $year->namhoc }}">{{ $year->namhoc }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"
                            style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                            <label style="width:auto; margin-right: 10px" for="">Học kỳ</label>
                            <select style="width:140px;" name="hocky" id="hocky-filter" class="form-control"
                                required="required">
                                <option value="All">Tất cả</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div style="width:100%; min-height:auto; min-width: auto; overflow-x:auto; max-height: 500px"
                        class="tables-croll">
                        <!-- Danh sách điểm danh -->
                        <table style="text-align:center;" class="table table-striped table-bordered table-hover"
                            width="100%" role="grid">
                            <thead class="bg-info">
                                <tr style="width:100%;">
                                    <th style="min-width: 120px; text-align:center;">Lớp học phần</th>
                                    <th style="min-width: 150px; max-width: 200px;  text-align:center;">Tên học phần
                                    </th>
                                    <th style="min-width: 150px;  text-align:center;">Tên giảng viên</th>
                                    <th style="min-width: 150px;  text-align:center;">Năm học</th>
                                    <th style="min-width: 150px;  text-align:center;">Học kỳ</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 1</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 2</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 3</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 4</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 5</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 6</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 7</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 8</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 9</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 10</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 11</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 12</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 13</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 14</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 15</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 16</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 17</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 18</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 19</th>
                                    <th style="min-width: 120px; text-align:center;">Tuần 20</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td style="vertical-align: middle;"
                                            title="Năm học: {{ $subject->namhoc_id }}, Học kỳ: {{ $subject->hocky_id }}, Loại: {{ $subject->loai }}">
                                            {{ $subject->mahp_id }}</td>
                                        <td style="vertical-align: middle;">{{ $subject->tenmh }}</td>
                                        <td style="vertical-align: middle;">{{ $subject->tengv }}</td>
                                        <td style="vertical-align: middle;">{{ $subject->namhoc_id }}</td>
                                        <td style="vertical-align: middle;">{{ $subject->hocky_id }}</td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '1'); ?>">
                                            <img style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan1 == 'true' ? '/icons/check.png' : ($subject->tuan1 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt="">
                                        </td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '2'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan2 == 'true' ? '/icons/check.png' : ($subject->tuan2 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '3'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan3 == 'true' ? '/icons/check.png' : ($subject->tuan3 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '4'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan4 == 'true' ? '/icons/check.png' : ($subject->tuan4 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '5'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan5 == 'true' ? '/icons/check.png' : ($subject->tuan5 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '6'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan6 == 'true' ? '/icons/check.png' : ($subject->tuan6 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '7'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan7 == 'true' ? '/icons/check.png' : ($subject->tuan7 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '8'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan8 == 'true' ? '/icons/check.png' : ($subject->tuan8 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '9'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan9 == 'true' ? '/icons/check.png' : ($subject->tuan9 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '10'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan10 == 'true' ? '/icons/check.png' : ($subject->tuan10 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '11'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan11 == 'true' ? '/icons/check.png' : ($subject->tuan11 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '12'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan12 == 'true' ? '/icons/check.png' : ($subject->tuan12 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '13'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan13 == 'true' ? '/icons/check.png' : ($subject->tuan13 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '14'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan14 == 'true' ? '/icons/check.png' : ($subject->tuan14 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '15'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan15 == 'true' ? '/icons/check.png' : ($subject->tuan15 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '16'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan16 == 'true' ? '/icons/check.png' : ($subject->tuan16 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '17'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan17 == 'true' ? '/icons/check.png' : ($subject->tuan17 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '18'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan18 == 'true' ? '/icons/check.png' : ($subject->tuan18 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '19'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan19 == 'true' ? '/icons/check.png' : ($subject->tuan19 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                        <td title="<?php getDateSchedule($dates, $subject->mahp_id, '20'); ?>"> <img
                                                style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                src="{{ $subject->tuan20 == 'true' ? '/icons/check.png' : ($subject->tuan20 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                alt=""></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @csrf
                        </table>
                        <!-- End lịch ở đây -->
                    </div>
                    <!-- End list column methods -->


                </div>
            </div>
        </div>
        <script type="text/javascript" charset="utf-8">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            function checkState(base) {
                var state = '';
                if (base == 'true')
                    state = '/icons/check.png';
                else if (base == 'false')
                    state = '/icons/nocheck.png';
                else
                    state = '/icons/null.png';
                return `<img style="display: inline-block; width:24px; height:100%; vertical-align: middle;" src="${state}" alt="">`
            }
            $(document).ready(function() {
                function buildTable(data) {
                    var table = document.getElementById('table-body')
                    table.innerHTML = ''
                    for (var i = 0; i < data.length; i++) {

                        row =
                            `<tr><td style="vertical-align: middle;"title="Năm học: ${data[i].namhoc_id}, Học kỳ: ${data[i].hocky_id}, Loại: ${data[i].loai}">${data[i].mahp_id}</td>` +
                            `<td style="vertical-align: middle;">${data[i].tenmh}</td><td style="vertical-align: middle;">${data[i].tengv}</td><td style="vertical-align: middle;">${data[i].namhoc_id}</td>` +
                            `<td style="vertical-align: middle;">${data[i].hocky_id}</td><td>${checkState(data[i].tuan1)}</td><td>${checkState(data[i].tuan2)}</td><td>${checkState(data[i].tuan3)}</td>` +
                            `<td>${checkState(data[i].tuan4)}</td><td>${checkState(data[i].tuan5)}</td><td>${checkState(data[i].tuan6)}</td><td>${checkState(data[i].tuan7)}</td><td>${checkState(data[i].tuan8)}</td>` +
                            `<td>${checkState(data[i].tuan9)}</td><td>${checkState(data[i].tuan10)}</td><td>${checkState(data[i].tuan11)}</td><td>${checkState(data[i].tuan12)}</td><td>${checkState(data[i].tuan13)}</td>` +
                            `<td>${checkState(data[i].tuan14)}</td><td>${checkState(data[i].tuan15)}</td><td>${checkState(data[i].tuan16)}</td><td>${checkState(data[i].tuan17)}</td><td>${checkState(data[i].tuan18)}</td>` +
                            `<td>${checkState(data[i].tuan19)}</td><td>${checkState(data[i].tuan20)}</td></tr>`
                        table.innerHTML += row
                    }
                }

                $(document).on('change', '#makhoa-filter, #namhoc-filter, #hocky-filter', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'put',
                        url: '/student/filter',
                        data: {
                            user: $('#id-user').val(),
                            namhoc: $('#namhoc-filter').val(),
                            hocky: $('#hocky-filter').val()
                        },
                        success: function(response) {
                            console.log(response.data);

                            buildTable(response.data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            //xử lý lỗi tại đây
                        }
                    })

                })
            });

            $('#cboIDDotThongKeKQHT').on('change', function() {
                $('#box-dashboard-thongke-ketquahoctap-theodot').html("");
                $.ajax({
                    url: "/SinhVien/ThongKeKetQuaHocTapTheoDot?pIDDot=" + this.value,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#box-dashboard-thongke-ketquahoctap-theodot').html(data);
                    }
                });
            });
            $('#cboIDDotForLHP').on('change', function() {
                $('#box-dashboard-lophocphan-theodot').html("");
                $.ajax({
                    url: "/SinhVien/DanhSachLopHocPhanTheoDot?pIDDot=" + this.value,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#box-dashboard-lophocphan-theodot').html(data);
                    }
                });
            });

            function popupCapNhatThongTinNganHang() {
                $.ajax({
                    url: "sinh-vien/cap-nhat-thong-tin-ngan-hang.html",
                    type: 'GET',
                    dataType: 'html',
                    data: {

                    },
                    success: function(data) {
                        $('<div class="lightbox-backgrond" onclick="closePopup();"></div><div id="boxes" style="height: inherit !important;"><div id="dialog" class="window" style="height: inherit !important;position: fixed; width:500px; top: 40%; left: 50%; transform: translate(-50%, -50%); display: block;"><a onclick="closePopup()" class="closePopup agree"></a><div class="content" id="popup-content"></div></div></div>')
                            .appendTo(document.body);
                        $('#boxes .content').html(data);
                    },
                });
            }

            function closePopup() {
                $('#mask').hide();
                $('.window').hide();
                $('#boxes').remove();
                $('.lightbox-backgrond').remove();
            };

            function popupWarningKhaoSat() {
                window.location.href = '/sinh-vien/khao-sat.html';
                closePopup();
            };

            function UpdateDaXemNhacNho() {
                $.ajax({
                    url: "/SinhVien/UpdateNgayXemThongBaoNhacNho?pIDTBNN=" + 0,
                    type: 'POST',
                    dataType: 'html',
                    success: function(data) {
                        closePopup();
                        location.reload();
                    }
                });
            };

            function confirmCapNhatThongTinNganHang() {
                $.ajax({
                    url: "/sinh-vien/cap-nhat-thong-tin-ngan-hang.html",
                    type: 'POST',
                    dataType: 'html',
                    data: {

                    },
                    success: function() {
                        closePopup();
                        location.reload();
                    },
                });
            };
        </script>
        <script type="text/javascript" src="lang.js"></script>
        <style>
            ul#footer li {
                display: inline;
            }

        </style>

        <div><input id="ASC-MC" name="ASC-MC" type="hidden" value="WIN-04LJNRVBU7A" /></div>

        <script type="text/javascript" src="/template/teacher/Assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/template/teacher/Assets/js/jquery.nicescroll.min.js"></script>
        <script src="/template/teacher/Assets/js/tooltipster.bundle.min.js"></script>
        <script type="text/javascript" src="/template/teacher/Assets/js/main.js"></script>
</body>

</html>
