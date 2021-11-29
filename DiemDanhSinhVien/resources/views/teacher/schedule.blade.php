<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lịch học, lịch thi theo tuần</title>
    <link rel="shortcut icon" href="/Content/AConfig/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/main.css" />
    <link href="/template/teacher/Assets/css/components.min.css" rel="stylesheet" />
    <link href="/template/teacher/Assets/css/profile.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/css/responsive.css" />
    <link rel="stylesheet" href="/template/teacher/Assets/fonts/fontawesome-free-5.15.4-web/css/all.css" />
    <script type="text/javascript" src="/template/teacher/Assets/js/jquery-3.4.1.min.js"></script>
    <link href="/template/teacherkendo.cms.min.css" rel="stylesheet" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-184858033-7"></script>
    {{--  --}}
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-184858033-7");
    </script>
</head>

<body>
    <input id="UID" name="UID" type="hidden" value="21" />
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

                    <div class="search-bar">
                        <form action="#">
                            <input type="text" id="k" name="k" placeholder="Tìm kiếm..." required>
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>

                    <div class="user-account dropdown">
                        <div class="user-info" data-toggle="dropdown">
                            <img class="user-account-img" src="/images/{{ $user[0]->anh }}" style="width:
                                30px;height: 30px;border-radius: 50%
                                !important;object-fit: cover;" />
                            <a class="user-account-name" href="#" title="">{{ $user[0]->tensv }}</a>
                            <i class="fa fa-caret-down
                                        user-account-name-caret-down"
                                aria-hidden="true"></i>
                        </div>
                        <div class="user-account-info dropdown-menu pull-right">
                            <ul class="us-links">
                                <li><a href="#" title="">Thông tin cá nhân</a></li>
                                <li><a title="" onclick="popupDoiMatKhau()">Đổi mật khẩu</a></li>
                                <li><a href="#" title="">Đăng xuất</a></li>
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

                            <li>
                                <a id="spanBell" href="#" title="">
                                    <div id="tinTuc" lang="tin-tuc">
                                        <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp&nbspTin
                                        tức
                                    </div>
                                </a>
                            </li>
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

        <!-- Content -->
        <div class="main-content">
            <div class="container" id="full-resize-table">
                <div class="main-section-content" id="contnet">
                    <div class="row">
                        <!-- Menu Left -->
                        <div class="col-md-2 hidden-xs">
                            <div class="box-df p-0">
                                <div id="accordion-menu" class="accordion-menu">
                                    <ul>
                                        <li>
                                            <a href="#" title=""><i class="fa fa-home" aria-hidden="true"></i>TRANG
                                                CHỦ</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title=""><i class="fa fa-tv"
                                                    aria-hidden="true"></i>THÔNG TIN
                                                CHUNG</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Th&#244;ng tin sinh vi&#234;n</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Đề xuất cập nhật th&#244;ng tin</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Dịch vụ trực tuyến</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Ghi ch&#250; nhắc nhở</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Cập nhật th&#244;ng tin BHYT</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Khảo s&#225;t sự kiện</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title=""><i class="fa fa-mortar-board"
                                                    aria-hidden="true"></i>HỌC TẬP</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Kết quả học tập</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Lịch theo tuần</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Lịch theo tiến độ</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Th&#244;ng tin điểm danh</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Kết quả r&#232;n luyện</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title="">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>ĐĂNG KÝ HỌC PHẦN
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Chương trình khung</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a target="_blank" href="#">Đăng k&#253; học phần</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Đăng k&#253; m&#244;n học điều kiện</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title="">
                                                <i class="fab fa-cc-visa" aria-hidden="true"></i>HỌCPHÍ</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Tra cứu c&#244;ng nợ</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Thanh to&#225;n trực tuyến</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Thanh to&#225;n nội tr&#250;</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Phiếu thu tổng hợp</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Phiếu thu trực tuyến</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title=""><i class="fa fa-cog"
                                                    aria-hidden="true"></i>KH&#193;C</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Hộp thư sinh vi&#234;n</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title=""><i class="fa fa-building"
                                                    aria-hidden="true"></i>K&#221; T&#218;C X&#193;</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Đăng k&#253; nội tr&#250;</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Tra cứu c&#244;ng nợ nội tr&#250;</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Tra cứu kết quả r&#232;n luyện</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Tra cứu th&#244;ng tin ph&#242;ng giường</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Tra cứu nội dung đ&#227; đăng k&#253;</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Gia hạn đăng k&#253; nội tr&#250;</a>
                                                </li>
                                            </ul>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">Khai b&#225;o hư hỏng t&#224;i sản</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <script>
                                            function openLienKet(e) {
                                                window.open($(e).attr("data-link"), "_blank");
                                            }
                                        </script>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="col-md-10 col-xs-12">
                            <div class="box-df">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold" lang="lichtheotuan-pagetitle">Lịch học,
                                                lịch thi theo tuần</span>
                                        </div>
                                        <div class="actions">
                                            <div class="mt-radio-inline" style="
                            width: 255px;
                            float: left;
                            padding: 5px 0px 0px 0px;
                          ">
                                                <label class="mt-radio"
                                                    style="padding-left: 25px; margin-bottom: 0px">
                                                    <input id="rdoLoaiLich" name="rdoLoaiLich" type="radio" value="0" />
                                                    <label lang="lichtheotuan-tatca">Tất cả</label>
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio"
                                                    style="padding-left: 25px; margin-bottom: 0px">
                                                    <input checked="checked" id="rdoLoaiLich" name="rdoLoaiLich"
                                                        type="radio" value="1" />
                                                    <label lang="lichtheotuan-lichhoc">Lịch học</label>
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio"
                                                    style="padding-left: 25px; margin-bottom: 0px">
                                                    <input id="rdoLoaiLich" name="rdoLoaiLich" type="radio" value="2" />
                                                    <label lang="lichtheotuan-lichthi">Lịch thi</label>
                                                    <span></span>
                                                </label>
                                            </div>
                                            <input id="dateNgayXemLich" name="dateNgayXemLich" type="text"
                                                value="27/11/2021" />
                                            <script>
                                                jQuery(function() {
                                                    jQuery("#dateNgayXemLich").kendoDatePicker({
                                                        format: "dd/MM/yyyy",
                                                        min: new Date(1900, 0, 1, 0, 0, 0, 0),
                                                        max: new Date(2099, 11, 31, 0, 0, 0, 0),
                                                    });
                                                });
                                            </script>
                                            <a href="javascript:;" class="btn btn-action" id="btn_HienTai"
                                                lang="lichtheotuan-hientai-button">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                Hiện tại
                                            </a>
                                            <a href="javascript:;" class="btn btn-action" id="btn_InLich"
                                                onclick="PrintElem()" lang="lichtheotuan-print-button">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                                In lịch
                                            </a>
                                            <a href="javascript:;" class="btn btn-action" id="btn_TroVe"
                                                lang="lichtheotuan-back-button">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                Trở về
                                            </a>
                                            <a href="javascript:;" class="btn btn-action" id="btn_Tiep"
                                                lang="lichtheotuan-next-button">
                                                Tiếp
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Lịch ở đây -->
                                    <div id="viewLichTheoTuan">
                                        <table style="text-align:center;" class="table table-bordered table-striped"
                                            width="100%" role="grid">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px"></th>
                                                    <th>Thứ 2</th>
                                                    <th>Thứ 3</th>
                                                    <th>Thứ 4</th>
                                                    <th>Thứ 5</th>
                                                    <th>Thứ 6</th>
                                                    <th>Thứ 7</th>
                                                    <th>Chủ Nhật</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:50px; font-weight: bold;vertical-align: middle;">
                                                        Sáng</td>
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 2)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 3)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 4)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 5)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 6)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 7)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 0 && $lichhoc->thu == 8)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td style="width:50px; font-weight: bold;vertical-align: middle;">
                                                        Chiều</td>
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 2)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 3)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 4)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 5)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 6)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 7)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 1 && $lichhoc->thu == 8)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td style="width:50px; font-weight: bold;vertical-align: middle;">
                                                        Tối</td>
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 2)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 3)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 4)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 5)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 6)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 7)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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
                                                    <td>
                                                        @foreach ($data as $lichhoc)
                                                            @if ($lichhoc->buoi == 2 && $lichhoc->thu == 8)
                                                                <div style="width:100%;" class="content text-left"
                                                                    data-bg="129872" style="text-align: left">
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

                        <script type="text/javascript" src="/template/teacher/Assets/js/lang.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/template/teacher/Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/jquery.nicescroll.min.js"></script>
    <script src="/template/teacher/Assets/js/tooltipster.bundle.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/main.js"></script>
    @include('footer')
</body>

</html>
