<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0" />
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="/Content/AConfig/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/login/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/template/teacher/Assets/login/css/style.css" />
    <!-- <script src="/Content/login/js/jquery.min.js"></script>
    <script src="/Content/loginnews/js/bootstrap.min.js"></script> -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
</head>

<body>
    <main class="wapper-login">
        <header class="header">
            <div class="container">
                <div class="logo-login-main text-center">
                    <a href="#"><img src="/template/teacher/Assets/images/sv_header_login.png" /></a>
                </div>
            </div>
            <div style="clear: both"></div>
        </header>
        <div>
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
            <style>
                .box-captcha input {
                    border: 1px solid #ddd !important;
                    border-radius: 5px;
                    width: 100px !important;
                }

                .box-captcha a {
                    left: 110px !important;
                }

                .box-captcha img {
                    margin-top: 0px !important;
                    left: 145px !important;
                }

                .item-lien-ket {
                    padding: 20px;
                    border-radius: 23px;
                    background: rgb(255 255 255 / 0.9);
                    width: calc(50% - 16px);
                    margin: 8px;
                    height: 140px;
                    position: relative;
                    overflow: hidden;
                }

                .item-lien-ket img {
                    width: 22px !important;
                    height: 22px !important;
                    margin: 10px auto;
                    display: flex;
                    align-items: center;
                }

                .item-lien-ket a {
                    width: 100%;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 16px;
                    text-transform: uppercase;
                    font-weight: 700;
                    text-align: center;
                    color: #172759;
                }

                .search-bar {
                    width: 280px;
                    margin-left: 15px;
                }

                .search-bar form {
                    float: left;
                    width: 100%;
                    position: relative;
                }

                .search-bar form input {
                    width: 100%;
                    background-color: #fff;
                    height: 38px;
                    color: #000000;
                    font-size: 12px;
                    border: 1px solid #e6ecf0;
                    padding: 0 15px;
                    border-radius: 20px !important;
                    outline: none;
                }

                .search-bar form button {
                    position: absolute;
                    top: 0;
                    right: 0;
                    background-color: transparent;
                    width: 38px;
                    height: 100%;
                    border: 0;
                }

                .search-bar form button i {
                    color: #878787;
                    font-size: 16px;
                }

                .login-with-social-btn:before {
                    content: "";
                    position: absolute;
                    z-index: 2;
                    top: 0px;
                    left: 44px;
                    height: 48px;
                    width: 1px;
                    background: linear-gradient(90deg, #aaa 50%, #f0f0f0 30%);
                }

                .login-with-social-btn {
                    transition: background-color 0.3s, box-shadow 0.3s;
                    width: 100%;
                    position: relative;
                    padding: 12px 30px 12px 62px;
                    border: none;
                    border-radius: 3px;
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04),
                        0 1px 1px rgba(0, 0, 0, 0.25);
                    color: #222;
                    font-size: 16px;
                    font-weight: 400;
                    font-family: Roboto, sans-serif;
                    background-color: white;
                    background-repeat: no-repeat;
                    background-position: 12px center;
                    margin-top: 10px;
                }

                .login-with-social-btn:hover {
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04),
                        0 2px 4px rgba(0, 0, 0, 0.25);
                }

                .login-with-social-btn:active {
                    background-color: #eeeeee;
                    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAABRSURBVDiNY2CgAWBkYGBg+BSg9J+QQr4N9xjrdzEQVNfoxsDIRA2XoYNRQ0cNHQqAkYGBgYFhyXuCOYUhRpDx/07COYrRfTRHjRo6NAylCQAAN14NI2Qzu4kAAAAASUVORK5CYII=");
                }

                .login-with-social-btn:focus {
                    outline: none;
                    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04),
                        0 2px 4px rgba(0, 0, 0, 0.25), 0 0 0 3px #c8dafc;
                }

                .login-with-microsoft-btn {
                    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAABRSURBVDiNY2CgAWBkYGBg+BSg9J+QQr4N9xjrdzEQVNfoxsDIRA2XoYNRQ0cNHQqAkYGBgYFhyXuCOYUhRpDx/07COYrRfTRHjRo6NAylCQAAN14NI2Qzu4kAAAAASUVORK5CYII=") !important;
                }

                .login-with-google-btn {
                    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAMAAACeyVWkAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACu1BMVEX///////7//Pz//f3++fj//v7//v397Ov2rKbwe3HtY1fsWk3tYVXweG71qKL96un0oZrrSjzoNSbpOCnpPS/qPzHpPi/pOCrqSDr1o5z/+/v++fnvdGnoMyTqQTPrSTvqRjjpPC3qPzDrSDvqRTfnKBjzmpP//fzoNCXrSDrpOSvpPjDtW0/uaV7tXE/vb2T98vHzm53oNCTqRDfpOSrvdmv61tP++vr++/r72NXvbmTua2D++/v//OTxeSnpOjbqRTnpOSnykIj+/v/9/v/+///9/P389/j94ZD8vgD1kR7pOyvuaWL///38z077twD9yAf2mgX6zr///Pvp8f7P4PzT4/3S4vzS4fzS4v3T4/zt9P7//vz8xy77ugD7ugT8xRL//en8/f+ewPkvefNBhPQ9gvRAhPSiw/n//fb7xCP7uwD5wiP9/Piiw/o4fvNJifRGh/RGiPREhvRDhfQ1ffOWvPn4uwT/wRD/+uj9//+avvkmc/I5f/M2ffM0fPM8gfRDhvRFh/Sbv/n80E/5uAD/vwTIswzO5sb8/fvW5PymxfquyvqqyPq0zvp6qfc6gPRHiPSwzPr/uACxtikspEtcunv8/vx2pvfV5Pz/+OKJsjknplY1qVcqo0mHzJr9/f+lw/43fvFdl/X9/vyP064loUQ6qlc1qVQpo0pqv4HS7Nn6/fv8/f3f8uKEyJ85h9ZDgv9HiPMze/Npv38koUU5qlc3qVYppEovpk5Os2leunZRtWw0qFQno0U2qFlDk8I0evlxpPb9/v75/Pppvn8joUUyp1E6q1gwpk8spU0vpk82qVU7qlo0qVAjoj9hqrj09v/9/v2a06k7q1kloUYoo0kupU4wplAupk4yp1KJzJv8//Pr9u6l2LNwwoZWt3BMsmhTtW2Z06nf8eT4/Pn7/fz8/v3+//5PFEZOAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+ULEAc5JnRSWN0AAAGVSURBVBjTY2AAAkYmIMHMAiKZWBmggI2BgZ2Dk4ubh5ePH6gEIsjMwCAgKCQsIiomLiQhKQVTKS0jKyevIKqopKCsoqrGoA4UBJojo6GpoKWto6unrSisbwASYWBiMDTSNDYxNTNnsLC0srYBGQgEtnb2Do5OQIazi6ubu6ubi4szkOPh6eXtA9QDZPtCXeDKwODnHxAYxBDsyhASGhYeERkeFRrNwBATGxefkMjAmMSQnJKaBgTpKRkMDJlZcdk5uSDRvPyCwqLiksLSMrDa8orKKqBodU1tXX1DY1N9M9Dolta29g6GTmeGru6e3r7+CRPrJ4HcMHnK1GkMDNOBbmD0ZZhR29QwE+iKWbPnzJ03HyjtsoCBYeGiwobFLgwMSxiWLlu+YuWq1WsY1q5bv2Hjps2TGJJALt6yddv2HTt37d6zd9/+AwcPgX18mOHI0WPHT2w/eer0mbPnzl+46AvyMcMlBobLV65eu37j5sqrt27fASqDqma4e+/+g4ePVj1+wgATBLpjOkjL02dA8vkLkAAAfCh/yEaJBysAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjEtMTEtMTZUMDc6NTc6MzMrMDA6MDAsmbeWAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIxLTExLTE2VDA3OjU3OjMzKzAwOjAwXcQPKgAAAABJRU5ErkJggg==") !important;
                }

            </style>

            <section class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            <div id="ViewDanhSachTinTuc"></div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="bg-form authfy-login" style="height: 583px">
                                <div class="form-wrap h-100 w-100">
                                    <div class="authfy-panel panel-login active">
                                        <!-- Formmmmmmmmmmm -->
                                        <form action="/login/store" autocomplete="new-password" class="form-login"
                                            data-ajax="true" data-ajax-failure="onAjaxFailure"
                                            data-ajax-loading="#ajaxLoading" data-ajax-success="onAjaxSuccess"
                                            id="form-login" method="post">
                                            <input name="__RequestVerificationToken" type="hidden"
                                                value="qcn-wkiUxyAi5KszUyjsaq23LYyEkQkEYzPeXd3tTRNKUTbv3CHfeShwAPResLMzHhxxVhAcdwK_rgA0GLBz0ebKbfJGsbZo53U6r8OJUJY1" />
                                            <input asp-for="ReturnUrl" type="hidden" />
                                            <div class="form-login">
                                                <div class="text-center">
                                                    <img src="/template/teacher/Assets/images/congthongtinsinhvien.png"
                                                        style="max-width: 100%; max-height: 95px" />
                                                </div>
                                                <h4 lang="loginnews-pagetitle">ĐĂNG NHẬP HỆ THỐNG</h4>
                                                <div class="group">
                                                    <input autocomplete="new-password" class="input"
                                                        id="username" lang="langnews_user_placeholder" name="username"
                                                        placeholder="Nhập mã sinh viên" required="required" type="text"
                                                        value="" />
                                                    <input autocomplete="new-password" class="input"
                                                        id="password" lang="langnews_pwd_placeholder" name="password"
                                                        placeholder="Nhập mật khẩu" required="required"
                                                        type="password" />

                                                    {{-- <input id="remember" name="remember" type="checkbox" value="true" /> --}}

                                                    <div class="text-right">
                                                        <label>
                                                            <input id="remember" name="remember" type="checkbox"
                                                                value="true" />
                                                            Đã tốt nghiệp</label>
                                                    </div>
                                                </div>
                                                @include('alert')
                                                <input type="submit" class="button" value="Đăng nhập" />
                                            </div>
                                            @csrf
                                        </form>
                                    </div>

                                    <style>
                                        .btn-create {
                                            padding: 10px 12px;
                                            background: #25c6cb;
                                            border-radius: 3px !important;
                                            margin-left: 5px;
                                            display: block;
                                            font-size: 1.4em;
                                            text-align: center;
                                        }

                                        .btn-create a {
                                            color: #fff;
                                        }

                                        .item-lien-ket {
                                            padding: 10px;
                                            border-radius: 10px;
                                            background: rgb(255 255 255 / 0.9);
                                            width: calc(50% - 16px);
                                            margin: 8px;
                                            min-height: 120px;
                                            position: relative;
                                            overflow: hidden;
                                        }

                                        .item-lien-ket a {
                                            width: 100%;
                                            min-height: 60px;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-size: 0.9em;
                                            text-transform: uppercase;
                                            font-weight: 700;
                                            text-align: center;
                                            color: #172759;
                                        }

                                    </style>
                                </div>
                            </div>
                            <script type="text/javascript">
                                !(function(a) {
                                    "use strict";
                                    a("html, body");
                                    a(".lnk-toggler").on("click", function(t) {
                                        var e = a(this).data("panel");
                                        a(".authfy-panel.active").removeClass("active"),
                                            a(e).addClass("active");
                                    });
                                })(jQuery);
                            </script>

                            <div class="online" style="display: none">
                                Đang online: 7204
                            </div>
                            <div>
                                <input id="ASC-MC" name="ASC-MC" type="hidden" value="WIN-04LJNRVBU7A" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script type="text/javascript" src="/template/teacher/Assets/js/lang.js"></script>
        </div>
    </main>
</body>

</html>
