@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" style="margin:8px;" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm
            lịch học</a>
        {{-- Filter --}}
        <div style="display: flex; justify-content: space-evenly">
            <div class="form-group"
                style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                <label style="width:auto; margin-right: 10px" for="">Khoa</label>
                <select style="width:200px;" name="makhoa" id="makhoa-filter" class="form-control" required="required">
                    <option value="All">Tất cả</option>
                    @foreach ($facultys as $faculty) {
                        <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                        }
                    @endforeach
                </select>
            </div>
            <div class="form-group"
                style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                <label style="width:auto; margin-right: 10px " for="">Năm học</label>
                <select style="width:200px;" name="namhoc" id="namhoc-filter" class="form-control" required="required">
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
                <select style="width:140px;" name="hocky" id="hocky-filter" class="form-control" required="required">
                    <option value="All">Tất cả</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        {{-- End filter --}}
        <div class="table-responsive" style="max-height: 500px; overflow-y:auto">
            <table style="text-align: center; overlow-x:scoll;" class="table table-hover">
                <thead>
                    <tr>
                        <th style="min-width: 150px;">Mã học phần</th>
                        <th style="min-width: 200px;">Tên học phần</th>
                        <th style="min-width: 120px;">Năm học</th>
                        <th style="min-width: 120px;">Học kỳ</th>
                        <th style="min-width: 120px;">Mã ca học</th>
                        <th style="min-width: 100x;">Tuần</th>
                        <th style="min-width: 120px;">Ngày</th>
                        <th style="min-width: 120px;">Thứ</th>
                        <th style="min-width: 120px;">Buổi</th>
                        <th style="min-width: 120px;">Phòng</th>
                        <th style="min-width: 200px;"></th>
                    </tr>
                </thead>
                <tbody id="table-body" style="vertical-align: middle;">
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td style="vertical-align: middle;"
                                id="mahp-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->mahp_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="tenhp-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->tenmh }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="namhoc-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                {{ $schedule->namhoc_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="hocky-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->hocky_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="macahoc-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                {{ $schedule->macahoc_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="tuan-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->tuan }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="ngay-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->ngay }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="thu-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->thu }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="buoi-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                @if ($schedule->buoi == 0)
                                    Sáng
                                @endif
                                @if ($schedule->buoi == 1)
                                    Chiều
                                @endif
                                @if ($schedule->buoi == 2)
                                    Tối
                                @endif
                            </td>
                            <td style="vertical-align: middle;"
                                id="phong-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                {{ $schedule->tenphong }}
                            </td>
                            <td>
                                <button data-url="/admin/schedule/edit/{{ $schedule->mahp_id }}/{{ $schedule->tuan }}"
                                    ​ type="button" data-target="#edit" data-toggle="modal"
                                    class="btn btn-warning btn-edit">Sửa</button>
                                <button
                                    data-url="/admin/schedule/destroy/{{ $schedule->mahp_id }}/{{ $schedule->tuan }}"
                                    ​ type="button" data-target="#delete" data-toggle="modal"
                                    class="btn btn-danger btn-delete">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- add --}}
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-url="{{ route('schedule.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm lịch học</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label for="description">Tên học phần</label>
                            <select name="mahp" id="mahp-add" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}
                                        ({{ $term->tenmh }})</option>
                                    }
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group" style="margin-bottom:30px">
                            <label for="description">Tên học phần</label>
                            <input required type="text" name="mahp" class="form-control" id="mahp-add" list="listhp-add"
                                placeholder="Nhập mã học phần">

                            <datalist id="listhp-add">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}-
                                        {{ $term->tenmh }}</option>
                                    }
                                @endforeach
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="description">Tuần bắt đầu</label>
                            <select name="tuanbd" id="tuanbd-add" class="form-control" required="required">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Tuần kết thúc</label>
                            <select name="tuankt" id="tuankt-add" class="form-control" required="required">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Ca học</label>
                            <select name="macahoc" id="macahoc-add" class="form-control" required="required">
                                @foreach ($lessons as $lesson){
                                    <option value="{{ $lesson->macahoc }}">
                                        {{ $lesson->tietbd }} - {{ $lesson->tietkt }} ( {{ $lesson->thoigianbd }} -
                                        {{ $lesson->thoigiankt }} )
                                    </option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Ngày</label>
                            <input name="ngay" type="date" name="" id="ngay-add" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="description">Thứ</label>
                            <select name="thu" id="thu-add" class="form-control" required="required">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">Chủ nhật</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Buổi</label>
                            <select name="buoi" id="buoi-add" class="form-control" required="required">
                                <option value="0">Sáng</option>
                                <option value="1">Chiều</option>
                                <option value="2">Tối</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Phòng học</label>
                            <select name="maphong" id="maphong-add" class="form-control" required="required">
                                @foreach ($rooms as $room){
                                    <option value="{{ $room->maphong }}">{{ $room->tenphong }}
                                    </option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
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
                            <input readonly type="text" name="mahp" class="form-control" id="mahp-edit">
                            {{-- <select readonly name="mahp" id="mahp-edit" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}
                                        ({{ $term->tenmh }})</option>
                                    }
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="description">Tuần</label>
                            <input readonly type="text" name="tuan" class="form-control" id="tuan-edit">
                            {{-- <select name="tuan" id="tuan-edit" class="form-control" required="required">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="description">Ca học</label>
                            <select name="macahoc" id="macahoc-edit" class="form-control" required="required">
                                @foreach ($lessons as $lesson){
                                    <option value="{{ $lesson->macahoc }}">
                                        {{ $lesson->tietbd }} - {{ $lesson->tietkt }} ( {{ $lesson->thoigianbd }} -
                                        {{ $lesson->thoigiankt }} )
                                    </option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Ngày</label>
                            <input name="ngay" type="date" id="ngay-edit" class="form-control" required="required"
                                title="">
                        </div>

                        <div class="form-group">
                            <label for="description">Thứ</label>
                            <select name="thu" id="thu-edit" class="form-control" required="required">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">Chủ nhật</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Buổi</label>
                            <select name="buoi" id="buoi-edit" class="form-control" required="required">
                                <option value="0">Sáng</option>
                                <option value="1">Chiều</option>
                                <option value="2">Tối</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Phòng học</label>
                            <select name="maphong" id="maphong-edit" class="form-control" required="required">
                                @foreach ($rooms as $room){
                                    <option value="{{ $room->maphong }}">{{ $room->tenphong }}
                                    </option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- @include('admin.classer.add') --}}
    {{-- @include('admin.facultys.edit') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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

    <script type="text/javascript">
        $(document).ready(function() {
            function buildTable(data) {
                var table = document.getElementById('table-body')
                table.innerHTML = ''
                for (var i = 0; i < data.length; i++) {
                    var buoi = "Sáng";
                    if (data[i].buoi == 1) {
                        buoi = "Chiều";
                    } else if (data[i].buoi == 2) {
                        buoi = "Tối";
                    }

                    row = '<tr><td style="vertical-align: middle;" id = "mahp-' + data[i]
                        .mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].mahp_id + '</td><td style="vertical-align: middle;" id = "tenhp-' +

                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].tenmh + '</td><td style="vertical-align: middle;" id = "namhoc-' +

                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].namhoc_id + '</td><td style="vertical-align: middle;" id = "hocky-' +

                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].hocky_id + '</td><td style="vertical-align: middle;" id = "macahoc-' +

                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].macahoc_id + '</td><td style="vertical-align: middle;" id = "tuan-' +

                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].tuan + '</td><td style="vertical-align: middle;" id = "ngay-' +
                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].ngay + '</td><td style="vertical-align: middle;" id = "thu-' +
                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].thu + '</td><td style="vertical-align: middle;" id = "buoi-' +
                        data[i].mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        buoi + '</td><td style="vertical-align: middle;" id = "phong-' + data[i]
                        .mahp_id +
                        '-' + data[i].tuan + '" > ' +
                        data[i].tenphong + '</td>' +
                        '<td><button data-url="/admin/schedule/edit/' +
                        data[i].mahp_id + '/' + data[i].tuan + '" type="button" ' +
                        'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                        '<button data-url="/admin/schedule/destroy/' +
                        data[i].mahp_id + '/' + data[i].tuan +
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
                    url: '/admin/schedule/filter',
                    data: {
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
            // end filter
            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        mahp: $('#mahp-add').val(),
                        macahoc: $('#macahoc-add').val(),
                        tuanbd: $('#tuanbd-add').val(),
                        tuankt: $('#tuankt-add').val(),
                        ngay: $('#ngay-add').val(),
                        thu: $('#thu-add').val(),
                        buoi: $('#buoi-add').val(),
                        maphong: $('#maphong-add').val(),
                    },
                    success: function(response) {
                        console.log(response.data);
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');

                        var soluong = response.data.length;
                        for (var i = 0; i < soluong; i++) {

                            var buoi = "Sáng";
                            if (response.data[i].buoi == 1) {
                                buoi = "Chiều";
                            } else if (response.data[i].buoi == 2) {
                                buoi = "Tối";
                            }

                            $('tbody').prepend(
                                '<tr><td style="vertical-align: middle;" id = "mahp-' +
                                response.data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].mahp_id +
                                '</td><td style="vertical-align: middle;" id = "tenhp-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].tenmh +
                                '</td><td style="vertical-align: middle;" id = "namhoc-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].namhoc_id +
                                '</td><td style="vertical-align: middle;" id = "hocky-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].hocky_id +
                                '</td><td style="vertical-align: middle;" id = "macahoc-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].macahoc_id +
                                '</td><td style="vertical-align: middle;" id = "tuan-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].tuan +
                                '</td><td style="vertical-align: middle;" id = "ngay-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].ngay +
                                '</td><td style="vertical-align: middle;" id = "thu-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].thu +
                                '</td><td style="vertical-align: middle;" id = "buoi-' +
                                response
                                .data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                buoi +
                                '</td><td style="vertical-align: middle;" id = "phong-' +
                                response.data[i]
                                .mahp_id +
                                '-' + response.data[i].tuan + '" > ' +
                                response.data[i].tenphong + '</td>' +
                                '<td><button data-url="/admin/schedule/edit/' + response
                                .data[i]
                                .mahp_id + '/' + response.data.tuan + '" type="button" ' +
                                'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                                '<button data-url="/admin/schedule/destroy/' + response
                                .data[i]
                                .mahp_id + '/' + response.data[i].tuan +
                                '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                                ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                            );

                        }
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
                        console.log('success');
                        $('#mahp-edit').val(response.data.mahp_id + ' (' + response.data.tenmh +
                            ')');
                        $('#macahoc-edit').val(response.data.macahoc);
                        $('#tuan-edit').val(response.data.tuan);
                        $('#ngay-edit').val(response.data.ngay);
                        $('#thu-edit').val(response.data.thu);
                        $('#buoi-edit').val(response.data.buoi);
                        $('#maphong-edit').val(response.data.maphong);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/schedule/edit') }}/' +
                            response.data.mahp_id + '/' + response.data.tuan);
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
                        macahoc: $('#macahoc-edit').val(),
                        tuan: $('#tuan-edit').val(),
                        ngay: $('#ngay-edit').val(),
                        thu: $('#thu-edit').val(),
                        buoi: $('#buoi-edit').val(),
                        maphong: $('#maphong-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');
                        $('#mahocphan-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.mahp_id)
                        $('#macahoc-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.macahoc_id)
                        $('#tuan-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.tuan)
                        $('#ngay-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.ngay)
                        $('#thu-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.thu)
                        var buoi = "Sáng";
                        if (response.data.buoi == 1) {
                            buoi = "Chiều";
                        } else if (response.data.buoi == 2) {
                            buoi = "Tối";
                        }
                        $('#buoi-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(buoi)
                        $('#phong-' + response.data.mahp_id + '-' + response.data.tuan)
                            .text(response.data.tenphong)
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
                            toastr.success('Xóa học phần thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa học phần thất bại!')
                        }
                    })
                }
            })
        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
