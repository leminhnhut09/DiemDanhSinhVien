@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" style="margin:8px;" data-toggle="modal">Thêm
            giảng viên</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã GV</th>
                        <th>Tên GV</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>SDT</th>
                        <th>Ảnh</th>
                        <th>Khoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td id="{{ $teacher->magv }}">{{ $teacher->magv }}</td>
                            <td id="tengv-{{ $teacher->magv }}">{{ $teacher->tengv }}</td>
                            <td id="gioitinh-{{ $teacher->magv }}">{{ $teacher->gioitinh == 0 ? 'Nam' : 'Nữ' }}</td>
                            <td id="ngaysinh-{{ $teacher->magv }}">{{ $teacher->ngaysinh }}</td>
                            <td id="diachi-{{ $teacher->magv }}">{{ $teacher->diachi }}</td>
                            <td id="sdt-{{ $teacher->magv }}">{{ $teacher->sdt }}</td>
                            <td id="anh-{{ $teacher->magv }}">
                                <a id="anha-{{ $teacher->magv }}" href="{{ $teacher->anh }}" target="_blank">
                                    <img id="anhimg-{{ $teacher->magv }}" src="{{ $teacher->anh }}" height="30px"
                                        alt="">
                                </a>
                            </td>
                            <td id="tenkhoa-{{ $teacher->magv }}">{{ $teacher->tenkhoa }}</td>
                            <td>
                                <button data-url="{{ route('teacherM.edit', $teacher->magv) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('teacherM.destroy', $teacher->magv) }}" ​ type="button"
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
                <form action="" data-url="{{ route('teacherM.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm giảng viên</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã giảng viên</label>
                            <input required type="text" name="magv" class="form-control" id="magv-add"
                                placeholder="Nhập mã giảng viên">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên giảng viên</label>
                            <input required type="text" name="tengv" class="form-control" id="tengv-add"
                                placeholder="Nhập tên giảng viên">
                        </div>

                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <select name="gioitinh" id="gioitinh-add" class="form-control" required="required">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input name="ngaysinh" type="date" name="" id="ngaysinh-add" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input required name="diachi" type="text" class="form-control" id="diachi-add"
                                placeholder="Nhập vào địa chỉ">
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input required name="sdt" type="number" class="form-control" id="sdt-add"
                                placeholder="Nhập vào số điện thoại">
                        </div>

                        <div class="form-group">
                            <label for="menu">Ảnh</label>
                            <input required type="file" name="file" class="form-control" id="upload-add">
                            <div id="image_show-add">
                            </div>
                            <input type="hidden" name="thumb" id="thumb-add">
                        </div>

                        <div class="form-group">
                            <label for="">Tên khoa</label>
                            <select name="makhoa" id="makhoa-add" class="form-control" required="required">
                                @foreach ($facultys as $faculty){
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
                            <label for="name">Mã giảng viên</label>
                            <input readonly type="text" name="magv" class="form-control" id="magv-edit"
                                placeholder="Nhập mã giảng viên">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên giảng viên</label>
                            <input requiredtype="text" name="tengv" class="form-control" id="tengv-edit"
                                placeholder="Nhập tên giảng viên">
                        </div>

                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <select name="gioitinh" id="gioitinh-edit" class="form-control" required="required">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input name="ngaysinh" type="date" name="" id="ngaysinh-edit" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input required name="diachi" type="text" class="form-control" id="diachi-edit"
                                placeholder="Nhập vào địa chỉ">
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input required name="sdt" type="number" class="form-control" id="sdt-edit"
                                placeholder="Nhập vào số điện thoại">
                        </div>

                        <div class="form-group">
                            <label for="menu">Ảnh</label>
                            <input type="file" name="file" class="form-control" id="upload-edit">
                            <div id="image_show-edit">
                            </div>
                            <input type="hidden" name="thumb" id="thumb-edit">
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
        $("#upload-add").change(function() {
            const form = new FormData();
            form.append("file", $(this)[0].files[0]);
            $.ajax({
                processData: false,
                contentType: false,
                type: "POST",
                dataType: "JSON",
                data: form,
                url: "/admin/upload/services",
                success: function(results) {
                    if (results.error == false) {
                        $("#image_show-add").html(
                            '<a href="' +
                            results.url +
                            '" target="_blank">' +
                            '<img src="' +
                            results.url +
                            '" width="100px"></a>'
                        );

                        $("#thumb-add").val(results.url);
                    } else {
                        alert("Upload error");
                    }
                },
            });
        });
        $("#upload-edit").change(function() {
            const form = new FormData();
            form.append("file", $(this)[0].files[0]);
            $.ajax({
                processData: false,
                contentType: false,
                type: "POST",
                dataType: "JSON",
                data: form,
                url: "/admin/upload/services",
                success: function(results) {
                    if (results.error == false) {
                        $("#image_show-edit").html(
                            '<a href="' +
                            results.url +
                            '" target="_blank">' +
                            '<img src="' +
                            results.url +
                            '" width="100px"></a>'
                        );

                        $("#thumb-edit").val(results.url);
                    } else {
                        alert("Upload error");
                    }
                },
            });
        });
        $(document).ready(function() {
            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        magv: $('#magv-add').val(),
                        tengv: $('#tengv-add').val(),
                        gioitinh: $('#gioitinh-add').val(),
                        ngaysinh: $('#ngaysinh-add').val(),
                        diachi: $('#diachi-add').val(),
                        sdt: $('#sdt-add').val(),
                        anh: $('#thumb-add').val(),
                        makhoa: $('#makhoa-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');

                        var str = '<td id="anh-' + response.data.magv + '"><a href="' + response
                            .data
                            .anh + '" target="_blank"><img src="' + response.data.anh +
                            '" height="30px" alt=""></a></td>'


                        var gioitinh = response.data.gioitinh == 0 ? "Nam" : "Nữ";
                        $('tbody').prepend('<tr><td id = "' + response.data.magv + '" > ' +
                            response.data.magv + '</td><td id="tengv-' + response.data
                            .magv + '">' +
                            response.data.tengv + '</td><td id="gioitinh-' + response
                            .data.magv + '">' + gioitinh +
                            '</td><td id="ngaysinh-' + response.data
                            .magv + '">' +
                            response.data.ngaysinh + '</td><td id="diachi-' + response.data
                            .magv + '">' +
                            response.data.diachi + '</td><td id="sdt-' + response.data
                            .magv + '">' +
                            response.data.sdt + '</td>' + str +
                            '<td id="tenkhoa-' + response.data.magv + '">' +
                            response.data.tenkhoa + '</td>' +
                            '<td><button data-url="/admin/teacherM/edit/' + response.data
                            .magv + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/teacherM/destroy/' + response.data
                            .magv +
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
                console.log(url);
                $('#modal-edit').modal('show');
                e.preventDefault();
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response) {
                        console.log('success');
                        $('#magv-edit').val(response.data.magv);
                        $('#tengv-edit').val(response.data.tengv);
                        var gioitinh = response.data.gioitinh == 0 ? "Nam" : "Nữ";
                        $('#gioitinh-edit').val(gioitinh);
                        $('#ngaysinh-edit').val(response.data.ngaysinh);
                        $('#diachi-edit').val(response.data.diachi);
                        $('#sdt-edit').val(response.data.sdt);
                        $("#image_show-edit").html(
                            '<a href="' +
                            response.data.anh +
                            '" target="_blank">' +
                            '<img src="' +
                            response.data.anh +
                            '" width="100px"></a>'
                        );
                        $("#thumb-edit").val(response.data.anh);
                        $('#makhoa-edit').val(response.data.makhoa);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/teacherM/edit') }}/' +
                            response.data.magv)
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
                        magv: $('#magv-edit').val(),
                        tengv: $('#tengv-edit').val(),
                        gioitinh: $('#gioitinh-edit').val(),
                        ngaysinh: $('#ngaysinh-edit').val(),
                        diachi: $('#diachi-edit').val(),
                        sdt: $('#sdt-edit').val(),
                        anh: $('#thumb-edit').val(),
                        makhoa: $('#makhoa-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#' + response.data.magv).text(response.data.magv)
                        $('#tengv-' + response.data.magv).text(response.data.tengv)
                        var gioitinh = response.data.gioitinh == 0 ? "Nam" : "Nữ";
                        $('#gioitinh-' + response.data.magv).text(gioitinh)
                        $('#ngaysinh-' + response.data.magv).text(response.data.ngaysinh)
                        $('#diachi-' + response.data.magv).text(response.data.diachi)
                        $('#sdt-' + response.data.magv).text(response.data.sdt)
                        $('#anha-' + response.data.magv).attr("href", response.data.anh);
                        $('#anhimg-' + response.data.magv).attr("src", response.data.anh);
                        $('#tenkhoa-' + response.data.magv).text(response.data.tenkhoa)
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
                            toastr.success('Xóa giảng viên thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa giảng viên thất bại!')
                        }
                    })
                }
            })

        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
