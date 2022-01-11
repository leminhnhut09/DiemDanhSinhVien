@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" class="btn btn-success btn-add" style="margin:8px;" data-target="#modal-add" data-toggle="modal">Thêm lớp
            học
            phần</a>
        <a id="click-file-excel" href="#" style="margin:8px;" class="btn btn-success btn-add" data-target="#modal-import"
            data-toggle="modal">Import file</a>
        {{-- Filter --}}
        <div style="display: flex; justify-content: space-evenly">
            <div class="form-group"
                style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                <label style="width:auto; margin-right: 10px" for="">Khoa</label>
                <select style="width:200px;" name="makhoa" id="makhoa-filter" class="form-control" required="required">
                    <option value="All">Tất cả</option>
                    @foreach ($facultys as $faculty) {
                        <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                        }
                    @endforeach
                </select>
            </div>
            <div class="form-group"
                style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                <label style="width:auto; margin-right: 10px " for="">Năm học</label>
                <select style="width:200px;" name="namhoc" id="namhoc-filter" class="form-control" required="required">
                    <option value="All">Tất cả</option>
                    @foreach ($years as $year) {
                        <option value="{{ $year->namhoc }}">{{ $year->namhoc }}</option>
                        }
                    @endforeach
                </select>
            </div>
            <div class="form-group"
                style="width:30%; display: flex; align-items: center; justify-content: center; margin-top: 17px; margin-bottom:25px;">
                <label style="width:auto; margin-right: 10px" for="">Học kỳ</label>
                <select style="width:140px;" name="hocky" id="hocky-filter" class="form-control" required="required">
                    <option value="All">Tất cả</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        {{-- End filter --}}
        <div class="table-responsive">
            <table style="text-align: center;" class="table table-hover">
                <thead>
                    <tr>
                        <th style="min-width: 100px;">Mã học phần</th>
                        <th style="min-width: 140px;">Tên học phần</th>
                        <th style="min-width: 120px;">Tên giảng viên</th>
                        <th style="min-width: 60px;">Năm học</th>
                        <th style="min-width: 60px;">Học kỳ</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($terms as $term)
                        <tr>
                            <td style="vertical-align: middle;" id="{{ $term->mahp }}">{{ $term->mahp }}</td>
                            <td style="vertical-align: middle;" id="tenhp-{{ $term->mahp }}">{{ $term->tenmh }}</td>
                            <td style="vertical-align: middle;" id="tengv-{{ $term->mahp }}">{{ $term->tengv }}</td>
                            <td style="vertical-align: middle;" id="namhoc-{{ $term->mahp }}">{{ $term->namhoc_id }}
                            </td>
                            <td style="vertical-align: middle;" id="hocky-{{ $term->mahp }}">{{ $term->hocky_id }}
                            </td>
                            <td>
                                <button data-url="{{ route('term.edit', $term->mahp) }}" ​ type="button"
                                    data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>
                                <button data-url="{{ route('term.destroy', $term->mahp) }}" ​ type="button"
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
                <form action="" data-url="{{ route('term.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm học phần</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
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
    </div>
    {{-- import file --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="form-import" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Import file</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Chọn file</label>
                            <input type="file" id="file-excel" name="file-excel">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <a id="import-excel" href="#" style="margin:8px;" class="btn btn-success btn-add">Import
                            file</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- @include('admin.classer.add') --}}
    {{-- @include('admin.facultys.edit') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
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
        $("#namhoc-add").change(function() {
            var namhoc = $("#namhoc-add").val();
            var url = '/admin/term/semester/' + namhoc;
            $.ajax({
                processData: false,
                contentType: false,
                type: "GET",
                dataType: "JSON",
                url: url,
                success: function(response) {
                    console.log(response.data);
                    var $select = $('#hocky-add');
                    $select.find('option').remove();
                    $.each(response.data, function(key, value) {
                        $select.append('<option value=' + value.hocky + '>' + value.hocky +
                            '</option>');
                    });
                },
                error: function(parameter) {
                    alert('fail');
                }
            });
        });
        $("#namhoc-edit").change(function() {
            var namhoc = $("#namhoc-edit").val();
            var url = '/admin/term/semester/' + namhoc;
            $.ajax({
                processData: false,
                contentType: false,
                type: "GET",
                dataType: "JSON",
                url: url,
                success: function(response) {
                    console.log(response.data);
                    var $select = $('#hocky-edit');
                    $select.find('option').remove();
                    $.each(response.data, function(key, value) {
                        $select.append('<option value=' + value.hocky + '>' + value.hocky +
                            '</option>');
                    });
                },
                error: function(parameter) {
                    alert('fail');
                }
            });
        });
        $(document).ready(function() {
            // import file
            let selectedFile;
            $(document).on('change', '#click-file-excel', function() {
                selectedFile = event.target.files[0];
                console.log(selectedFile);
            })
            $(document).on('change', '#file-excel', function() {
                selectedFile = event.target.files[0];
                console.log(selectedFile);
            })
            $(document).on('click', '#import-excel', function() {
                if (selectedFile) {
                    console.log('import');
                    let fileReader = new FileReader();
                    fileReader.readAsBinaryString(selectedFile);
                    fileReader.onload = (event) => {
                        let data = event.target.result;
                        let workbook = XLSX.read(data, {
                            type: "binary"
                        });
                        workbook.SheetNames.forEach(sheet => {
                            let rowObject = XLSX.utils.sheet_to_row_object_array(workbook
                                .Sheets[sheet]);
                            console.log(rowObject);
                            $.ajax({
                                type: 'post',
                                datatype: "JSON",
                                url: '/admin/term/addXLSX',
                                data: {
                                    arr: rowObject
                                },
                                success: function(response) {
                                    toastr.success(response.message)
                                    $('#modal-import').modal('hide');
                                    console.log(response.data);
                                    if (response.data == null) return;
                                    for (var i = 0; i < response.data.length; i++) {
                                        $('tbody').prepend(
                                            '<tr><td style="vertical-align: middle;" id = "' +
                                            response.data[i]
                                            .mahp + '" > ' +
                                            response.data[i].mahp +
                                            '</td><td style="vertical-align: middle;" id="tenhp-' +
                                            response
                                            .data[i]
                                            .mahp + '">' +
                                            response.data[i].tenmh +
                                            '</td><td style="vertical-align: middle;" id="tengv-' +
                                            response
                                            .data[i].mahp + '">' + response
                                            .data[i]
                                            .tengv +
                                            '</td><td style="vertical-align: middle;" id="namhoc-' +
                                            response
                                            .data[i]
                                            .mahp + '">' +
                                            response.data[i].namhoc_id +
                                            '</td><td style="vertical-align: middle;" id="hocky-' +
                                            response
                                            .data[i]
                                            .mahp + '">' +
                                            response.data[i].hocky_id +
                                            '</td>' +
                                            '<td><button data-url="/admin/term/edit/' +
                                            response.data[i]
                                            .mahp + '" type="button" ' +
                                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                                            '<button data-url="/admin/term/destroy/' +
                                            response.data[i]
                                            .mahp +
                                            '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                                            ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                                        );
                                    }

                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    //xử lý lỗi tại đây
                                    console.log('err');
                                }
                            })

                        });
                    }
                }
            })
            // end import file
            function buildTable(data) {
                var table = document.getElementById('table-body')
                table.innerHTML = ''
                for (var i = 0; i < data.length; i++) {
                    row = '<tr><td style="vertical-align: middle;" id = "' +
                        data[i].mahp + '" > ' + data[i].mahp +
                        '</td><td style="vertical-align: middle;" id="tenhp-' +
                        data[i].mahp + '">' + data[i].tenmh +
                        '</td><td style="vertical-align: middle;" id="tengv-' +
                        data[i].mahp + '">' + data[i].tengv +
                        '</td><td style="vertical-align: middle;" id="namhoc-' + data[i].mahp + '">' +
                        data[i].namhoc_id + '</td><td style="vertical-align: middle;" id="hocky-' +
                        data[i].mahp + '">' + data[i].hocky_id + '</td>' +
                        '<td><button data-url="/admin/term/edit/' + data[i]
                        .mahp + '" type="button" ' +
                        'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                        '<button data-url="/admin/term/destroy/' + data[i]
                        .mahp +
                        '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                        ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                    table.innerHTML += row
                }
            }

            // filter
            $(document).on('change', '#makhoa-filter, #namhoc-filter, #hocky-filter', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'put',
                    url: '/admin/term/filter',
                    data: {
                        khoa: $('#makhoa-filter').val(),
                        namhoc: $('#namhoc-filter').val(),
                        hocky: $('#hocky-filter').val()
                    },
                    success: function(response) {
                        console.log(response.data);

                        buildTable(response.data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })

            })
            // end filter


            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        mahp: $('#mahp-add').val(),
                        mamh: $('#mamh-add').val(),
                        magv: $('#magv-add').val(),
                        namhoc: $('#namhoc-add').val(),
                        hocky: $('#hocky-add').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend('<tr><td style="vertical-align: middle;" id = "' +
                            response.data.mahp + '" > ' +
                            response.data.mahp +
                            '</td><td style="vertical-align: middle;" id="tenhp-' + response
                            .data
                            .mahp + '">' +
                            response.data.tenmh +
                            '</td><td style="vertical-align: middle;" id="tengv-' + response
                            .data.mahp + '">' + response.data.tengv +
                            '</td><td style="vertical-align: middle;" id="namhoc-' +
                            response
                            .data
                            .mahp + '">' +
                            response.data.namhoc_id +
                            '</td><td style="vertical-align: middle;" id="hocky-' + response
                            .data
                            .mahp + '">' +
                            response.data.hocky_id + '</td>' +
                            '<td><button data-url="/admin/term/edit/' + response.data
                            .mahp + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/term/destroy/' + response.data
                            .mahp +
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
                        $('#mahp-edit').val(response.data.mahp);
                        $('#mamh-edit').val(response.data.mamh);
                        $('#magv-edit').val(response.data.magv);
                        $('#namhoc-edit').val(response.data.namhoc_id);
                        $('#hocky-edit').val(response.data.hocky_id);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/term/edit') }}/' +
                            response.data.mahp);
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
                        mamh: $('#mamh-edit').val(),
                        magv: $('#magv-edit').val(),
                        namhoc: $('#namhoc-edit').val(),
                        hocky: $('#hocky-edit').val(),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#' + response.data.mahp).text(response.data.mahp)
                        $('#tenhp-' + response.data.mahp).text(response.data.tenmh)
                        $('#tengv-' + response.data.mahp).text(response.data.tengv)
                        $('#namhoc-' + response.data.mahp).text(response.data.namhoc_id)
                        $('#hocky-' + response.data.mahp).text(response.data.hocky_id)
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
