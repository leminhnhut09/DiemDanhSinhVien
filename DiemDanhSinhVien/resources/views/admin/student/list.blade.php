@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" style="margin:8px;" data-target="#modal-add" data-toggle="modal">Thêm
            sinh viên</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã SV</th>
                        <th>Tên sinh viên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ảnh</th>
                        <th>Lớp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td id="{{ $student->masv }}">{{ $student->masv }}</td>
                            <td id="tensv-{{ $student->masv }}">{{ $student->tensv }}</td>
                            <td id="gioitinh-{{ $student->masv }}">{{ $student->gioitinh == 0 ? 'Nam' : 'Nữ' }}</td>
                            <td id="ngaysinh-{{ $student->masv }}">{{ $student->ngaysinh }}</td>
                            <td id="diachi-{{ $student->masv }}">{{ $student->diachi }}</td>
                            <td id="sdt-{{ $student->masv }}">{{ $student->sdt }}</td>
                            <td id="anh-{{ $student->masv }}">
                                <a id="anha-{{ $student->masv }}" href="{{ $student->anh }}" target="_blank">
                                    <img id="anhimg-{{ $student->masv }}" src="{{ $student->anh }}" height="30px"
                                        alt="">
                                </a>
                            </td>
                            <td id="tenlop-{{ $student->masv }}">{{ $student->tenlop }}</td>
                            <td>
                                <button data-url="{{ route('studentM.edit', $student->masv) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('studentM.destroy', $student->masv) }}" ​ type="button"
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
                <form action="" data-url="{{ route('studentM.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sinh viên</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã sinh viên</label>
                            <input required type="text" name="masv" class="form-control" id="masv-add"
                                placeholder="Nhập mã sinh viên">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên sinh viên</label>
                            <input required type="text" name="tensv" class="form-control" id="tensv-add"
                                placeholder="Nhập tên sinh viên">
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
                            <label for="">Tên lớp</label>
                            <select name="malop" id="malop-add" class="form-control" required="required">
                                @foreach ($classes as $class)faculty){
                                    <option value="{{ $class->malop }}">{{ $class->tenlop }}</option>
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
                            <label for="name">Mã sinh viên</label>
                            <input readonly type="text" name="masv" class="form-control" id="masv-edit"
                                placeholder="Nhập mã sinh viên">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên sinh viên</label>
                            <input required type="text" name="tensv" class="form-control" id="tensv-edit"
                                placeholder="Nhập tên sinh viên">
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
                            <label for="">Tên lớp</label>
                            <select name="malop" id="malop-edit" class="form-control" required="required">
                                @foreach ($classes as $class)faculty){
                                    <option value="{{ $class->malop }}">{{ $class->tenlop }}</option>
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
                        masv: $('#masv-add').val(),
                        tensv: $('#tensv-add').val(),
                        gioitinh: $('#gioitinh-add').val(),
                        ngaysinh: $('#ngaysinh-add').val(),
                        diachi: $('#diachi-add').val(),
                        sdt: $('#sdt-add').val(),
                        anh: $('#thumb-add').val(),
                        malop: $('#malop-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');

                        var str = '<td id="anh-' + response.data.masv + '"><a href="' + response
                            .data
                            .anh + '" target="_blank"><img src="' + response.data.anh +
                            '" height="30px" alt=""></a></td>'


                        var gioitinh = response.data.gioitinh == 0 ? "Nam" : "Nữ";
                        $('tbody').prepend('<tr><td id = "' + response.data.masv + '" > ' +
                            response.data.masv + '</td><td id="tensv-' + response.data
                            .masv + '">' +
                            response.data.tensv + '</td><td id="gioitinh-' + response
                            .data.masv + '">' + gioitinh +
                            '</td><td id="ngaysinh-' + response.data
                            .masv + '">' +
                            response.data.ngaysinh + '</td><td id="diachi-' + response.data
                            .masv + '">' +
                            response.data.diachi + '</td><td id="sdt-' + response.data
                            .masv + '">' +
                            response.data.sdt + '</td>' + str + '<td id="tenlop-' + response
                            .data
                            .masv + '">' +
                            response.data.tenlop + '</td>' +
                            '<td><button data-url="/admin/studentM/edit/' + response.data
                            .masv + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/studentM/destroy/' + response.data
                            .masv +
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
                        console.log(response.data.tenlop);
                        $('#masv-edit').val(response.data.masv);
                        $('#tensv-edit').val(response.data.tensv);
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
                        $('#malop-edit').val(response.data.malop);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/studentM/edit') }}/' +
                            response.data.masv)
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
                        masv: $('#masv-edit').val(),
                        tensv: $('#tensv-edit').val(),
                        gioitinh: $('#gioitinh-edit').val(),
                        ngaysinh: $('#ngaysinh-edit').val(),
                        diachi: $('#diachi-edit').val(),
                        sdt: $('#sdt-edit').val(),
                        anh: $('#thumb-edit').val(),
                        malop: $('#malop-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');
                        $('#' + response.data.masv).text(response.data.masv)
                        $('#tensv-' + response.data.masv).text(response.data.tensv)
                        var gioitinh = response.data.gioitinh == 0 ? "Nam" : "Nữ";
                        $('#gioitinh-' + response.data.masv).text(gioitinh)
                        $('#ngaysinh-' + response.data.masv).text(response.data.ngaysinh)
                        $('#diachi-' + response.data.masv).text(response.data.diachi)
                        $('#sdt-' + response.data.masv).text(response.data.sdt)
                        $('#anha-' + response.data.masv).attr("href", response.data.anh);
                        $('#anhimg-' + response.data.masv).attr("src", response.data.anh);
                        $('#tenlop-' + response.data.masv).text(response.data.tenlop)
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
                            toastr.success('Xóa sinh viên thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa sinh viên thất bại!')
                        }
                    })
                }
            })

        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
