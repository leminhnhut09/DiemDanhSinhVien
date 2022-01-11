<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cổng thông tin giảng viên</title>
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
    <script type="text/javascript" src="/template/teacher/Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/jquery.nicescroll.min.js"></script>
    <script src="/template/teacher/Assets/js/tooltipster.bundle.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/main.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-184858033-7');
    </script>
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
                            <img class="user-account-img" src="{{ $user[0]->anh }}" style="width:
                            30px;height: 30px;border-radius: 50%
                            !important;object-fit: cover;" />
                            <a class="user-account-name" href="#" title="">{{ $user[0]->tengv }}</a>
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
                                                Thông tin giảng viên
                                            </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- Infomation student -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="profile-userpic">
                                                    <img src="{{ $user[0]->anh }}" alt="" class="img-responsive"
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
                                                                    lang="sv-mssv">MSGV</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->magv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-lophoc">Mã
                                                                    Khoa</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->makhoa }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-hoten">Họ
                                                                    tên</span>:
                                                                <span class="bold">
                                                                    {{ $user[0]->tengv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-nganh">Tên
                                                                    Khoa</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->tenkhoa }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-gioitinh">Giới
                                                                    tính</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->gioitinh == 0 ? 'Nam' : 'Nữ' }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-ngaysinh">Ngày
                                                                    sinh</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->ngaysinh }}</span></label>
                                                            {{-- <label class="col-xs-6"><span
                                                                    lang="sv-loaihinhdt">Loại
                                                                    hình đào
                                                                    tạo</span>:
                                                                <span class="bold">Ch&#237;nh
                                                                    quy</span></label> --}}
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-noisinh">Nơi
                                                                    sinh</span>:
                                                                <span
                                                                    class="bold">{{ $user[0]->diachi }}</span></label>

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
                                            <a href="{{ route('teacher.statistical.list', ['user' => $user[0]->magv]) }}"
                                                class="color-active" title="">
                                                <div
                                                    class="item-box-menu
                                                        box-df">
                                                    <h3 class="name" lang="db-lichhoctuan">Thống kê</h3>
                                                    <div
                                                        class="desc
                                                            clearfix">
                                                        <div class="number">0</div>
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
                    <script type="text/javascript">
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        function buildcell(data, buoi, thu) {
                            var len = data.length;
                            var html = '<td style="min-height: 150px;"></td>'
                            for (var i = 0; i < len; i++) {
                                if (data[i].buoi == buoi && data[i].thu == thu) {
                                    html =
                                        `<td style="min-height: 150px;">` +
                                        ` <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"` +
                                        ` class="content text-left" data-bg="129872" tyle="text-align: left"> <b><a href="javascript:" target="" ` +
                                        `style="text-decoration: none; color: #003763; text-align:center; display:block;">${data[i].mamh_id }</a></b>` +
                                        `<p style="text-align:center;"><span lang="lichtheotuan-tiet">Tiết:</span> ${data[i].tietbd + ` - ` + data[i].tietkt } </p> ` +
                                        `<p lang="giang-duong" style="text-align:center;"> Phòng: ${data[i].maphong_id } </p>` +
                                        `<div style="width:100%; display:flex; justify-content:center;"> <a class="btn btn-danger"` +
                                        `style="margin-right:0; border-radius: 5px !important;"href="/teacher/attendance/${data[i].mahp_id }">` +
                                        `<i class="fas fa-trash"></i><span style="margin-left: 8px">Điểm danh sinh viên</span></a></div></div></td>`
                                }
                            }
                            return html;
                        }

                        function buildTable(user, status) {
                            console.log(user);
                            if (status == 'current') {
                                $.ajax({
                                    type: 'post',
                                    url: '/teacher/schedule/update',
                                    data: {
                                        data: $('#curentdate').val(),
                                        status: status,
                                        user: user,
                                    },
                                    success: function(response) {
                                        var table = document.getElementById('content-table');
                                        $("#dateNgayXemLich").val(response.data[1][0]);
                                        table.innerHTML =
                                            '<table style="text-align:center;" class="fl-table table table-bordered text-center no-footer dtr-inline" width="100%" role="grid">' +
                                            '<thead><tr><th style="width:50px"></th><th>Thứ 2 <br />' + response.data[1][0] +
                                            '</th><th>Thứ 3 <br /> ' + response.data[1][1] + '</th>' +
                                            '<th>Thứ 4 <br /> ' + response.data[1][2] + '</th><th>Thứ 5 <br /> ' +
                                            response.data[1][3] + '</th><th>Thứ 6 <br /> ' + response.data[1][4] +
                                            '</th><th>Thứ 7 <br /> ' + response.data[1][5] + '</th><th>Chủ Nhật <br /> ' +
                                            response.data[1][6] + '</th></tr></thead>' +
                                            '<tbody style="background: url(/template/teacher/Assets/images/transparent-pattern-square-4.png)">' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Sáng</td>' +
                                            buildcell(response.data[0], 0, 2) + buildcell(response.data[0], 0, 3) + buildcell(
                                                response
                                                .data[0], 0, 4) +
                                            buildcell(response.data[0], 0, 5) + buildcell(response.data[0], 0, 6) + buildcell(
                                                response
                                                .data[0], 0, 7) +
                                            buildcell(response.data[0], 0, 8) + '</tr>' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Chiều</td>' +
                                            buildcell(response.data[0], 1, 2) + buildcell(response.data[0], 1, 3) + buildcell(
                                                response
                                                .data[0], 1, 4) +
                                            buildcell(response.data[0], 1, 5) + buildcell(response.data[0], 1, 6) + buildcell(
                                                response
                                                .data[0], 1, 7) +
                                            buildcell(response.data[0], 1, 8) + '</tr>' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Tối</td>' +
                                            buildcell(response.data[0], 2, 2) + buildcell(response.data[0], 2, 3) + buildcell(
                                                response
                                                .data[0], 2, 4) +
                                            buildcell(response.data[0], 2, 5) + buildcell(response.data[0], 2, 6) + buildcell(
                                                response
                                                .data[0], 2, 7) +
                                            buildcell(response.data[0], 2, 8) + '</tr>' +
                                            '</tbody></table>';
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        //xử lý lỗi tại đây
                                    }
                                })
                            } else {
                                $.ajax({
                                    type: 'post',
                                    url: '/teacher/schedule/update',
                                    data: {
                                        data: $('#dateNgayXemLich').val(),
                                        status: status,
                                        user: user,
                                    },
                                    success: function(response) {
                                        console.log(response.data[0]);
                                        var table = document.getElementById('content-table');
                                        $("#dateNgayXemLich").val(response.data[1][0]);
                                        table.innerHTML =
                                            '<table style="text-align:center;" class="fl-table table table-bordered text-center no-footer dtr-inline" width="100%" role="grid">' +
                                            '<thead><tr><th style="width:50px"></th><th>Thứ 2 <br />' + response.data[1][0] +
                                            '</th><th>Thứ 3 <br /> ' + response.data[1][1] + '</th>' +
                                            '<th>Thứ 4 <br /> ' + response.data[1][2] + '</th><th>Thứ 5 <br /> ' +
                                            response.data[1][3] + '</th><th>Thứ 6 <br /> ' + response.data[1][4] +
                                            '</th><th>Thứ 7 <br /> ' + response.data[1][5] + '</th><th>Chủ Nhật <br /> ' +
                                            response.data[1][6] + '</th></tr></thead>' +
                                            '<tbody style="background: url(/template/teacher/Assets/images/transparent-pattern-square-4.png)">' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Sáng</td>' +
                                            buildcell(response.data[0], 0, 2) + buildcell(response.data[0], 0, 3) + buildcell(
                                                response
                                                .data[0], 0, 4) +
                                            buildcell(response.data[0], 0, 5) + buildcell(response.data[0], 0, 6) + buildcell(
                                                response
                                                .data[0], 0, 7) +
                                            buildcell(response.data[0], 0, 8) + '</tr>' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Chiều</td>' +
                                            buildcell(response.data[0], 1, 2) + buildcell(response.data[0], 1, 3) + buildcell(
                                                response
                                                .data[0], 1, 4) +
                                            buildcell(response.data[0], 1, 5) + buildcell(response.data[0], 1, 6) + buildcell(
                                                response
                                                .data[0], 1, 7) +
                                            buildcell(response.data[0], 1, 8) + '</tr>' +
                                            '<tr><td style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">Tối</td>' +
                                            buildcell(response.data[0], 2, 2) + buildcell(response.data[0], 2, 3) + buildcell(
                                                response
                                                .data[0], 2, 4) +
                                            buildcell(response.data[0], 2, 5) + buildcell(response.data[0], 2, 6) + buildcell(
                                                response
                                                .data[0], 2, 7) +
                                            buildcell(response.data[0], 2, 8) + '</tr>' +
                                            '</tbody></table>';
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        //xử lý lỗi tại đây
                                    }
                                })
                            }
                        }
                    </script>

                    {{-- lịch học --}}
                    <div class="col-md-12 col-xs-12">
                        <div class="box-df">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="lichtheotuan-pagetitle">Lịch dạy
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <div class="mt-radio-inline"
                                            style="width: 255px;float: left;padding: 5px 0px 0px 0px;">
                                        </div>
                                        <input id="dateNgayXemLich" name="dateNgayXemLich" type="text"
                                            value="{{ $ngay }}" />
                                        <script>
                                            jQuery(function() {
                                                jQuery("#dateNgayXemLich").kendoDatePicker({
                                                    format: "dd/MM/yyyy",
                                                    min: new Date(1900, 0, 1, 0, 0, 0, 0),
                                                    max: new Date(2099, 11, 31, 0, 0, 0, 0),
                                                });
                                            });
                                        </script>
                                        <input type="text" id="curentdate" value="{{ $ngay }}" hidden="true" />
                                        <a href="javascript:;" class="btn btn-action" id="btn_HienTai"
                                            onclick="buildTable('{{ $user[0]->magv }}', 'current')">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            Hiện tại
                                        </a>
                                        <a href="javascript:;" class="btn btn-action" id="btn_TroVe"
                                            onclick="buildTable('{{ $user[0]->magv }}', 'prev')"
                                            lang="lichtheotuan-back-button">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            Trở về
                                        </a>
                                        <a href="javascript:;" class="btn btn-action" id="btn_Tiep"
                                            onclick="buildTable('{{ $user[0]->magv }}', 'next')"
                                            lang="lichtheotuan-next-button">
                                            Tiếp
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Lịch ở đây -->
                                <div id="content-table">
                                    <table style="text-align:center;"
                                        class="fl-table table table-bordered text-center no-footer dtr-inline"
                                        width="100%" role="grid">
                                        <thead>
                                            <tr>
                                                <th style="width:50px"></th>
                                                <th>Thứ 2 <br /> {{ $days[0] }}</th>
                                                <th>Thứ 3 <br /> {{ $days[1] }}</th>
                                                <th>Thứ 4 <br /> {{ $days[2] }}</th>
                                                <th>Thứ 5 <br /> {{ $days[3] }}</th>
                                                <th>Thứ 6 <br /> {{ $days[4] }}</th>
                                                <th>Thứ 7 <br /> {{ $days[5] }}</th>
                                                <th>Chủ Nhật <br /> {{ $days[6] }}</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            style="background: url(/template/teacher/Assets/images/transparent-pattern-square-4.png)">
                                            <tr class="table-primary">
                                                <td
                                                    style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">
                                                    Sáng</td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 2)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>

                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 3)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 4)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 5)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 6)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 7)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 8)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">
                                                    Chiều</td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 2)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 3)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 4)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 5)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 6)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 7)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 8)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="width:50px; font-weight: bold;vertical-align: middle; height: 150px;">
                                                    Tối</td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 2)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 3)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 4)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 5)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 6)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 7)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="min-height: 150px;">
                                                    @foreach ($data as $lichhoc)
                                                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 8)
                                                            <div style="width:100%; flex-direction: column;display: flex; min-height: 150px;justify-content: space-around;border-color:#1da1f2; background-color:#92d6ff;"
                                                                class="content text-left" data-bg="129872"
                                                                style="text-align: left">
                                                                <b><a href="javascript:" target=""
                                                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                                                <p style="text-align:center;">
                                                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                                                </p>
                                                                <p lang="giang-duong" style="text-align:center;">
                                                                    Phòng:
                                                                    {{ $lichhoc->maphong_id }}
                                                                </p>


                                                                <div @if (strtotime($lichhoc->ngay) < strtotime($ngay)) class='disableddiv' @endif
                                                                    style="width:100%; display:flex; justify-content:center;">
                                                                    <a class="btn btn-danger"
                                                                        style="margin-right:0; border-radius: 5px !important;"
                                                                        href="/teacher/attendance/{{ $lichhoc->mahp_id }}"
                                                                        onclick="">
                                                                        <i class="fas fa-trash"></i><span
                                                                            style="margin-left: 8px">Điểm danh sinh
                                                                            viên</span>
                                                                    </a>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End lịch ở đây -->
                            </div>
                        </div>
                    </div>
                    {{-- end lịch học --}}


                </div>
            </div>
        </div>
        <script>
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
</body>

</html>
