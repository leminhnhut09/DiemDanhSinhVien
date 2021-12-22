@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã học phần</th>
                        <th>Mã ca học</th>
                        <th>Tuần</th>
                        <th>Ngày</th>
                        <th>Thứ</th>
                        <th>Buổi</th>
                        <th>Phòng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td id="mahp-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->mahp_id }}
                            </td>
                            <td id="macahoc-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                {{ $schedule->macahoc_id }}
                            </td>
                            <td id="tuan-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->tuan }}
                            </td>
                            <td id="ngay-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->ngay }}
                            </td>
                            <td id="thu-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">{{ $schedule->thu }}
                            </td>
                            <td id="buoi-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
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
                            <td id="phong-{{ $schedule->mahp_id }}-{{ $schedule->tuan }}">
                                {{ $schedule->tenphong }}
                            </td>
                            <td>
                                <button data-url="/admin/schedule/edit/{{ $schedule->mahp_id }}/{{ $schedule->tuan }}"
                                    ​ type="button" data-target="#edit" data-toggle="modal"
                                    class="btn btn-warning btn-edit">Edit</button>
                                <button
                                    data-url="/admin/schedule/destroy/{{ $schedule->mahp_id }}/{{ $schedule->tuan }}"
                                    ​ type="button" data-target="#delete" data-toggle="modal"
                                    class="btn btn-danger btn-delete">Delete</button>
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
                        <div class="form-group">
                            <label for="description">Tên học phần</label>
                            <select name="mahp" id="mahp-add" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}
                                        ({{ $term->tenmh }})</option>
                                    }
                                @endforeach
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
                            <label for="description">Tuần</label>
                            <select name="tuan" id="tuan-add" class="form-control" required="required">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
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
                            <select name="mahp" id="mahp-edit" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}
                                        ({{ $term->tenmh }})</option>
                                    }
                                @endforeach
                            </select>
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
                            <label for="description">Tuần</label>
                            <select name="tuan" id="tuan-edit" class="form-control" required="required">
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
                            <label for="">Ngày</label>
                            <input name="ngay" type="date" name="" id="ngay-edit" class="form-control" value=""
                                required="required" title="">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
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
            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        mahp: $('#mahp-add').val(),
                        macahoc: $('#macahoc-add').val(),
                        tuan: $('#tuan-add').val(),
                        ngay: $('#ngay-add').val(),
                        thu: $('#thu-add').val(),
                        buoi: $('#buoi-add').val(),
                        maphong: $('#maphong-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        var buoi = "Sáng";
                        if (response.data.buoi == 1) {
                            buoi = "Chiều";
                        } else if (response.data.buoi == 2) {
                            buoi = "Tối";
                        }

                        $('tbody').prepend('<tr><td id = "mahp-' + response.data.mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.mahp_id + '</td><td id = "macahoc-' + response
                            .data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.macahoc_id + '</td><td id = "tuan-' + response
                            .data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.tuan + '</td><td id = "ngay-' + response.data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.ngay + '</td><td id = "thu-' + response.data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.thu + '</td><td id = "buoi-' + response.data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            buoi + '</td><td id = "phong-' + response.data
                            .mahp_id +
                            '-' + response.data.tuan + '" > ' +
                            response.data.tenphong + '</td>' +
                            '<td><button data-url="/admin/schedule/edit/' + response.data
                            .mahp_id + '/' + response.data.tuan + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                            '<button data-url="/admin/schedule/destroy/' + response.data
                            .mahp_id + '/' + response.data.tuan +
                            '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                            ' data-toggle="modal"class="btn btn-danger btn-delete">Delete</button></td>'
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
                        console.log('success');
                        $('#mahp-edit').val(response.data.mahp_id);
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
