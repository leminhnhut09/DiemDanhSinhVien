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
                            <img class="user-account-img" src="/images/{{ $data[0]->anh }}" style="width:
                            30px;height: 30px;border-radius: 50%
                            !important;object-fit: cover;" />
                            <a class="user-account-name" href="#" title="">{{ $data[0]->tengv }}</a>
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
                                                    <img src="/images/{{ $data[0]->anh }}" alt=""
                                                        class="img-responsive" style="object-fit:cover;">
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
                                                                    class="bold">{{ $data[0]->magv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-lophoc">Mã
                                                                    Khoa</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->makhoa }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-hoten">Họ
                                                                    tên</span>:
                                                                <span class="bold">
                                                                    {{ $data[0]->tengv }}</span></label>
                                                            <label class="col-xs-6"><span lang="sv-nganh">Tên
                                                                    Khoa</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->tenkhoa }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-gioitinh">Giới
                                                                    tính</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->gioitinh == 0 ? 'Nam' : 'Nữ' }}</span></label>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <label class="col-xs-6"><span lang="sv-ngaysinh">Ngày
                                                                    sinh</span>:
                                                                <span
                                                                    class="bold">{{ $data[0]->ngaysinh }}</span></label>
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
                                                                    class="bold">{{ $data[0]->diachi }}</span></label>

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
                                            <a href="{{ route('teacher.store', ['user' => $data[0]->magv]) }}"
                                                class="color-active" title="">
                                                <div
                                                    class="item-box-menu
                                                        box-df">
                                                    <h3 class="name" lang="db-lichhoctuan">Lịch
                                                        học trong tuần</h3>
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

                    <!-- List column methods -->
                    <div class="featured">
                        <div class="featured-item">
                            <a href="#" title="Ghi chú nhắc nhở" langid="menusinhvien-6-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAYCAYAAADpnJ2CAAABl0lEQVRIie3WP2sVQRSG8d9cNwn+6Qy2goU2io0YtLAXQWJhKbiFVinUTrCzUARt1DTCTuEHECttk3SCja1lUGwURBSTaMZid8MS7nXnRpNCfGFhZ8+885w9e2bYoEoydQ/nEdCa2vsXqXQ9Z5EiE/YQc3jWgXV1LUTTqXTpbwEv4Amubg6kkhDN4zL5wEM4YHj2CZM4ilPqMm4oRAnHEUJ0cnO8nYaPqfQ2qNJt3OpJbBW7mmuYfuIHpnrWeRBUKeEmno7IDr43scnfJLSO3SPiCbN41JZ0Ce96shu+Upk3L0SLMGjG+7cCG1PTWG+B47xdwF3cN7rEw7SMQYE1XMFMhukrbuCwuknOhegO9mZ4j2AlqNIXdXetGd001B9+T3PfzlvFBL5leAusFNiHs3iZkeUZLOCYunMnMJtKz/uMITqNpbZLcw/URTzGm2Ycc2BdtcC+DdvVHKL6EHg1hm+qCxxXr7fo29iHO6b/wH8HmP1j8wdKXeD7HQAuYxBU6TM+qU+R7dQMDhY4gfnmwXaVNuADLv4Co1ZbwkqTYWcAAAAASUVORK5CYII="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-6">Nhắc nhở</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Kết quả học
                                    tập" langid="menusinhvien-7-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAACdElEQVRIib3WSahOYRwG8N+RoUghs40hazJ0S6YbSuKKpCzIEYVYKDYWhlKElGsoC06mWFGmkmlPGUpZWAklESHcDMfifT+Oe+/3Odz7eep03nP+b+/z/p//8w6JY7mOIE/b/59keuIqJuMuGvPUuy4dYquNKxiDpRiCm1BPwgbsy1OnsAPjoWsdCW9ja5KZiDk4RPkMh2I5RpTpnGR2YSoOYzh25Kl1lMtwOm7ha+w/WzBDNbLd2IT5eepC63iZDM8JBuiGE7QdJMn0iu89kaypPbKyhF/wMbYfojue4CAak8wtfEgyT7AR8/LUxWqD/YlwBQZiEd5jN9biIuYLVh+KZUhwJ09dqjVgrRoejYRrcA0LcAP3YnwdcpzOUyeTTG/RiZBkVmExBuMVzuep5iLhDCyJg6/EzPjciPG97UxqJ7YnmQYF60c044NguAbsR3NF0mW4jiacxRQMKpBVw+b4jFKwfkQLtuSpxdgQv39KehxHsBpbsB4v/0AG8tTOmGlrtAhywrDWhM8xLgYmaVvbvvHfV7wpM5FqqEg6C6PxDNPQWOhzRij6S7ymuuX/hvCRYP9Z6I/7hT5NuIy5OB3f/4yidF8E47RGi2Cey+iNhYXYqiRra/1ahGV3mn6xPUCoYwXNGCsoNFKwfk109Dxs1/q1UJG0n2CanviMx4JEZQjbWL8M4Xnh/PouZH1PWCadjoqkE3BAmOU24S5SF1QIPwmL/wWe+nUc1Y3wm1A/6CVIW1fC/4Zihm9j+7XfM+zUWFfhvjhEuCE/EM7FPsLlSZlYkv2KJVnN2ITEsfyBsEt0jxP4JqzFSk0/okcnxFrw9AcL/rqKbZW/OQAAAABJRU5ErkJggg=="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-7">Kết quả học
                                        tập</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Lịch theo
                                    tuần" langid="menusinhvien-8-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAACWUlEQVRIiaXWS6hNYRgG4Geds3NPqHOOMKPcSso9nYwwITOFDPYhSScDZSAGDAyZmBhZGBgxEEUpJZESCrmLk5Brromjswz+f2fb1lr7XN7Junzv/t71/f+33+9PHMkU4CCmYG0RAbJquCapo/iSVW3P41VKcszHtDKRBizB26JgTWgiUsxBgk5ciT9sw83I/a/8JNWHRZH/PklNwvUYfoCurKqnEkVe4z4O4Cs+oAPt+I598QOSBp2a8OfIbcEX7MUYbMTzJDUtcSS7heGY1ZDkqrB07UXLwT979BTvsqrFDRVfQ1sFc7E0J8cOjC4TaUAXenPeb8adCn7jXg7h2gBEZFWXCkIP8LmCXziMlwNJXEOSNqW0I6mgDwsw0/+bPVRkGFUTGoYVeDqoTNXyeJLqwMOWqNo2GJF+op3Q99BaQhyP6UXBJNWapKXd2VovVIRuwR1u4obwJ6zHFPRgQ5M8pUKrcAibsBCTcLEuPgsvMFk/mqjMVLfgLo7H5048jkkznMOpKDR5KEJbBc+roRsf/fW31bgdP2bkUIReYTbOYgLGYkZd/Ha8jhfcpRTNmuERThCGGlbmcJqKUF7RemGpdsfnCzgj2NWv/iSvR1lFG4QNr2FEAa8X75oJlVXUhSe4LLj7Fuz3t5ptwryaiu1xsp7Mqvmu3yK0a95SvBEc4Ycwqruxpy4+D8txGs/ifV6b99YqGiZ/YBE6b0VBbBPNTRU/MaoFn7CrKX3w2Im+CtbgknDAOIpvBjCXCgZfbQ6tE/Z2dRIPkMtwDOPkHKmGgO/YnFWd/wNTFIxht3/xrgAAAABJRU5ErkJggg=="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-8">Lịch theo
                                        tuần</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Lịch theo
                                    tiến độ" langid="menusinhvien-9-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAABrklEQVRIic3Wv2sUQRjG8c/GVYPRlEYFUVTE0sLCwsoijYKViJ3b2Po/qJ2FtRZ3jWAKISBEsLC4Io2NgqCNjUiCP2KhSaPe3VjMLsixd7v3I8c9zbLPLO93Z9535p1EI0ATt+yuVkLmZooV3MA1bGEBX3ASH3Es90ZVwBE8TpoW0xx2GQn+4hXu4CHu4gG2+0bL6lGTpu9YncvfX+MnfqCLz7n/CTvDTGeA1iHRCH/wFKvYj4PYwBl8wHEcGhMWcBa3E42wjRS/xWXdDQXsQzsVZ3QFL0aKVD+Hl9AqctgeBTakOkgK4PwUgPMIc5WfTVhpiXca91DrZ5Jm36Eu7ofM+yrgAVzsMzaMOljsNcuCvsOpulHrVmmhqedwJormPNawVzwhBqpP0STi3r4esniGDgJ+wyPsqYJVqIvNXrMMuCm2pVqa+aIpm+ECLohLOk4OO3gTMr+qgOfwUiyacdTGMlpVwLc4YTK9cavXKAN28LVuxJkvmgI4qYvSIO34rwEfnQLwMJIUz/EkNzfyZ+2CGdAPCwUsiRfuVireuJ/l0M6wwBoK4p5eC5mr/wB2R2CZO4fmIgAAAABJRU5ErkJggg=="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-9">Lịch theo
                                        tiến độ</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Chương
                                    tr&#236;nh khung" langid="menusinhvien-14-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAASCAYAAAC0EpUuAAABeUlEQVQ4jZXTPWsUYRQF4Gfi+IFFQAl2Qd2B2KUWAiIpVKI2QuwsZMHaH+FvkCXMgKRMEUhAk0IbCxNIpU0QXS1iZSGKCH5lJ8XMkDfjrjtzurn33HPPe++dqJPm67itHb5gEvGQ3GZcCj7FOqKGoj3sIA1qclzHnarTYzxr4bSHFSz1u4fBJLMbil7DpxZO4TJmk+yI0wWIOmn+FjMtxMbhQ4xLiqGfKLs1wfeSfyqoifCn3/UtxjzmcCYoeo+TmG7p8muS2Yrxogx8LrvlOFeLNZn1oKqrFnUfTwLCHt7g5jil2vYXsTJRfu/XuLnm8w2xT7H9qvgjJkqxC7VYEwxwkeL5t3AVZwPCO8V2z7d0uoqXUSfNKTZ93P+f/EvxvNMj8hH+9rt+xniN2ZaORiLJ7MalYA/LRs9vgEcOb7pyVufcxcPqpNawNcbENq7gVRisndSxUPQBpoZ0r5ArbjbGvTCRZP9wRJ0038CNMS7hN344+jsPw/MDRVBZilfLo0cAAAAASUVORK5CYII="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-14">Chương
                                        tr&#236;nh khung</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a target=_blank href="#" title="Đăng k&#253; học phần" langid="menusinhvien-15-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAYCAYAAADpnJ2CAAADU0lEQVRIia3WbYhWRRQH8N88rlEaBS4lViYWtZDmhzIq6AVJC0wUpFxCyiaK2gRfSkrcKMosrKygFzXIa4EUfjDNisoy2FqhsEhdIi1IV0uxIAV7Mavpw9yN62Ou+1QH7ofLnDn/OXP+538mWJY0aDdjKfqjLUVLG9lca8C3Fd+iwHN4DEtC4ftQuPH/BLwaX+FVbMRQ3IW5GIL1eDkUukNhwn8BvBxdeAffoAWTsKvisydFrRiOz7E2FLaFwthGAC9AJzpwAKPLLLcdLUiKtqdoIkZhN9aFwiehcGlvgOfgPXyKE8sMLyn/+2Qp2pKiK3ExAjaEQkcojOzxCZal4Wgrv12YgzcbADmqhcJVeKpMZgkWB8vSAQzEQ3igr0B9AawAz8aTSDVMxirciddwdqOgvQANDYWVmIe1mNCEd8uvBW/ha7wiU3/PvwRqxhOySOzC2BRt4nDSnC5ndwPGymx7ESc3ADQgFJ7HD3ILxRQNRXMo9OsBvAfbyxP1lxv8VJlE12MfFuH4XoCaQmEBfiqzmp2iQSlaXroswM5QuK+GGRiGD3GoEmcJTpJZOwO/YP4/gLWX++ahPUUDUvR0ndv7sirNruEM3CJr5SFHMnVRmfl8tONX3IppsjA8jIVoStEjdYe5NxQOyoS8PUXNoW5aPIj7cVDWyvqTNuFxzCr/F2NOin6uA2or/QZiYYrm/r1WAl6D23AdTsCjmIn9co1fqAM+Df2ws9qHoTCtBDpFLsncFO0vW2NFitbU8DHelqWIXKtZGITX5dm3RyZQj32HnRWgSaHQjeX4AINT1Jai/ZWYq0NhUw1f4HcMxsRK0B9xk9wuHViJHbi24jMuFLZhtTwthqWoNUV7K4cZX8b4E101RHnG7cUabC2vuJrNFFkYvsQbMqPXy4KxGyNTNDFF3RWgMaGwWdbl38rDTK0nTQuelRt/C+7ABofbKKzAcZiaoo3VxVAYLdfvQnwkP0O6etab6oJtxThcJDO0s9w0E5+VPptxft0+oTACz2CMPNIuS1HnEX7HeERdIVP/PPn6pstaW7Uz5TfOBPkpMj1F644W8Fhvmg6MwHicVQZcJdd8iCzyO+SMJ6fo3N7AOHaG9TZFvrZ9+EPW3LtT9FJfA/wFQAIJ7FVYOrIAAAAASUVORK5CYII="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-15">Đăng
                                        k&#253; học phần</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Tra cứu
                                    c&#244;ng nợ" langid="menusinhvien-20-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAcCAYAAABoMT8aAAAB0UlEQVQ4jZ3VTYjNURgG8N9cN8Og8f0RkZ3FZKhBiYWFWbExZWJBYoWyk2ywoGRhIhbyUSMbZKOUxsaERAlLxCxkJcQdRt0xFu/5c437/WzOR+/7nHOe9znntLg8pgouYBq2VQrIV8vGMsysFlCOYAp2YgM6MQG3cB/9+FwanBuXfA4FnMHS1C9gEU7hE65UIniNvdiPVnThAV5iNSZiD3bgQxr/IXicVpyUdjGa5tsxtWSRS+lIrXiRadCNNZiDn2U0KYeF+IHeHA7jFT7WmQwj+ILTecwS4jSKY5ibx400aBR9hIgn0sTFJkjkUcRGDGAydoszwphQvSKyMt7DOvQIda+jI/WriltqpIfCB4dEWZ9jE2YLU9UkyHASS4T7nmAlnuItDtRDkOEZhjCIFWlHfeJurK+HAOahTdh2i7D1nUTaXQ/B6LjxMLbiPO6irRZBJexL7ZEcjuJgEyQD2JwT9/t4EwTTMZwTpcn7997Xg1U4m8NtofL7BpKH8A79mYhdwv9FbC8J/CrqnqEH38QT0MnfMhYxH1dxDd/xCGuxXLyNBdwUPmhPRP/5YBcWCFELmCHEGhGv8mL04leW0FLjZxoUH0tHpYBaP9MbNarzG3VVYP2cWKHIAAAAAElFTkSuQmCC"
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-20">Tra cứu
                                        c&#244;ng nợ</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Thanh
                                    to&#225;n trực tuyến" langid="menusinhvien-21-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAYCAYAAAD3Va0xAAABpUlEQVQ4jZ3UO2hUURAG4G/NgkoUxSD4AmG1E0vRxhQ+CzsRwTYRRG3sVLCw8YGdjWmMtYIKNhau4KOxsrKUYKUYNERJ1KAmsThzzHLZPat34DLnzsz57//fmXMarduL2/EQO/W3aczhBF7AxGhKNPEMW3AHn7GARsfmZViDw9gasec4hHYuagbIGM70YXMZl7AxgJ7gIJ7mrwkmsNjjybkBfMIOfEB727gDmZGgLr442LG5gR+xXlVhuBlvAmw4A60Of6UgbSj8JnzBd+zHBNpZ2uQ/SHsd/j2+RXwymA5kRivD3wiZndJmYz0ezHPnSB0eRqsq7XxB2hyud4lfxcUsbb4A0M+GWGp/yU7rP2N/21+yWxXf1UqM1uNlx/sMdtVhdB97MYIN0tmaqQPUCn9PGr5rhdqitOP4aWn4agO9wnLp7nmMC9JQ/jcQrMNdHJEmfKQO0B5MScM6K52pc3WA3mI0agZxDDd7Feeu/e6Sm5Ku31MB9qAHxnwn0EKB2e5CDn5loI84ixXBrFEp/Cq1f20lnq/ek5huYh8eSf+jjr3D0T+DjmL+E9i22QAAAABJRU5ErkJggg=="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-21">Thanh
                                        to&#225;n trực tuyến</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Thanh
                                    to&#225;n nội tr&#250;" langid="menusinhvien-22-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAYCAYAAAD3Va0xAAABpUlEQVQ4jZ3UO2hUURAG4G/NgkoUxSD4AmG1E0vRxhQ+CzsRwTYRRG3sVLCw8YGdjWmMtYIKNhau4KOxsrKUYKUYNERJ1KAmsThzzHLZPat34DLnzsz57//fmXMarduL2/EQO/W3aczhBF7AxGhKNPEMW3AHn7GARsfmZViDw9gasec4hHYuagbIGM70YXMZl7AxgJ7gIJ7mrwkmsNjjybkBfMIOfEB727gDmZGgLr442LG5gR+xXlVhuBlvAmw4A60Of6UgbSj8JnzBd+zHBNpZ2uQ/SHsd/j2+RXwymA5kRivD3wiZndJmYz0ezHPnSB0eRqsq7XxB2hyud4lfxcUsbb4A0M+GWGp/yU7rP2N/21+yWxXf1UqM1uNlx/sMdtVhdB97MYIN0tmaqQPUCn9PGr5rhdqitOP4aWn4agO9wnLp7nmMC9JQ/jcQrMNdHJEmfKQO0B5MScM6K52pc3WA3mI0agZxDDd7Feeu/e6Sm5Ku31MB9qAHxnwn0EKB2e5CDn5loI84ixXBrFEp/Cq1f20lnq/ek5huYh8eSf+jjr3D0T+DjmL+E9i22QAAAABJRU5ErkJggg=="
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-22">Thanh
                                        to&#225;n nội tr&#250;</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Phiếu
                                    thu tổng hợp" langid="menusinhvien-23-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAYCAYAAAD3Va0xAAABaElEQVQ4jaXUv0ocURTH8c9mNxKFrZLGRDConQi+gEJiNg+QznqtjC8gWFiJtRjSaB5BSJsNJFY2KdOKCBsRQtgmoMF1N8XehetkrjtDfs059993zu/OnKnMHPTncIQFo9XBNVZxDKfNwUINXzCFD+jiQQ6gh9d4HsZfw7g13FALkPdYH1HNNrYwGUCf0MBn0dP7BWw9QRU/MY8LtGYPvYpBDwuAKpnxM3wPsKW8+0hpLMSnmAj5Cn6jVSsBaof4I2etWwa0hz+YjuZ6WMZMGVAHuznzO9gsc0cpPSb/48tqHRujNhWx9i7E/f8FtRWovIi1vkEPco/NVEXjIV6FeBNi0mYKdBLiYoAM2+NcwkUKNBvlPXebO7fBU6BfUZ5t1lylQGOZvBLlpazVo8P16HDd4J+UBHUz8y8iUCPKX/rX6m0M6mUWvxXIh7oZgi7xFo9CZYUu1+DtVbGGTi2U+xHNgoCszvDmL10iQd6WN1YNAAAAAElFTkSuQmCC"
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-23">Phiếu thu
                                        tổng hợp</span>
                                </div>
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="#" title="Hộp thư sinh viên" langid="menusinhvien-46-title">
                                <div class="box-df">
                                    <div class="icon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAACIklEQVQ4jZXUTYiNYRQH8N877tgg5dsoai6JLCbNnqwkCSXCQl0LzEaZomQrmfKxGWSuFaOmFFlQvjY+CkWzUNRdSIybr5GPxoxxLZ7njrfXvXM59fS8z/uc8z/n/J9zTtLaU9FAduEIpuIbDuJk9bJU+NugqQHgBZxCLzbgLE7g0ni2ucx5BdrQjL2Yhxu4ju+4hTw2ooyj+aIR9JcKbldBklT6K3En4+QDEkxL/fuEX5ie0V1TKriWjXRR3OfgK0bjeUKNDNN3zdHRUgJompftMYKy8CBDcX2rscbuSgWDGMbmfFFSTX8G+jEXA2iNBu0Cd/XkKh7EwJ5jYYx4WQ4Po6cu7E6l24YDqFVzCd6mQGcJZbYaj5PWnkoFi6PSZ0wROP1XyWEEC/ADb3Px4xLu4gt+RuVtMXqZaJO4H0JReLRP8bwcwzkMYllcHwU+4Y1QYvXSfw2lgkq+6Ct2xrty0tpTGcEOgZdj6EbHf6TfhU6hfV+gt0ngpAnHI9ieSMXEBmCJ0GGd2FcqOCxQ0Vwt/tlx78ZT3BPasj2es7IEjzAJq0qFsU5s4U/xj6YM7mMmXuIJNmUA1+KZUCktKUDiI9ebNO+FwXERfbgi8N4nFP1lYdgM1DLOTqmsbMVNnME6oRI6BJrqSjXS8Sb1OWFozI/64wFW0qDvGkQMr/5Bp8yf9PdjcvSU1LOoJfniWISJ2AA5rMd5nP4fsDoyhC2/Ac3ZmT6WouV7AAAAAElFTkSuQmCC"
                                            alt="">
                                    </div>
                                    <span lang="menusinhvien-46">Hộp thư
                                        sinh vi&#234;n</span>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!-- End list column methods -->


                    <!-- Column methods -->
                    <div class="row chart-custom">
                        <div class="col-md-5">
                            <div class="box-df">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span
                                                class="caption-subject
                                                    bold"><a
                                                    href="#" lang="db-kqht">Kết quả
                                                    học tập</a></span>
                                        </div>
                                        <div class="actions">
                                            <select class="form-control" id="cboIDDotThongKeKQHT"
                                                langid="db-hocky-combobox" name="cboIDDotThongKeKQHT"
                                                placeholder="Chọn học kỳ">
                                                <option value="">Chọn học kỳ</option>
                                                <option selected="selected" value="34">HK1 (2021 -
                                                    2022)</option>
                                                <option value="33">HK2 (2020
                                                    - 2021)</option>
                                                <option value="32">HK1 (2020
                                                    - 2021)</option>
                                                <option value="30">HK2 (2019
                                                    - 2020)</option>
                                                <option value="27">HK1 (2019
                                                    - 2020)</option>
                                                <option value="29">HK3 (2018
                                                    - 2019)</option>
                                                <option value="26">HK2 (2018
                                                    - 2019)</option>
                                                <option value="24">HK1 (2018
                                                    - 2019)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="box-dashboard-thongke-ketquahoctap-theodot">
                                            <div class="text-center">
                                                <img src="/template/teacher/Assets/images/tkkqht.png">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-df">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span
                                                class="caption-subject
                                                    bold"
                                                lang="db-tiendohoctap">Tiến
                                                độ học tập</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">


                                        <style>
                                            text[text-anchor="end"] {
                                                display: none !important;
                                            }

                                            .highcharts-button {
                                                display: none !important;
                                            }

                                            path {
                                                font-family: Arial;
                                            }

                                        </style>
                                        <div>
                                            <div id="chartThongTinTinChiDaHoc">
                                            </div>
                                            <p style="color:
                                                    #003f65;font-size:
                                                    14px;font-weight:
                                                    bold;text-align: center;">
                                                121/125</p>
                                        </div>
                                        <script>
                                            Highcharts.chart('chartThongTinTinChiDaHoc', {

                                                chart: {
                                                    type: 'solidgauge',
                                                    height: '270px',
                                                    events: {
                                                        //render: renderIcons
                                                    }
                                                },
                                                title: {
                                                    text: ''
                                                },
                                                tooltip: {
                                                    useHTML: true,
                                                    borderWidth: 0,
                                                    backgroundColor: 'none',
                                                    shadow: false,
                                                    style: {
                                                        fontSize: '16px'
                                                    },
                                                    //pointFormat: '{series.name}',
                                                    pointFormat: '<p style="text-align:center !important; font-family: arial;">{series.name}<br><p style="text-align:center;display:block;font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</p><p>',
                                                    positioner: function(labelWidth) {
                                                        return {
                                                            x: ((this.chart.chartWidth - labelWidth) / 2),
                                                            y: (this.chart.plotHeight / 2) - 35
                                                        };
                                                    }
                                                },

                                                pane: {
                                                    startAngle: 0,
                                                    endAngle: 360,
                                                    background: [{
                                                        outerRadius: '112%',
                                                        innerRadius: '88%',
                                                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
                                                            .setOpacity(0.3)
                                                            .get(),
                                                        borderWidth: 0
                                                    }, {
                                                        outerRadius: '87%',
                                                        innerRadius: '63%',
                                                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
                                                            .setOpacity(0.3)
                                                            .get(),
                                                        borderWidth: 0
                                                    }]
                                                },

                                                yAxis: {
                                                    min: 0,
                                                    max: 100,
                                                    lineWidth: 0,
                                                    tickPositions: []
                                                },

                                                plotOptions: {
                                                    solidgauge: {
                                                        dataLabels: {
                                                            enabled: false
                                                        },
                                                        linecap: 'round',
                                                        stickyTracking: false,
                                                        rounded: true
                                                    }
                                                },

                                                series: [{
                                                    name: 'Tổng: 125 tín chỉ',
                                                    data: [{
                                                        color: Highcharts.getOptions().colors[0],
                                                        radius: '112%',
                                                        innerRadius: '88%',
                                                        y: 100
                                                    }]
                                                }, {
                                                    name: 'Đ&#227; học: 121 tín chỉ',
                                                    data: [{
                                                        color: Highcharts.getOptions().colors[2],
                                                        radius: '87%',
                                                        innerRadius: '63%',
                                                        y: 96
                                                    }]
                                                }]
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-df">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span
                                                class="caption-subject
                                                    bold"
                                                lang="db-lhp">Lớp học
                                                phần</span>
                                        </div>
                                        <div class="actions">
                                            <select class="form-control" id="cboIDDotForLHP"
                                                langid="db-hocky-combobox_1" name="cboIDDotForLHP"
                                                placeholder="Chọn học kỳ">
                                                <option value="">Chọn học kỳ</option>
                                                <option selected="selected" value="34">HK1 (2021 -
                                                    2022)</option>
                                                <option value="33">HK2 (2020
                                                    - 2021)</option>
                                                <option value="32">HK1 (2020
                                                    - 2021)</option>
                                                <option value="30">HK2 (2019
                                                    - 2020)</option>
                                                <option value="27">HK1 (2019
                                                    - 2020)</option>
                                                <option value="29">HK3 (2018
                                                    - 2019)</option>
                                                <option value="26">HK2 (2018
                                                    - 2019)</option>
                                                <option value="24">HK1 (2018
                                                    - 2019)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="box-dashboard-lophocphan-theodot">
                                            <div class="panel panel-admin">
                                                <div
                                                    class="panel-heading
                                                        clearfix">
                                                    <span>Môn học/học phần</span>
                                                    <span class="text-center">Số
                                                        tín chỉ</span>
                                                </div>
                                                <div
                                                    class="panel-scroll
                                                        border-scroll">
                                                    <table
                                                        class="table
                                                            table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td width="80%">
                                                                    <div><a href="#" class="color-active"
                                                                            data-bg="122705">010100213806</a></div>
                                                                    <div class="name">Kho&#225;
                                                                        luận
                                                                        tốt
                                                                        nghiệp</div>
                                                                </td>
                                                                <td width="20%">
                                                                    <div class="text-center">8</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">
                                                                    <div><a href="#" class="color-active"
                                                                            data-bg="122706">010100706606</a></div>
                                                                    <div class="name">Thực
                                                                        tập
                                                                        nghề
                                                                        nghiệp</div>
                                                                </td>
                                                                <td width="20%">
                                                                    <div class="text-center">4</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">
                                                                    <div><a href="#" class="color-active"
                                                                            data-bg="137292">000010001113</a></div>
                                                                    <div class="name">Phổ
                                                                        biến
                                                                        về
                                                                        kỳ
                                                                        thi
                                                                        đ&#225;nh
                                                                        gi&#225;
                                                                        năng
                                                                        lực
                                                                        ngoại
                                                                        ngữ
                                                                        -
                                                                        chuẩn
                                                                        đầu
                                                                        ra
                                                                        (P.Đ&#224;o
                                                                        tạo
                                                                        chủ
                                                                        tr&#236;)</div>
                                                                </td>
                                                                <td width="20%">
                                                                    <div class="text-center">0</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">
                                                                    <div><a href="#" class="color-active"
                                                                            data-bg="137386">0A00000702</a></div>
                                                                    <div class="name">Sinh
                                                                        hoạt
                                                                        cuối
                                                                        kh&#243;a
                                                                        gặp
                                                                        khoa
                                                                        chuy&#234;n
                                                                        ng&#224;nh</div>
                                                                </td>
                                                                <td width="20%">
                                                                    <div class="text-center">0</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="80%">
                                                                    <div><a href="#" class="color-active"
                                                                            data-bg="137415">010109729813</a></div>
                                                                    <div class="name">Sinh
                                                                        hoạt
                                                                        cuối
                                                                        kh&#243;a</div>
                                                                </td>
                                                                <td width="20%">
                                                                    <div class="text-center">0</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <script>
                                                jQuery(document).ready(function($) {
                                                    if ($('.border-scroll').length > 0) {
                                                        $('.border-scroll').niceScroll({
                                                            cursorborder: 'none',
                                                            cursorcolor: '#999',
                                                            autohidemode: 'leave'
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End column methods -->
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

        <!-- Footer -->
        <div class="container" style="text-align:right;">
            <ul id="footer">
                <li>
                    <span><i class="fa fa-bar-chart"></i></span>Đang online:
                    1
                </li>
                <li>
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>Hôm
                    qua: 0
                </li>
                <li>
                    <span><i class="fa fa-users" aria-hidden="true"></i></span>Tổng
                    truy cập: 5,908,291
                </li>
            </ul>
        </div>
        <!-- End footer -->

        <div><input id="ASC-MC" name="ASC-MC" type="hidden" value="WIN-04LJNRVBU7A" /></div>

        <script type="text/javascript" src="/template/teacher/Assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/template/teacher/Assets/js/jquery.nicescroll.min.js"></script>
        <script src="/template/teacher/Assets/js/tooltipster.bundle.min.js"></script>
        <script type="text/javascript" src="/template/teacher/Assets/js/main.js"></script>
</body>

</html>
