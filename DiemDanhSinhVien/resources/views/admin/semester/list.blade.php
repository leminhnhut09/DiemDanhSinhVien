@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Năm học</th>
                        <th>Học kỳ</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semesters as $semester)
                        <tr>
                            <td id="namhoc-{{ $semester->namhoc }}-{{ $semester->hocky }}">{{ $semester->namhoc }}
                            </td>
                            <td id="hocky-{{ $semester->namhoc }}-{{ $semester->hocky }}">{{ $semester->hocky }}</td>
                            <td id="tgbd-{{ $semester->namhoc }}-{{ $semester->hocky }}">{{ $semester->thoigianbd }}
                            </td>
                            <td id="tgkt-{{ $semester->namhoc }}-{{ $semester->hocky }}">{{ $semester->thoigiankt }}
                            </td>

                            <td>
                                <button data-url="/admin/semester/edit/{{ $semester->namhoc }}/{{ $semester->hocky }}"
                                    ​ type="button" data-target="#edit" data-toggle="modal"
                                    class="btn btn-warning btn-edit">Edit</button>
                                <button
                                    data-url="/admin/semester/destroy/{{ $semester->namhoc }}/{{ $semester->hocky }}"
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
                <form action="" data-url="{{ route('semester.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm học kỳ</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Năm học</label>
                            <input type="text" name="namhoc" class="form-control" id="namhoc-add"
                                placeholder="Nhập năm học">
                        </div>

                        <div class="form-group">
                            <label for="description">Học kỳ</label>
                            <input type="text" name="hocky" class="form-control" id="hocky-add" placeholder="Nhập học kỳ">
                        </div>


                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input name="ngaybd" type="date" name="" id="ngaybd-add" class="form-control" value=""
                                required="required" title="">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày kết thúc</label>
                            <input name="ngaykt" type="date" name="" id="ngaykt-add" class="form-control" value=""
                                required="required" title="">
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
                            <label for="name">Năm học</label>
                            <input type="text" name="namhoc" class="form-control" id="namhoc-edit"
                                placeholder="Nhập năm học">
                        </div>

                        <div class="form-group">
                            <label for="description">Học kỳ</label>
                            <input type="text" name="hocky" class="form-control" id="hocky-edit"
                                placeholder="Nhập học kỳ">
                        </div>


                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input name="ngaybd" type="date" name="" id="ngaybd-edit" class="form-control" value=""
                                required="required" title="">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày kết thúc</label>
                            <input name="ngaykt" type="date" name="" id="ngaykt-edit" class="form-control" value=""
                                required="required" title="">
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
                        namhoc: $('#namhoc-add').val(),
                        hocky: $('#hocky-add').val(),
                        ngaybd: $('#ngaybd-add').val(),
                        ngaykt: $('#ngaykt-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend('<tr><td id = "namhoc-' + response.data.namhoc +
                            '-' + response.data.hocky + '" > ' +
                            response.data.namhoc + '</td><td id = "hocky-' + response.data
                            .namhoc +
                            '-' + response.data.hocky + '" > ' +
                            response.data.hocky + '</td><td id = "tgbd-' + response.data
                            .namhoc +
                            '-' + response.data.hocky + '" > ' +
                            response.data.thoigianbd + '</td><td id = "tgkt-' + response
                            .data.namhoc +
                            '-' + response.data.hocky + '" > ' +
                            response.data.thoigiankt + '</td>' +
                            '<td><button data-url="/admin/semester/edit/' + response.data
                            .namhoc + '/' + response.data.hocky + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                            '<button data-url="/admin/semester/destroy/' + response.data
                            .namhoc + '/' + response.data.hocky +
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
                        $('#namhoc-edit').val(response.data.namhoc);
                        $('#hocky-edit').val(response.data.hocky);
                        $('#ngaybd-edit').val(response.data.thoigianbd);
                        $('#ngaykt-edit').val(response.data.thoigiankt);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/semester/edit/') }}/' +
                            response.data.namhoc + '/' + response.data.hocky);
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
                        namhoc: $('#namhoc-edit').val(),
                        hocky: $('#hocky-edit').val(),
                        ngaybd: $('#ngaybd-edit').val(),
                        ngaykt: $('#ngaykt-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#namhoc-' + response.data.namhoc + '-' + response.data.hocky).text(
                            response
                            .data.namhoc)
                        $('#hocky-' + response.data.namhoc + '-' + response.data.hocky).text(
                            response
                            .data.hocky)
                        $('#tgbd-' + response.data.namhoc + '-' + response.data.hocky).text(
                            response
                            .data.thoigianbd)
                        $('#tgkt-' + response.data.namhoc + '-' + response.data.hocky).text(
                            response
                            .data.thoigiankt)
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
