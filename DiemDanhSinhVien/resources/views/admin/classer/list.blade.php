@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" style="margin:8px;" data-target="#modal-add" data-toggle="modal">Thêm lớp
            học</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã Lớp</th>
                        <th>Tên Lớp</th>
                        <th>Tên Khoa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classer as $class)
                        <tr>
                            <td id="{{ $class->malop }}">{{ $class->malop }}</td>
                            <td id="tenlop-{{ $class->malop }}">{{ $class->tenlop }}</td>
                            <td id="tenkhoa-{{ $class->malop }}">{{ $class->tenkhoa }}</td>
                            <td>
                                <button data-url="{{ route('class.edit', $class->malop) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('class.destroy', $class->malop) }}" ​ type="button"
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
                <form action="" data-url="{{ route('class.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm lớp</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã lớp</label>
                            <input required type="text" name="malop" class="form-control" id="malop-add"
                                placeholder="Nhập mã lớp">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên lớp</label>
                            <textarea required class="form-control" name="tenlop" id="tenlop-add" cols="10"
                                rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tên khoa</label>
                            <select name="tenkhoa" id="makhoa-add" class="form-control" required="required">
                                {{-- <option value="sd">{{ $facultys[0]->tenkhoa }}</option> --}}
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
                            <label for="name">Mã Lớp</label>
                            <input readonly type="text" name="malop" class="form-control" id="malop-edit"
                                placeholder="Nhập mã lớp">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên lớp</label>
                            <textarea required class="form-control" name="tenlop" id="tenlop-edit" cols="10"
                                rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Tên khoa</label>
                            <select name="tenkhoa" id="makhoa-edit" class="form-control" required="required">
                                {{-- <option value="sd">{{ $facultys[0]->tenkhoa }}</option> --}}
                                @foreach ($facultys as $faculty){
                                    <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
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
            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        malop: $('#malop-add').val(),
                        tenlop: $('#tenlop-add').val(),
                        makhoa: $('#makhoa-add').val()
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        // var str = '{{ asset('/admin/facultys/edit') }}/' + response.data
                        //     .makhoa;
                        // var str = '/admin/facultys/edit/' + response.data
                        //     .makhoa;
                        $('tbody').prepend('<tr><td id = "' + response.data.malop + '" > ' +
                            response.data.malop + '</td><td id="tenlop-' + response.data
                            .malop + '">' +
                            response.data.tenlop + '</td><td id="tenkhoa-' + response
                            .data.malop + '">' + response.data.tenkhoa +
                            '</td>' +
                            '<td><button data-url="/admin/class/edit/' + response.data
                            .malop + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/class/destroy/' + response.data
                            .malop +
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
                        console.log(response.data.malop);
                        $('#malop-edit').val(response.data.malop);
                        $('#tenlop-edit').val(response.data.tenlop);
                        $('#makhoa-edit').val(response.data.makhoa);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/class/edit') }}/' +
                            response.data.malop)
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
                        malop: $('#malop-edit').val(),
                        tenlop: $('#tenlop-edit').val(),
                        makhoa: $('#makhoa-edit').val()
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');
                        $('#' + response.data.malop).text(response.data.malop)
                        $('#tenlop-' + response.data.malop).text(response.data.tenlop)
                        $('#tenkhoa-' + response.data.malop).text(response.data
                            .tenkhoa)
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
                            toastr.success('Xóa lớp thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa lớp thất bại!')
                        }
                    })
                }
            })

        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
