@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã phòng</th>
                        <th>Tên phòng</th>
                        <th>Sức chứa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td id="{{ $room->maphong }}">{{ $room->maphong }}</td>
                            <td id="tenphong-{{ $room->maphong }}">{{ $room->tenphong }}</td>
                            <td id="succhua-{{ $room->maphong }}">{{ $room->succhua }}</td>
                            <td>
                                <button data-url="{{ route('room.edit', $room->maphong) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>
                                <button data-url="{{ route('room.destroy', $room->maphong) }}" ​ type="button"
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
                <form action="" data-url="{{ route('room.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm phòng học</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã phòng học</label>
                            <input type="text" name="maphong" class="form-control" id="maphong-add"
                                placeholder="Nhập mã phòng học">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên phòng học</label>
                            <input type="text" name="tenphong" class="form-control" id="tenphong-add"
                                placeholder="Nhập tên phòng học">
                        </div>

                        <div class="form-group">
                            <label for="">Sức chứa</label>
                            <input type="number" name="succhua" class="form-control" id="succhua-add"
                                placeholder="Nhập sức chứa">
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
                            <label for="name">Mã phòng học</label>
                            <input type="text" name="maphong" class="form-control" id="maphong-edit"
                                placeholder="Nhập mã phòng học">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên phòng học</label>
                            <input type="text" name="tenphong" class="form-control" id="tenphong-edit"
                                placeholder="Nhập tên phòng học">
                        </div>

                        <div class="form-group">
                            <label for="">Sức chứa</label>
                            <input type="number" name="succhua" class="form-control" id="succhua-edit"
                                placeholder="Nhập sức chứa">
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
                        maphong: $('#maphong-add').val(),
                        tenphong: $('#tenphong-add').val(),
                        succhua: $('#succhua-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend('<tr><td id = "' + response.data.maphong + '" > ' +
                            response.data.maphong + '</td><td id="tenphong-' + response.data
                            .maphong + '">' +
                            response.data.tenphong + '</td><td id="succhua-' + response
                            .data.maphong + '">' + response.data.succhua +
                            '</td>' +
                            '<td><button data-url="/admin/room/edit/' + response.data
                            .maphong + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                            '<button data-url="/admin/room/destroy/' + response.data
                            .maphong +
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
                        $('#maphong-edit').val(response.data.maphong);
                        $('#tenphong-edit').val(response.data.tenphong);
                        $('#succhua-edit').val(response.data.succhua);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/room/edit') }}/' +
                            response.data.maphong);
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
                        maphong: $('#maphong-edit').val(),
                        tenphong: $('#tenphong-edit').val(),
                        succhua: $('#succhua-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#' + response.data.maphong).text(response.data.maphong)
                        $('#tenphong-' + response.data.maphong).text(response.data.tenphong)
                        $('#succhua-' + response.data.maphong).text(response.data.succhua)
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
