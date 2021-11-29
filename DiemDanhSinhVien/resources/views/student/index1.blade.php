@extends('admin.main')
@section('content')
    <table style="text-align:center;" class="table table-bordered table-striped" width="100%" role="grid">
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
                <td style="width:50px; font-weight: bold;vertical-align: middle;">Sáng</td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 2)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>
                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 3)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 4)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 5)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 6)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 7)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 0 && $lichhoc->thu == 8)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="width:50px; font-weight: bold;vertical-align: middle;">Chiều</td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 2)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 3)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 4)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 5)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 6)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 7)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 1 && $lichhoc->thu == 8)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="width:50px; font-weight: bold;vertical-align: middle;">Tối</td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 2)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 3)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 4)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 5)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 6)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 7)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($data as $lichhoc)
                        @if ($lichhoc->buoi == 2 && $lichhoc->thu == 8)
                            <div style="width:100%;" class="content text-left" data-bg="129872" style="text-align: left">
                                <b><a href="javascript:" target=""
                                        style="text-decoration: none; color: #003763; text-align:center; display:block;">{{ $lichhoc->mamh_id }}</a></b>

                                <p style="text-align:center;">
                                    <span lang="lichtheotuan-tiet">Tiết:</span>
                                    {{ $lichhoc->tietbd . ' - ' . $lichhoc->tietkt }}
                                </p>
                                <p lang="giang-duong" style="text-align:center;">Phòng:
                                    {{ $lichhoc->maphong_id }}
                                </p>


                                <div @if (strtotime($lichhoc->ngay) > strtotime($ngay)) class='disableddiv' @endif style="width:100%; display:flex; justify-content:center;">
                                    <a class="btn btn-danger" href="#"
                                        onclick="viewStudent({{ $user }}, {{ $lichhoc->mahp }}, {{ $lichhoc->tuan }})">
                                        <i class="fas fa-trash"></i><span style="margin-left: 8px">Xem điểm danh</span>
                                    </a>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endsection
