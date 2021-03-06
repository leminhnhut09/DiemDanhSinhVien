@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" style="margin:8px;" data-target="#modal-add" data-toggle="modal">Thêm tài
            khoản</a>
        <div class="table-responsive">
            <table style="text-align: center;" class="table table-hover">
                <thead>
                    <tr>
                        <th style="min-width: 100px;">Tài khoản</th>
                        <th style="min-width: 140px;">Mật khẩu</th>
                        <th style="min-width: 120px;">Quyền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td style="vertical-align: middle;" id="{{ $account->email }}">{{ $account->email }}</td>
                            <td style="vertical-align: middle;" id="pass-{{ $account->email }}">{{ $account->password }}
                            </td>
                            <td style="vertical-align: middle;" id="quyen-{{ $account->email }}">{{ $account->name }}
                            </td>

                            {{-- <td>
                                <button data-url="{{ route('account.edit', $account->mahp) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('account.destroy', $account->mahp) }}" ​ type="button"
                                    data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Xóa</button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- add --}}
    {{-- <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-url="{{ route('term.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm học phần</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Mã học phần</label>
                            <input required type="text" name="mahp" class="form-control" id="mahp-add"
                                placeholder="Nhập mã học phần">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên học phần</label>
                            <select name="mamh" id="mamh-add" class="form-control" required="required">
                                @foreach ($subjects as $subject){
                                    <option value="{{ $subject->mamh }}">{{ $subject->tenmh }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên giảng viên</label>
                            <select name="magv" id="magv-add" class="form-control" required="required">
                                @foreach ($teachers as $teacher){
                                    <option value="{{ $teacher->magv }}">{{ $teacher->tengv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Năm học</label>
                            <select name="namhoc" id="namhoc-add" class="form-control" required="required">
                                @foreach ($years as $year){
                                    <option value="{{ $year->namhoc }}">{{ $year->namhoc }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Học kỳ</label>
                            <select name="hocky" id="hocky-add" class="form-control" required="required">
                                @foreach ($semesters as $semester){
                                    <option value="{{ $semester->hocky }}">{{ $semester->hocky }}</option>
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
    </div> --}}
    {{-- edit --}}
    {{-- <div class="modal fade" id="modal-edit">
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
                            <label for="name">Mã học phần</label>
                            <input readonly type="text" name="mahp" class="form-control" id="mahp-edit"
                                placeholder="Nhập mã học phần">
                        </div>

                        <div class="form-group">
                            <label for="description">Tên học phần</label>
                            <select name="mamh" id="mamh-edit" class="form-control" required="required">
                                @foreach ($subjects as $subject){
                                    <option value="{{ $subject->mamh }}">{{ $subject->tenmh }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên giảng viên</label>
                            <select name="magv" id="magv-edit" class="form-control" required="required">
                                @foreach ($teachers as $teacher){
                                    <option value="{{ $teacher->magv }}">{{ $teacher->tengv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Năm học</label>
                            <select name="namhoc" id="namhoc-edit" class="form-control" required="required">
                                @foreach ($years as $year){
                                    <option value="{{ $year->namhoc }}">{{ $year->namhoc }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Học kỳ</label>
                            <select name="hocky" id="hocky-edit" class="form-control" required="required">
                                @foreach ($semesters as $semester){
                                    <option value="{{ $semester->hocky }}">{{ $semester->hocky }}</option>
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
    </div> --}}


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
            // $('#form-add').submit(function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('data-url');
            //     $.ajax({
            //         type: 'post',
            //         url: url,
            //         data: {
            //             mahp: $('#mahp-add').val(),
            //             mamh: $('#mamh-add').val(),
            //             magv: $('#magv-add').val(),
            //             namhoc: $('#namhoc-add').val(),
            //             hocky: $('#hocky-add').val(),
            //         },
            //         success: function(response) {
            //             toastr.success(response.message)
            //             $('#modal-add').modal('hide');
            //             $('tbody').prepend('<tr><td id = "' + response.data.mahp + '" > ' +
            //                 response.data.mahp + '</td><td id="tenhp-' + response.data
            //                 .mahp + '">' +
            //                 response.data.tenmh + '</td><td id="tengv-' + response
            //                 .data.mahp + '">' + response.data.tengv +
            //                 '</td><td id="namhoc-' + response.data
            //                 .mahp + '">' +
            //                 response.data.namhoc_id + '</td><td id="hocky-' + response.data
            //                 .mahp + '">' +
            //                 response.data.hocky_id + '</td>' +
            //                 '<td><button data-url="/admin/term/edit/' + response.data
            //                 .mahp + '" type="button" ' +
            //                 'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
            //                 '<button data-url="/admin/term/destroy/' + response.data
            //                 .mahp +
            //                 '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
            //                 ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
            //             );
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             //xử lý lỗi tại đây
            //             console.log('err');
            //         }
            //     })
            // })
            // $(document).on('click', '.btn-edit', function(e) {
            //     var url = $(this).attr('data-url');
            //     console.log("Hello");
            //     console.log(url);
            //     $('#modal-edit').modal('show');
            //     e.preventDefault();
            //     $.ajax({
            //         type: 'get',
            //         url: url,
            //         success: function(response) {
            //             console.log('success');
            //             $('#mahp-edit').val(response.data.mahp);
            //             $('#mamh-edit').val(response.data.mamh);
            //             $('#magv-edit').val(response.data.magv);
            //             $('#namhoc-edit').val(response.data.namhoc_id);
            //             $('#hocky-edit').val(response.data.hocky_id);
            //             $('#form-edit').attr('data-url',
            //                 '{{ asset('/admin/term/edit') }}/' +
            //                 response.data.mahp);
            //         },
            //         error: function(error) {}
            //     })
            // })

            // $('#form-edit').submit(function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('data-url');
            //     $.ajax({
            //         type: 'put',
            //         url: url,
            //         data: {
            //             mahp: $('#mahp-edit').val(),
            //             mamh: $('#mamh-edit').val(),
            //             magv: $('#magv-edit').val(),
            //             namhoc: $('#namhoc-edit').val(),
            //             hocky: $('#hocky-edit').val(),
            //         },
            //         success: function(response) {
            //             toastr.success(response.message)
            //             $('#modal-edit').modal('hide');

            //             $('#' + response.data.mahp).text(response.data.mahp)
            //             $('#tenhp-' + response.data.mahp).text(response.data.tenmh)
            //             $('#tengv-' + response.data.mahp).text(response.data.tengv)
            //             $('#namhoc-' + response.data.mahp).text(response.data.namhoc_id)
            //             $('#hocky-' + response.data.mahp).text(response.data.hocky_id)
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             //xử lý lỗi tại đây
            //         }
            //     })
            // })
            // $(document).on('click', '.btn-delete', function() {
            //     var url = $(this).attr('data-url');
            //     var _this = $(this);
            //     if (confirm('Bạn có muốn xóa không?')) {
            //         $.ajax({
            //             type: 'delete',
            //             url: url,
            //             success: function(response) {
            //                 toastr.success('Xóa học phần thành công!')
            //                 _this.parent().parent().remove();
            //             },
            //             error: function(jqXHR, textStatus, errorThrown) {
            //                 toastr.success('Xóa học phần thất bại!')
            //             }
            //         })
            //     }
            // })
        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
