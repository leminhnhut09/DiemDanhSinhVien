@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã ca học</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Tiết bắt đầu</th>
                        <th>Tiết kết thúc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td id="{{ $lesson->macahoc }}">{{ $lesson->macahoc }}</td>
                            <td id="tgbd-{{ $lesson->macahoc }}">{{ $lesson->thoigianbd }}</td>
                            <td id="tgkt-{{ $lesson->macahoc }}">{{ $lesson->thoigiankt }}</td>
                            <td id="tbd-{{ $lesson->macahoc }}">{{ $lesson->tietbd }}</td>
                            <td id="tkt-{{ $lesson->macahoc }}">{{ $lesson->tietkt }}</td>
                            <td>
                                <button data-url="{{ route('lesson.edit', $lesson->macahoc) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>
                                <button data-url="{{ route('lesson.destroy', $lesson->macahoc) }}" ​ type="button"
                                    data-target="#delete" data-toggle="modal"
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
                <form action="" data-url="{{ route('lesson.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm ca học</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã ca học</label>
                            <input type="text" name="macahoc" class="form-control" id="macahoc-add"
                                placeholder="Nhập mã ca học">
                        </div>

                        <div class="form-group">
                            <label for="">Thời gian bắt đầu</label>
                            <input name="tgbd" type="time" name="" id="tgbd-add" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
                            <input name="tgkt" type="time" name="" id="tgkt-add" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Tiết bắt đầu</label>
                            <input type="number" name="tietbd" class="form-control" id="tietbd-add"
                                placeholder="Nhập tiết bắt đầu">
                        </div>
                        <div class="form-group">
                            <label for="">Tiết kết thúc</label>
                            <input type="number" name="tietkt" class="form-control" id="tietkt-add"
                                placeholder="Nhập tiết kết thúc">
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
                            <label for="name">Mã ca học</label>
                            <input type="text" name="macahoc" class="form-control" id="macahoc-edit"
                                placeholder="Nhập mã ca học">
                        </div>

                        <div class="form-group">
                            <label for="">Thời gian bắt đầu</label>
                            <input name="tgbd" type="time" name="" id="tgbd-edit" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
                            <input name="tgkt" type="time" name="" id="tgkt-edit" class="form-control" value=""
                                required="required" title="">
                        </div>

                        <div class="form-group">
                            <label for="">Tiết bắt đầu</label>
                            <input type="number" name="tietbd" class="form-control" id="tietbd-edit"
                                placeholder="Nhập tiết bắt đầu">
                        </div>
                        <div class="form-group">
                            <label for="">Tiết kết thúc</label>
                            <input type="number" name="tietkt" class="form-control" id="tietkt-edit"
                                placeholder="Nhập tiết kết thúc">
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
                        macahoc: $('#macahoc-add').val(),
                        tgbd: $('#tgbd-add').val(),
                        tgkt: $('#tgkt-add').val(),
                        tietbd: $('#tietbd-add').val(),
                        tietkt: $('#tietkt-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend('<tr><td id = "' + response.data.macahoc + '" > ' +
                            response.data.macahoc + '</td><td id="tgbd-' + response
                            .data
                            .macahoc + '">' +
                            response.data.thoigianbd + '</td><td id="tgkt-' + response
                            .data.macahoc + '">' + response.data.thoigiankt +
                            '</td><td id="tbd-' + response
                            .data.macahoc + '">' + response.data.tietbd +
                            '</td><td id="tkt-' + response
                            .data.macahoc + '">' + response.data.tietkt +
                            '</td>' +
                            '<td><button data-url="/admin/lesson/edit/' + response.data
                            .macahoc + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                            '<button data-url="/admin/lesson/destroy/' + response.data
                            .macahoc +
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
                        $('#macahoc-edit').val(response.data.macahoc);
                        $('#tgbd-edit').val(response.data.thoigianbd);
                        $('#tgkt-edit').val(response.data.thoigiankt);
                        $('#tietbd-edit').val(response.data.tietbd);
                        $('#tietkt-edit').val(response.data.tietkt);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/lesson/edit') }}/' +
                            response.data.macahoc);
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
                        macahoc: $('#macahoc-edit').val(),
                        tgbd: $('#tgbd-edit').val(),
                        tgkt: $('#tgkt-edit').val(),
                        tietbd: $('#tietbd-edit').val(),
                        tietkt: $('#tietkt-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#' + response.data.macahoc).text(response.data.macahoc)
                        $('#tgbd-' + response.data.macahoc).text(response.data.thoigianbd)
                        $('#tgkt-' + response.data.macahoc).text(response.data.thoigiankt)
                        $('#tbd-' + response.data.macahoc).text(response.data.tietbd)
                        $('#tkt-' + response.data.macahoc).text(response.data.tietkt)
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
                            toastr.success('Xóa ca học thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa ca học thất bại!')
                        }
                    })
                }
            })
        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
