@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" style="margin:8px;" data-toggle="modal">Thêm
            Khoa</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã Khoa</th>
                        <th>Tên Khoa</th>
                        <th>Ngày thành lập</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facultys as $faculty)
                        <tr>
                            <td id="{{ $faculty->makhoa }}">{{ $faculty->makhoa }}</td>
                            <td id="tenkhoa-{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</td>
                            <td id="ngaythanhlap-{{ $faculty->makhoa }}">{{ $faculty->ngaythanhlap }}</td>
                            <td>
                                <button data-url="{{ route('facultys.edit', $faculty->makhoa) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('facultys.destroy', $faculty->makhoa) }}" ​ type="button"
                                    data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.facultys.add')
    @include('admin.facultys.edit')
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
                        makhoa: $('#makhoa-add').val(),
                        tenkhoa: $('#tenkhoa-add').val(),
                        ngaythanhlap: $('#ngaythanhlap-add').val()
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        // var str = '{{ asset('/admin/facultys/edit') }}/' + response.data
                        //     .makhoa;
                        var str = '/admin/facultys/edit/' + response.data
                            .makhoa;
                        $('tbody').prepend('<tr><td id = "' + response.data.makhoa + '" > ' +
                            response.data.makhoa + '</td><td id="tenkhoa-' + response.data
                            .makhoa + '">' +
                            response.data.tenkhoa + '</td><td id="ngaythanhlap-' + response
                            .data.makhoa + '">' + response.data.ngaythanhlap +
                            '</td>' +
                            '<td><button data-url="/admin/facultys/edit/' + response.data
                            .makhoa + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/facultys/destroy/' + response.data
                            .makhoa +
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
                    //phương thức get
                    type: 'get',
                    url: url,
                    success: function(response) {
                        console.log('success');
                        console.log(response.data.makhoa);
                        $('#makhoa-edit').val(response.data.makhoa);
                        $('#tenkhoa-edit').val(response.data.tenkhoa);
                        $('#ngaythanhlap-edit').val(response.data.ngaythanhlap);
                        // $('#form-edit').attr('data-url',
                        //     '/admin/facultys/edit/' + response.data.makhoa)
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/facultys/edit') }}/' +
                            response.data.makhoa)
                    },
                    error: function(error) {

                    }
                })
            })
            // $('.btn-edit').click(function(e) {
            //     var url = $(this).attr('data-url');
            //     console.log("Hello");
            //     console.log(url);
            //     $('#modal-edit').modal('show');
            //     e.preventDefault();
            //     $.ajax({
            //         //phương thức get
            //         type: 'get',
            //         url: url,
            //         success: function(response) {
            //             console.log('success');
            //             console.log(response.data.makhoa);
            //             $('#makhoa-edit').val(response.data.makhoa);
            //             $('#tenkhoa-edit').val(response.data.tenkhoa);
            //             $('#ngaythanhlap-edit').val(response.data.ngaythanhlap);
            //             // $('#form-edit').attr('data-url',
            //             //     '/admin/facultys/edit/' + response.data.makhoa)
            //             $('#form-edit').attr('data-url',
            //                 '{{ asset('/admin/facultys/edit') }}/' +
            //                 response.data.makhoa)
            //         },
            //         error: function(error) {

            //         }
            //     })
            // })
            $('#form-edit').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'put',
                    url: url,
                    data: {
                        makhoa: $('#makhoa-edit').val(),
                        tenkhoa: $('#tenkhoa-edit').val(),
                        ngaythanhlap: $('#ngaythanhlap-edit').val()
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');
                        $('#' + response.data.makhoa).text(response.data.makhoa)
                        $('#tenkhoa-' + response.data.makhoa).text(response.data.tenkhoa)
                        $('#ngaythanhlap-' + response.data.makhoa).text(response.data
                            .ngaythanhlap)
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
                            toastr.success('Xóa khoa thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa khoa thất bại!')
                        }
                    })
                }
            })
            // $('.btn-delete') click(function() {
            //     var url = $(this).attr('data-url');
            //     var _this = $(this);
            //     if (confirm('Bạn có muốn xóa không?')) {
            //         $.ajax({
            //             type: 'delete',
            //             url: url,
            //             success: function(response) {
            //                 toastr.success('Xóa khoa thành công!')
            //                 _this.parent().parent().remove();
            //             },
            //             error: function(jqXHR, textStatus, errorThrown) {
            //                 toastr.success('Xóa khoa thất bại!')
            //             }
            //         })
            //     }
            // })
        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
