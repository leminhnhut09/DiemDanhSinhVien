<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thống kê</title>
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

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">

    <!-- ajax -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <!-- Content -->
        <div class="main-content">
            <div class="container" id="full-resize-table">
                <div class="main-section-content" id="contnet">
                    <div class="row">
                        {{-- content --}}
                        <div class="col-md-12 hidden-xs">
                            <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
                            <script>
                                function FilterTable(value, data) {
                                    $.ajax({
                                        type: 'put',
                                        url: '/teacher/filter',
                                        data: {
                                            user: $('#id-user').val(),
                                            khoa: $('#makhoa-filter').val(),
                                            namhoc: $('#namhoc-filter').val(),
                                            hocky: $('#hocky-filter').val()
                                        },
                                        success: function(response) {
                                            console.log(response.data);
                                            var data = searchTable(value, response.data);
                                            buildTable(data);
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            //xử lý lỗi tại đây
                                        }
                                    })
                                }

                                function searchTable(value, data) {
                                    var filter = []
                                    for (var index = 0; index < data.length; index++) {
                                        value = value.toLowerCase();
                                        var name = data[index].mahp_id.toString();
                                        console.log(data[index].mahp_id);
                                        console.log(name);
                                        if (name.includes(value)) {
                                            filter.push(data[index]);
                                        }
                                    }
                                    return filter;
                                    console.log(filter);
                                }

                                function buildTable(data) {
                                    var table = document.getElementById('table-body')
                                    table.innerHTML = ''
                                    for (var i = 0; i < data.length; i++) {
                                        row = '<tr><td style="vertical-align: middle;" id = "mahp-' + data[i].mahp_id +
                                            '-' + data[i].masv + '" > ' +
                                            data[i].mahp_id +
                                            '</td><td style="vertical-align: middle;" id = "tenhp-' +
                                            data[i].mahp_id +
                                            '-' + data[i].masv + '" > ' +
                                            data[i].tenmh +
                                            '</td><td style="vertical-align: middle;" id = "magv-' +
                                            data[i]
                                            .mahp_id +
                                            '-' + data[i].masv_id + '" > ' +
                                            data[i].tengv +
                                            '</td><td style="vertical-align: middle;" id = "masv-' +
                                            data[i]
                                            .mahp_id +
                                            '-' + data[i].masv_id + '" > ' +
                                            data[i].tensv +
                                            '</td><td style="vertical-align: middle;" id = "masv-' +
                                            data[i]
                                            .mahp_id +
                                            '-' + data[i].masv_id + '" > ' +
                                            data[i].namhoc_id +
                                            '</td><td style="vertical-align: middle;" id = "masv-' +
                                            data[i]
                                            .mahp_id +
                                            '-' + data[i].masv_id + '" > ' +
                                            data[i].hocky_id +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan1, 'tuan1', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan2, 'tuan2', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan3, 'tuan3', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan4, 'tuan4', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan5, 'tuan5', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan6, 'tuan6', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan7, 'tuan7', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan8, 'tuan8', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan9, 'tuan9', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan10, 'tuan10', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan11, 'tuan11', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan12, 'tuan12', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan13, 'tuan13', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan14, 'tuan14', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan15, 'tuan15', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan16, 'tuan16', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan17, 'tuan17', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan18, 'tuan18', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan19, 'tuan19', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(data[i].tuan20, 'tuan20', data[i].mahp_id,
                                                data[i].masv_id) +
                                            '</td><td><button data-url="/admin/attendance/edit/' + data[i]
                                            .mahp_id + '/' + data[i].masv_id + '" type="button" ' +
                                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                                            '<button data-url="/admin/attendance/destroy/' + data[i]
                                            .mahp_id + '/' + data[i].masv_id +
                                            '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                                            ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                                        table.innerHTML += row
                                    }
                                }
                                // filter
                                $(document).on('change', '#makhoa-filter, #namhoc-filter, #hocky-filter', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: 'put',
                                        url: '/teacher/filter',
                                        data: {
                                            user: $('#id-user').val(),
                                            khoa: $('#makhoa-filter').val(),
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

                                function ExportToExcel(fileExtension, fn) {
                                    var elt = document.getElementById('tblData');
                                    console.log(elt);
                                    var wb = XLSX.utils.table_to_book(elt, {
                                        sheet: "sheet1"
                                    });
                                    return XLSX.writeFile(wb, fn + "." + fileExtension || ('MySheetName.' + (fileExtension || 'xlsx')));
                                }
                            </script>

                            <div class="container">
                                <input id="id-user" type="text" value="{{ $user[0]->magv }}" style="display: none" />


                                <div style="display: flex; justify-content: space-evenly">
                                    <div class="form-group"
                                        style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                                        <label style="width:auto; margin-right: 10px" for="">Khoa</label>
                                        <select style="width:200px;" name="makhoa" id="makhoa-filter"
                                            class="form-control" required="required">
                                            <option value="All">Tất cả</option>
                                            @foreach ($facultys as $faculty) {
                                                <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}
                                                </option>
                                                }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"
                                        style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                                        <label style="width:auto; margin-right: 10px " for="">Năm học</label>
                                        <select style="width:200px;" name="namhoc" id="namhoc-filter"
                                            class="form-control" required="required">
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
                                        <select style="width:140px;" name="hocky" id="hocky-filter"
                                            class="form-control" required="required">
                                            <option value="All">Tất cả</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:8px">
                                    <div class="col-lg-6" style="display: flex; margin-top: 8px;">
                                        <label for="search-input"
                                            style="display: inline; width: 30%; margin-left: 10px;margin-right: 10px; width:120px; font-size:20px; font-weight:600;">
                                            Tìm kiếm</label>
                                        <input class="form-control" id="search-input"
                                            onKeyup="FilterTable(this.value, {{ $attendances }})" type="text">
                                    </div>
                                </div>

                                <button class="btn btn-primary" style="border-radius: 50px !important; "
                                    onclick="ExportToExcel('xlsx', 'data')">Export danh sách</button>
                                <p style="font-size: 22px;text-align: center;font-weight: bold;">Danh sách điểm danh</p>
                                <div class="table-responsive">
                                    <table id="tblData" style="text-align: center; margin-top: 10px;"
                                        class="table table-striped table-bordered table-hover"
                                        style="display: block; white-space:no-wrap;overflow-x:auto;">
                                        <thead id="headers" class="bg-info">
                                            <tr>
                                                <th style="min-width: 200px;">Mã lớp học phần</th>
                                                <th style="min-width: 200px;">Tên học phần</th>
                                                <th style="min-width: 200px;">Tên giảng viên</th>
                                                <th style="min-width: 200px;">Mã sinh viên</th>
                                                <th style="min-width: 120px;">Năm học</th>
                                                <th style="min-width: 120px;">Học kỳ</th>
                                                <th style="min-width: 100px;">Tuần 1</th>
                                                <th style="min-width: 100px;">Tuần 2</th>
                                                <th style="min-width: 100px;">Tuần 3</th>
                                                <th style="min-width: 100px;">Tuần 4</th>
                                                <th style="min-width: 100px;">Tuần 5</th>
                                                <th style="min-width: 100px;">Tuần 6</th>
                                                <th style="min-width: 100px;">Tuần 7</th>
                                                <th style="min-width: 100px;">Tuần 8</th>
                                                <th style="min-width: 100px;">Tuần 9</th>
                                                <th style="min-width: 100px;">Tuần 10</th>
                                                <th style="min-width: 100px;">Tuần 11</th>
                                                <th style="min-width: 100px;">Tuần 12</th>
                                                <th style="min-width: 100px;">Tuần 13</th>
                                                <th style="min-width: 100px;">Tuần 14</th>
                                                <th style="min-width: 100px;">Tuần 15</th>
                                                <th style="min-width: 100px;">Tuần 16</th>
                                                <th style="min-width: 100px;">Tuần 17</th>
                                                <th style="min-width: 100px;">Tuần 18</th>
                                                <th style="min-width: 100px;">Tuần 19</th>
                                                <th style="min-width: 100px;">Tuần 20</th>
                                                <th style="min-width: 200px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td style="vertical-align: middle;"
                                                        id=" mahp-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->mahp_id }}
                                                    </td>
                                                    <td style="vertical-align: middle;"
                                                        id=" tenhp-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->tenmh }}
                                                    </td>
                                                    <td style="vertical-align: middle;"
                                                        id="magv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->tengv }}
                                                    </td>
                                                    <td style="vertical-align: middle;"
                                                        id="masv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->tensv }}
                                                    </td>
                                                    {{-- edit --}}
                                                    <td style="vertical-align: middle;"
                                                        id="namhoc-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->namhoc_id }}
                                                    </td>
                                                    <td style="vertical-align: middle;"
                                                        id="hocky-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                                        {{ $attendance->hocky_id }}
                                                    </td>
                                                    {{-- end edit --}}
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan1 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        {{-- id="tuan1-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}" {{ $attendance->tuan1 == 'true' ? 'Yes' : 'No' }} --}}
                                                        <img id="tuan1-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan1 == 'true' ? '/icons/check.png' : ($attendance->tuan1 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan2 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan2-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan2 == 'true' ? '/icons/check.png' : ($attendance->tuan2 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan3 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan3-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan3 == 'true' ? '/icons/check.png' : ($attendance->tuan3 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan4 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan4-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan4 == 'true' ? '/icons/check.png' : ($attendance->tuan4 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan5 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan5-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan5 == 'true' ? '/icons/check.png' : ($attendance->tuan5 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan6 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan6-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan6 == 'true' ? '/icons/check.png' : ($attendance->tuan6 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan7 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan7-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan7 == 'true' ? '/icons/check.png' : ($attendance->tuan7 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan8 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan8-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan8 == 'true' ? '/icons/check.png' : ($attendance->tuan8 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan9 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan9-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan9 == 'true' ? '/icons/check.png' : ($attendance->tuan9 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan10 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan10-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan10 == 'true' ? '/icons/check.png' : ($attendance->tuan10 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan11 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan11-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan11 == 'true' ? '/icons/check.png' : ($attendance->tuan11 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan12 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan12-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan12 == 'true' ? '/icons/check.png' : ($attendance->tuan12 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan13 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan13-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan13 == 'true' ? '/icons/check.png' : ($attendance->tuan13 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan14 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan14-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan14 == 'true' ? '/icons/check.png' : ($attendance->tuan14 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan15 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan15-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan15 == 'true' ? '/icons/check.png' : ($attendance->tuan15 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan16 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan16-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan16 == 'true' ? '/icons/check.png' : ($attendance->tuan16 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan17 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan17-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan17 == 'true' ? '/icons/check.png' : ($attendance->tuan17 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan18 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan18-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan18 == 'true' ? '/icons/check.png' : ($attendance->tuan18 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan19 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan19-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan19 == 'true' ? '/icons/check.png' : ($attendance->tuan19 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p hidden="true">
                                                            {{ $attendance->tuan20 == 'true' ? '' : 'V' }}
                                                        </p>
                                                        <img id="tuan20-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                                            style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                                            src="{{ $attendance->tuan20 == 'true' ? '/icons/check.png' : ($attendance->tuan20 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                                            title="ngay" alt="">
                                                    </td>
                                                    <td>
                                                        <button
                                                            data-url="/admin/attendance/edit/{{ $attendance->mahp_id }}/{{ $attendance->masv_id }}"
                                                            ​ type="button" data-target="#edit" data-toggle="modal"
                                                            class="btn btn-warning btn-edit">Sửa</button>
                                                        <button
                                                            data-url="/admin/attendance/destroy/{{ $attendance->mahp_id }}/{{ $attendance->masv_id }}"
                                                            ​ type="button" data-target="#delete" data-toggle="modal"
                                                            class="btn btn-danger btn-delete">Xóa</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- edit --}}
                            <div class="modal fade" id="modal-edit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" id="form-edit" method="POST" role="form">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cập nhật</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="description">Tên học phần</label>
                                                    <select name="mahp" id="mahp-edit" class="form-control"
                                                        required="required">
                                                        @foreach ($terms as $term){
                                                            <option value="{{ $term->mahp }}">{{ $term->mahp }}-
                                                                {{ $term->tenmh }} - {{ $term->tengv }}</option>
                                                            }
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Tên sinh viên</label>
                                                    <select name="masv" id="masv-edit" class="form-control"
                                                        required="required">
                                                        @foreach ($students as $student){
                                                            <option value="{{ $student->masv }}">
                                                                {{ $student->masv }}-
                                                                {{ $student->tensv }}</option>
                                                            }
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 1</label>
                                                        <input style="width:40px;" name="tuan1" type="checkbox"
                                                            class="form-control" id="tuan1-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px; justify-items: flex-end">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 2</label>
                                                        <input style="width:40px;" name=" tuan2" type="checkbox"
                                                            class="form-control" id="tuan2-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 3</label>
                                                        <input style="width:40px;" name="tuan3" type="checkbox"
                                                            class="form-control" id="tuan3-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 4</label>
                                                        <input style="width:40px;" name=" tuan4" type="checkbox"
                                                            class="form-control" id="tuan4-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 5</label>
                                                        <input style="width:40px;" name="tuan5" type="checkbox"
                                                            class="form-control" id="tuan5-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 6</label>
                                                        <input style="width:40px;" name=" tuan6" type="checkbox"
                                                            class="form-control" id="tuan6-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 7</label>
                                                        <input style="width:40px;" name="tuan7" type="checkbox"
                                                            class="form-control" id="tuan7-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 8</label>
                                                        <input style="width:40px;" name=" tuan8" type="checkbox"
                                                            class="form-control" id="tuan8-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 9</label>
                                                        <input style="width:40px;" name="tuan9" type="checkbox"
                                                            class="form-control" id="tuan9-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 10</label>
                                                        <input style="width:40px;" name=" tuan10" type="checkbox"
                                                            class="form-control" id="tuan10-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 11</label>
                                                        <input style="width:40px;" name="tuan11" type="checkbox"
                                                            class="form-control" id="tuan11-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 12</label>
                                                        <input style="width:40px;" name=" tuan12" type="checkbox"
                                                            class="form-control" id="tuan12-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 13</label>
                                                        <input style="width:40px;" name="tuan13" type="checkbox"
                                                            class="form-control" id="tuan13-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 14</label>
                                                        <input style="width:40px;" name=" tuan14" type="checkbox"
                                                            class="form-control" id="tuan14-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 15</label>
                                                        <input style="width:40px;" name="tuan15" type="checkbox"
                                                            class="form-control" id="tuan15-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 16</label>
                                                        <input style="width:40px;" name=" tuan16" type="checkbox"
                                                            class="form-control" id="tuan16-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 17</label>
                                                        <input style="width:40px;" name="tuan17" type="checkbox"
                                                            class="form-control" id="tuan17-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 18</label>
                                                        <input style="width:40px;" name=" tuan18" type="checkbox"
                                                            class="form-control" id="tuan18-edit">
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center;">
                                                        <label style="width:60px; margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 19</label>
                                                        <input style="width:40px;" name="tuan19" type="checkbox"
                                                            class="form-control" id="tuan19-edit">
                                                    </div>
                                                    <div class="form-group"
                                                        style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                                        <label style="width:60px;margin-right: 40px; margin-top:6px;"
                                                            for="">Tuần 20</label>
                                                        <input style="width:40px;" name=" tuan20" type="checkbox"
                                                            class="form-control" id="tuan20-edit">
                                                    </div>
                                                </div>

                                                @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                                                        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                                                        crossorigin="anonymous">
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"
                                                        charset="utf-8" async defer></script>
                            <script type="text/javascript" charset="utf-8">
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                            </script>


                            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
                            <script type="text/javascript">
                                function addText(tuan, ten, mahp, masv) {
                                    var id = `id = "${ten}-${mahp}-${masv}"`;
                                    var link = tuan == 'true' ? '/icons/check.png' : tuan == 'false' ? '/icons/nocheck.png' : '/icons/null.png';
                                    var state = tuan == 'true' ? '' : tuan == 'false' ? 'V' : '';
                                    return ` <p hidden="true">${state}</p>` +
                                        `<img ${id} style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                            src="${link}" title="ngay" alt=""> `;
                                }

                                function getLink(data) {
                                    return data == 'true' ? '/icons/check.png' : data == 'false' ? '/icons/nocheck.png' : '/icons/null.png';
                                }

                                $(document).ready(function() {

                                    // năm học
                                    $(document).on('change', '#namhoc-add', function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'put',
                                            url: '/admin/attendance/namhoc',
                                            data: {
                                                namhoc: $('#namhoc-add').val(),
                                                hocky: $('#hocky-add').val(),
                                                khoa: $('#khoa-add').val()
                                            },
                                            success: function(response) {
                                                console.log(response.data);
                                                var $select = $('#mahp-add');
                                                $select.find('option').remove();
                                                $.each(response.data, function(key, value) {
                                                    $select.append('<option value=' + value.mahp + '>' + value
                                                        .mahp + '-' + value
                                                        .tenmh + '-' + value
                                                        .tengv +
                                                        '</option>');
                                                });
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                //xử lý lỗi tại đây
                                            }
                                        })

                                    })
                                    // học kỳ
                                    $(document).on('change', '#hocky-add', function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'put',
                                            url: '/admin/attendance/hocky',
                                            data: {
                                                namhoc: $('#namhoc-add').val(),
                                                hocky: $('#hocky-add').val(),
                                                khoa: $('#khoa-add').val()
                                            },
                                            success: function(response) {
                                                console.log(response.data);
                                                var $select = $('#mahp-add');
                                                $select.find('option').remove();
                                                $.each(response.data, function(key, value) {
                                                    $select.append('<option value=' + value.mahp + '>' + value
                                                        .mahp + '-' + value
                                                        .tenmh + '-' + value
                                                        .tengv +
                                                        '</option>');
                                                });
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                //xử lý lỗi tại đây
                                            }
                                        })
                                    })
                                    // khoa
                                    $(document).on('change', '#khoa-add', function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'put',
                                            url: '/admin/attendance/khoa',
                                            data: {
                                                namhoc: $('#namhoc-add').val(),
                                                hocky: $('#hocky-add').val(),
                                                khoa: $('#khoa-add').val()
                                            },
                                            success: function(response) {
                                                console.log(response.data);
                                                var $select = $('#mahp-add');
                                                $select.find('option').remove();
                                                $.each(response.data, function(key, value) {
                                                    $select.append('<option value=' + value.mahp + '>' + value
                                                        .mahp + '-' + value
                                                        .tenmh + '-' + value
                                                        .tengv +
                                                        '</option>');
                                                });
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                //xử lý lỗi tại đây
                                            }
                                        })

                                    })


                                    $('#form-add').submit(function(e) {
                                        e.preventDefault();
                                        var url = $(this).attr('data-url');
                                        $.ajax({
                                            type: 'post',
                                            url: url,
                                            data: {
                                                mahp: $('#mahp-add').val(),
                                                masv: $('#masv-add').val(),
                                                tuan1: $('#tuan1-add').prop("checked"),
                                                tuan2: $('#tuan2-add').prop("checked"),
                                                tuan3: $('#tuan3-add').prop("checked"),
                                                tuan4: $('#tuan4-add').prop("checked"),
                                                tuan5: $('#tuan5-add').prop("checked"),
                                                tuan6: $('#tuan6-add').prop("checked"),
                                                tuan7: $('#tuan7-add').prop("checked"),
                                                tuan8: $('#tuan8-add').prop("checked"),
                                                tuan9: $('#tuan9-add').prop("checked"),
                                                tuan10: $('#tuan10-add').prop("checked"),
                                                tuan11: $('#tuan11-add').prop("checked"),
                                                tuan12: $('#tuan12-add').prop("checked"),
                                                tuan13: $('#tuan13-add').prop("checked"),
                                                tuan14: $('#tuan14-add').prop("checked"),
                                                tuan15: $('#tuan15-add').prop("checked"),
                                                tuan16: $('#tuan16-add').prop("checked"),
                                                tuan17: $('#tuan17-add').prop("checked"),
                                                tuan18: $('#tuan18-add').prop("checked"),
                                                tuan19: $('#tuan19-add').prop("checked"),
                                                tuan20: $('#tuan20-add').prop("checked"),
                                            },
                                            success: function(response) {
                                                toastr.success(response.message)
                                                $('#modal-add').modal('hide');
                                                $('tbody').prepend(
                                                    '<tr><td style="vertical-align: middle;" id = "mahp-' + response
                                                    .data.mahp_id +
                                                    '-' + response.data.masv + '" > ' +
                                                    response.data.mahp_id +
                                                    '</td><td style="vertical-align: middle;" id = "tenhp-' +
                                                    response
                                                    .data.mahp_id +
                                                    '-' + response.data.masv + '" > ' +
                                                    response.data.tenmh +
                                                    '</td><td style="vertical-align: middle;" id = "magv-' +
                                                    response
                                                    .data
                                                    .mahp_id +
                                                    '-' + response.data.masv_id + '" > ' +
                                                    response.data.tengv +
                                                    '</td><td style="vertical-align: middle;" id = "masv-' +
                                                    response
                                                    .data
                                                    .mahp_id +
                                                    '-' + response.data.masv_id + '" > ' +
                                                    response.data.tensv +
                                                    '</td><td style="vertical-align: middle;" id = "masv-' +
                                                    response
                                                    .data
                                                    .mahp_id +
                                                    '-' + response.data.masv_id + '" > ' +
                                                    response.data.namhoc_id +
                                                    '</td><td style="vertical-align: middle;" id = "masv-' +
                                                    response
                                                    .data
                                                    .mahp_id +
                                                    '-' + response.data.masv_id + '" > ' +
                                                    response.data.hocky_id +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan1, 'tuan1', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan2, 'tuan2', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan3, 'tuan3', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan4, 'tuan4', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan5, 'tuan5', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan6, 'tuan6', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan7, 'tuan7', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan8, 'tuan8', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan9, 'tuan9', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan10, 'tuan10', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan11, 'tuan11', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan12, 'tuan12', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan13, 'tuan13', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan14, 'tuan14', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan15, 'tuan15', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan16, 'tuan16', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan17, 'tuan17', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan18, 'tuan18', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan19, 'tuan19', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td style="vertical-align: middle;">' +
                                                    addText(response.data.tuan20, 'tuan20', response.data.mahp_id,
                                                        response.data.masv_id) +
                                                    '</td><td><button data-url="/admin/attendance/edit/' + response
                                                    .data
                                                    .mahp_id + '/' + response.data.masv_id + '" type="button" ' +
                                                    'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                                                    '<button data-url="/admin/attendance/destroy/' + response.data
                                                    .mahp_id + '/' + response.data.masv_id +
                                                    '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                                                    ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                                                );
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                //xử lý lỗi tại đây
                                                console.log('err');
                                            }
                                        })
                                    })

                                    $(document).on('click', '.btn-edit', function(e) {
                                        var url = $(this).attr('data-url');
                                        console.log("Hello");
                                        console.log(url);
                                        $('#modal-edit').modal('show');
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'get',
                                            url: url,
                                            success: function(response) {
                                                console.log('response');
                                                console.log(response.data.tuan1);

                                                $('#mahp-edit').val(response.data.mahp_id);
                                                $('#masv-edit').val(response.data.masv_id);
                                                $('#tuan1-edit').prop("checked", response.data.tuan1 == 'true' ? true :
                                                    false);
                                                $('#tuan2-edit').prop("checked", response.data.tuan2 == 'true' ? true :
                                                    false);
                                                $('#tuan3-edit').prop("checked", response.data.tuan3 == 'true' ? true :
                                                    false);
                                                $('#tuan4-edit').prop("checked", response.data.tuan4 == 'true' ? true :
                                                    false);
                                                $('#tuan5-edit').prop("checked", response.data.tuan5 == 'true' ? true :
                                                    false);
                                                $('#tuan6-edit').prop("checked", response.data.tuan6 == 'true' ? true :
                                                    false);
                                                $('#tuan7-edit').prop("checked", response.data.tuan7 == 'true' ? true :
                                                    false);
                                                $('#tuan8-edit').prop("checked", response.data.tuan8 == 'true' ? true :
                                                    false);
                                                $('#tuan9-edit').prop("checked", response.data.tuan9 == 'true' ? true :
                                                    false);
                                                $('#tuan10-edit').prop("checked", response.data.tuan10 == 'true' ?
                                                    true : false);
                                                $('#tuan11-edit').prop("checked", response.data.tuan11 == 'true' ?
                                                    true : false);
                                                $('#tuan12-edit').prop("checked", response.data.tuan12 == 'true' ?
                                                    true : false);
                                                $('#tuan13-edit').prop("checked", response.data.tuan13 == 'true' ?
                                                    true : false);
                                                $('#tuan14-edit').prop("checked", response.data.tuan14 == 'true' ?
                                                    true : false);
                                                $('#tuan15-edit').prop("checked", response.data.tuan15 == 'true' ?
                                                    true : false);
                                                $('#tuan16-edit').prop("checked", response.data.tuan16 == 'true' ?
                                                    true : false);
                                                $('#tuan17-edit').prop("checked", response.data.tuan17 == 'true' ?
                                                    true : false);
                                                $('#tuan18-edit').prop("checked", response.data.tuan18 == 'true' ?
                                                    true : false);
                                                $('#tuan19-edit').prop("checked", response.data.tuan19 == 'true' ?
                                                    true : false);
                                                $('#tuan20-edit').prop("checked", response.data.tuan20 == 'true' ?
                                                    true : false);
                                                $('#form-edit').attr('data-url',
                                                    '{{ asset('/admin/attendance/edit') }}/' +
                                                    response.data.mahp_id + '/' + response.data.masv_id);
                                            },
                                            error: function(error) {}
                                        })
                                    })

                                    $('#form-edit').submit(function(e) {
                                        e.preventDefault();
                                        var url = $(this).attr('data-url');
                                        $.ajax({
                                            type: 'put',
                                            url: url,
                                            data: {
                                                mahp: $('#mahp-edit').val(),
                                                masv: $('#masv-edit').val(),
                                                tuan1: $('#tuan1-edit').prop("checked"),
                                                tuan2: $('#tuan2-edit').prop("checked"),
                                                tuan3: $('#tuan3-edit').prop("checked"),
                                                tuan4: $('#tuan4-edit').prop("checked"),
                                                tuan5: $('#tuan5-edit').prop("checked"),
                                                tuan6: $('#tuan6-edit').prop("checked"),
                                                tuan7: $('#tuan7-edit').prop("checked"),
                                                tuan8: $('#tuan8-edit').prop("checked"),
                                                tuan9: $('#tuan9-edit').prop("checked"),
                                                tuan10: $('#tuan10-edit').prop("checked"),
                                                tuan11: $('#tuan11-edit').prop("checked"),
                                                tuan12: $('#tuan12-edit').prop("checked"),
                                                tuan13: $('#tuan13-edit').prop("checked"),
                                                tuan14: $('#tuan14-edit').prop("checked"),
                                                tuan15: $('#tuan15-edit').prop("checked"),
                                                tuan16: $('#tuan16-edit').prop("checked"),
                                                tuan17: $('#tuan17-edit').prop("checked"),
                                                tuan18: $('#tuan18-edit').prop("checked"),
                                                tuan19: $('#tuan19-edit').prop("checked"),
                                                tuan20: $('#tuan20-edit').prop("checked")
                                            },
                                            success: function(response) {
                                                toastr.success(response.message)
                                                $('#modal-edit').modal('hide');

                                                $('#mahp-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .text(response.data.mahp_id)
                                                $('#magv-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .text(response.data.tengv)
                                                $('#masv-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .text(response.data.tensv)
                                                $('#tuan1-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan1))
                                                $('#tuan2-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan2))
                                                $('#tuan3-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan3))
                                                $('#tuan4-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan4))
                                                $('#tuan5-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan5))
                                                $('#tuan6-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan6))
                                                $('#tuan7-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan7))
                                                $('#tuan8-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan8))
                                                $('#tuan9-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan9))
                                                $('#tuan10-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan10))
                                                $('#tuan11-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan11))
                                                $('#tuan12-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan12))
                                                $('#tuan13-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan13))
                                                $('#tuan14-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan14))
                                                $('#tuan15-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan15))
                                                $('#tuan16-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan16))
                                                $('#tuan17-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan17))
                                                $('#tuan18-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan18))
                                                $('#tuan19-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan19))
                                                $('#tuan20-' + response.data.mahp_id + '-' + response.data.masv)
                                                    .attr('src', getLink(response.data.tuan20))
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                //xử lý lỗi tại đây
                                            }
                                        })
                                    })
                                    $(document).on('click', '.btn-delete', function() {
                                        var url = $(this).attr('data-url');
                                        var _this = $(this);
                                        if (confirm('Bạn có muốn xóa không?')) {
                                            $.ajax({
                                                type: 'delete',
                                                url: url,
                                                success: function(response) {
                                                    toastr.success('Xóa điểm danh thành công!')
                                                    _this.parent().parent().remove();
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) {
                                                    toastr.success('Xóa điểm danh thất bại!')
                                                }
                                            })
                                        }
                                    })
                                })
                            </script>
                        </div>
                        {{-- endcontent --}}

                        <script type="text/javascript" src="/template/teacher/Assets/js/lang.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>

    <!-- Load main.js -->
    <script src="/template/admin/js/main.js"></script>

    <script type="text/javascript" src="/template/teacher/Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/jquery.nicescroll.min.js"></script>
    <script src="/template/teacher/Assets/js/tooltipster.bundle.min.js"></script>
    <script type="text/javascript" src="/template/teacher/Assets/js/main.js"></script>
    @include('footer')
</body>

</html>
