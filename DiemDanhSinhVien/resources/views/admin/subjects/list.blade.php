@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" style="margin:8px;" data-toggle="modal">Thêm môn
            học</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã môn học</th>
                        <th>Tên môn học</th>
                        <th>Ghi chú</th>
                        <th>Loại</th>
                        <th>Số tín chỉ</th>
                        <th>Tên khoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td id="{{ $subject->mamh }}">{{ $subject->mamh }}</td>
                            <td id="tenmh-{{ $subject->mamh }}">{{ $subject->tenmh }}</td>
                            <td id="ghichu-{{ $subject->mamh }}">{{ $subject->ghichu }}</td>
                            <td id="loai-{{ $subject->mamh }}">{{ $subject->loai }}</td>
                            <td id="stc-{{ $subject->mamh }}">{{ $subject->sotinchi }}</td>
                            <td id="tenkhoa-{{ $subject->mamh }}">{{ $subject->tenkhoa }}</td>
                            <td>
                                <button data-url="{{ route('subjects.edit', $subject->mamh) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('subjects.destroy', $subject->mamh) }}" ​ type="button"
                                    data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Xóa</button>
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
                <form action="" data-url="{{ route('subjects.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm môn học</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã môn học</label>
                            <input required type="text" name="mamh" class="form-control" id="mamh-add"
                                placeholder="Nhập mã môn học">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên môn học</label>
                            <input required type="text" name="tenmh" class="form-control" id="tenmh-add"
                                placeholder="Nhập tên môn học">
                        </div>

                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <input required type="text" name="ghichu" class="form-control" id="ghichu-add"
                                placeholder="Nhập ghi chú">
                        </div>

                        <div class="form-group">
                            <label for="">Loại</label>
                            <select name="loai" id="loai-add" class="form-control" required="required">
                                <option value="Lý thuyết">Lý Thuyết</option>
                                <option value="Thực hành">Thực hành</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Số tín chỉ</label>
                            <select name="stc" id="stc-add" class="form-control" required="required">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên khoa</label>
                            <select name="makhoa" id="makhoa-add" class="form-control" required="required">
                                @foreach ($facultys as $faculty)){
                                    <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
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
                            <label for="name">Mã môn học</label>
                            <input readonly type="text" name="mamh" class="form-control" id="mamh-edit"
                                placeholder="Nhập mã môn học">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên môn học</label>
                            <input required type="text" name="tenmh" class="form-control" id="tenmh-edit"
                                placeholder="Nhập tên môn học">
                        </div>

                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <input required type="text" name="ghichu" class="form-control" id="ghichu-edit"
                                placeholder="Nhập ghi chú">
                        </div>

                        <div class="form-group">
                            <label for="">Loại</label>
                            <select name="loai" id="loai-edit" class="form-control" required="required">
                                <option value="Lý thuyết">Lý Thuyết</option>
                                <option value="Thực hành">Thực hành</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Số tín chỉ</label>
                            <select name="stc" id="stc-edit" class="form-control" required="required">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên khoa</label>
                            <select name="makhoa" id="makhoa-edit" class="form-control" required="required">
                                @foreach ($facultys as $faculty)){
                                    <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Sửa</button>
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
                        mamh: $('#mamh-add').val(),
                        tenmh: $('#tenmh-add').val(),
                        ghichu: $('#ghichu-add').val(),
                        loai: $('#loai-add').val(),
                        stc: $('#stc-add').val(),
                        makhoa: $('#makhoa-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend('<tr><td id = "' + response.data.mamh + '" > ' +
                            response.data.mamh + '</td><td id="tenmh-' + response.data
                            .mamh + '">' +
                            response.data.tenmh + '</td><td id="ghichu-' + response
                            .data.mamh + '">' + response.data.ghichu +
                            '</td><td id="loai-' + response.data
                            .mamh + '">' +
                            response.data.loai + '</td><td id="stc-' + response.data
                            .mamh + '">' +
                            response.data.sotinchi + '</td><td id="tenkhoa-' + response.data
                            .mamh + '">' +
                            response.data.tenkhoa + '</td>' +
                            '<td><button data-url="/admin/subjects/edit/' + response.data
                            .mamh + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/subjects/destroy/' + response.data
                            .mamh +
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
                        console.log('success');
                        $('#mamh-edit').val(response.data.mamh);
                        $('#tenmh-edit').val(response.data.tenmh);
                        $('#ghichu-edit').val(response.data.ghichu);
                        $('#loai-edit').val(response.data.loai);
                        $('#stc-edit').val(response.data.sotinchi);
                        console.log(response.data.makhoa);
                        $('#makhoa-edit').val(response.data.makhoa);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/subjects/edit') }}/' +
                            response.data.mamh);
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
                        mamh: $('#mamh-edit').val(),
                        tenmh: $('#tenmh-edit').val(),
                        ghichu: $('#ghichu-edit').val(),
                        loai: $('#loai-edit').val(),
                        stc: $('#stc-edit').val(),
                        makhoa: $('#makhoa-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#' + response.data.mamh).text(response.data.mamh)
                        $('#tenmh-' + response.data.mamh).text(response.data.tenmh)
                        $('#ghichu-' + response.data.mamh).text(response.data.ghichu)
                        $('#loai-' + response.data.mamh).text(response.data.loai)
                        $('#stc-' + response.data.mamh).text(response.data.sotinchi)
                        $('#tenkhoa-' + response.data.mamh).text(response.data.tenkhoa)
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
                            toastr.success('Xóa môn học thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa môn học thất bại!')
                        }
                    })
                }
            })

        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
