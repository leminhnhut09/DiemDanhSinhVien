@extends('admin.main2')
@section('content')
    <script>
        function FilterTable(value, data) {
            console.log(value);
            var data = searchTable(value, data);
            buildTable(data);
        }

        function searchTable(value, data) {
            var filter = []
            for (var index = 0; index < data.length; index++) {
                value = value.toLowerCase();
                var name = data[index].tensv.toLowerCase();
                console.log(name);
                if (name.includes(value)) {
                    filter.push(data[index]);
                }
            }
            return filter;
            console.log(filter);
        }

        function buildTable(data) {
            var table = document.getElementById('table-body')
            table.innerHTML = ''
            for (var i = 0; i < data.length; i++) {
                row = '<tr><td style="vertical-align: middle;" id = "mahp-' + data[i].mahp_id +
                    '-' + data[i].masv + '" > ' +
                    data[i].mahp_id +
                    '</td><td style="vertical-align: middle;" id = "tenhp-' +
                    data[i].mahp_id +
                    '-' + data[i].masv + '" > ' +
                    data[i].tenmh +
                    '</td><td style="vertical-align: middle;" id = "magv-' +
                    data[i]
                    .mahp_id +
                    '-' + data[i].masv_id + '" > ' +
                    data[i].tengv +
                    '</td><td style="vertical-align: middle;" id = "masv-' +
                    data[i]
                    .mahp_id +
                    '-' + data[i].masv_id + '" > ' +
                    data[i].tensv +
                    '</td><td style="vertical-align: middle;" id = "masv-' +
                    data[i]
                    .mahp_id +
                    '-' + data[i].masv_id + '" > ' +
                    data[i].namhoc_id +
                    '</td><td style="vertical-align: middle;" id = "masv-' +
                    data[i]
                    .mahp_id +
                    '-' + data[i].masv_id + '" > ' +
                    data[i].hocky_id +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan1, 'tuan1', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan2, 'tuan2', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan3, 'tuan3', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan4, 'tuan4', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan5, 'tuan5', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan6, 'tuan6', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan7, 'tuan7', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan8, 'tuan8', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan9, 'tuan9', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan10, 'tuan10', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan11, 'tuan11', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan12, 'tuan12', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan13, 'tuan13', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan14, 'tuan14', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan15, 'tuan15', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan16, 'tuan16', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan17, 'tuan17', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan18, 'tuan18', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan19, 'tuan19', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td style="vertical-align: middle;">' +
                    addText(data[i].tuan20, 'tuan20', data[i].mahp_id,
                        data[i].masv_id) +
                    '</td><td><button data-url="/admin/attendance/edit/' + data[i]
                    .mahp_id + '/' + data[i].masv_id + '" type="button" ' +
                    'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                    '<button data-url="/admin/attendance/destroy/' + data[i]
                    .mahp_id + '/' + data[i].masv_id +
                    '"​ type="button" style="margin-left: 5px;" data-target="#delete" ' +
                    ' data-toggle="modal"class="btn btn-danger btn-delete">Xóa</button></td>'
                table.innerHTML += row
            }
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="#" style="margin:8px;" class="btn btn-success btn-add" data-target="#modal-add"
                    data-toggle="modal">Thêm
                    sinh viên điểm danh</a>
                <a id="click-file-excel" href="#" style="margin:8px;" class="btn btn-success btn-add"
                    data-target="#modal-import" data-toggle="modal">Import file</a>
            </div>
            <div class="col-lg-6" style="display: flex; margin-top: 8px;">
                <label for="search-input"
                    style="display: inline; width: 30%; margin-left: 10px; width:120px; font-size:20px; font-weight:600;">
                    Tìm kiếm</label>
                <input class="form-control" id="search-input" onKeyup="FilterTable(this.value, {{ $attendances }})"
                    type="text">
            </div>
        </div>
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


        <div class="table-responsive" style="max-height:500px; overflow-y:auto;">
            <table style="text-align: center;" class="table table-hover"
                style="display: block; white-space:no-wrap;overflow-x:auto;">
                <thead>
                    <tr>
                        <th style="min-width: 200px;">Mã lớp học phần</th>
                        <th style="min-width: 200px;">Tên học phần</th>
                        <th style="min-width: 200px;">Tên giảng viên</th>
                        <th style="min-width: 200px;">Mã sinh viên</th>
                        <th style="min-width: 120px;">Năm học</th>
                        <th style="min-width: 120px;">Học kỳ</th>
                        <th style="min-width: 100px;">Tuần 1</th>
                        <th style="min-width: 100px;">Tuần 2</th>
                        <th style="min-width: 100px;">Tuần 3</th>
                        <th style="min-width: 100px;">Tuần 4</th>
                        <th style="min-width: 100px;">Tuần 5</th>
                        <th style="min-width: 100px;">Tuần 6</th>
                        <th style="min-width: 100px;">Tuần 7</th>
                        <th style="min-width: 100px;">Tuần 8</th>
                        <th style="min-width: 100px;">Tuần 9</th>
                        <th style="min-width: 100px;">Tuần 10</th>
                        <th style="min-width: 100px;">Tuần 11</th>
                        <th style="min-width: 100px;">Tuần 12</th>
                        <th style="min-width: 100px;">Tuần 13</th>
                        <th style="min-width: 100px;">Tuần 14</th>
                        <th style="min-width: 100px;">Tuần 15</th>
                        <th style="min-width: 100px;">Tuần 16</th>
                        <th style="min-width: 100px;">Tuần 17</th>
                        <th style="min-width: 100px;">Tuần 18</th>
                        <th style="min-width: 100px;">Tuần 19</th>
                        <th style="min-width: 100px;">Tuần 20</th>
                        <th style="min-width: 200px;"></th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td style="vertical-align: middle;"
                                id=" mahp-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->mahp_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id=" tenhp-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->tenmh }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="magv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->tengv }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="masv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->tensv }}
                            </td>
                            {{-- edit --}}
                            <td style="vertical-align: middle;"
                                id="namhoc-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->namhoc_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="hocky-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->hocky_id }}
                            </td>
                            {{-- end edit --}}
                            <td style="vertical-align: middle;">
                                {{-- id="tuan1-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}" {{ $attendance->tuan1 == 'true' ? 'Yes' : 'No' }} --}}
                                <img id="tuan1-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan1 == 'true' ? '/icons/check.png' : ($attendance->tuan1 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan2-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan2 == 'true' ? '/icons/check.png' : ($attendance->tuan2 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan3-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan3 == 'true' ? '/icons/check.png' : ($attendance->tuan3 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan4-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan4 == 'true' ? '/icons/check.png' : ($attendance->tuan4 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan5-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan5 == 'true' ? '/icons/check.png' : ($attendance->tuan5 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan6-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan6 == 'true' ? '/icons/check.png' : ($attendance->tuan6 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan7-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan7 == 'true' ? '/icons/check.png' : ($attendance->tuan7 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan8-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan8 == 'true' ? '/icons/check.png' : ($attendance->tuan8 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan9-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan9 == 'true' ? '/icons/check.png' : ($attendance->tuan9 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan10-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan10 == 'true' ? '/icons/check.png' : ($attendance->tuan10 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan11-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan11 == 'true' ? '/icons/check.png' : ($attendance->tuan11 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan12-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan12 == 'true' ? '/icons/check.png' : ($attendance->tuan12 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan13-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan13 == 'true' ? '/icons/check.png' : ($attendance->tuan13 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan14-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan14 == 'true' ? '/icons/check.png' : ($attendance->tuan14 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan15-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan15 == 'true' ? '/icons/check.png' : ($attendance->tuan15 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan16-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan16 == 'true' ? '/icons/check.png' : ($attendance->tuan16 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan17-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan17 == 'true' ? '/icons/check.png' : ($attendance->tuan17 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan18-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan18 == 'true' ? '/icons/check.png' : ($attendance->tuan18 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan19-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan19 == 'true' ? '/icons/check.png' : ($attendance->tuan19 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td style="vertical-align: middle;">
                                <img id="tuan20-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}"
                                    style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
                                    src="{{ $attendance->tuan20 == 'true' ? '/icons/check.png' : ($attendance->tuan20 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
                                    title="ngay" alt="">
                            </td>
                            <td>
                                <button
                                    data-url="/admin/attendance/edit/{{ $attendance->mahp_id }}/{{ $attendance->masv_id }}"
                                    ​ type="button" data-target="#edit" data-toggle="modal"
                                    class="btn btn-warning btn-edit">Sửa</button>
                                <button
                                    data-url="/admin/attendance/destroy/{{ $attendance->mahp_id }}/{{ $attendance->masv_id }}"
                                    ​ type="button" data-target="#delete" data-toggle="modal"
                                    class="btn btn-danger btn-delete">Xóa</button>
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
                <form action="" data-url="{{ route('attendance.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm điểm danh</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">


                        <div style="display: flex;">
                            <div class="form-group" style="width:100%;display: flex; justify-content:center;">
                                <label style="width:120px; margin-right: 10px; margin-top:6px;" for="">Khoa</label>
                                <select style="width:300px;" name="khoa" id="khoa-add" class="form-control">
                                    <option value="">Chọn khoa</option>
                                    @foreach ($facultys as $faculty) {
                                        <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                                        }
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:120px; margin-right: 10px; margin-top:6px;" for="">Năm học</label>
                                <select style="width:150px;" name="namhoc" id="namhoc-add" class="form-control">
                                    <option value="">Chọn năm học</option>
                                    @foreach ($years as $year) {
                                        <option value="{{ $year->namhoc }}">{{ $year->namhoc }}</option>
                                        }
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px; justify-items: flex-end">
                                <label style="width:60px;margin-right: 10px; margin-top:6px;" for="">Học kỳ</label>
                                <select style="width:140px;" name="hocky" id="hocky-add" class="form-control">
                                    <option value="">Chọn học kỳ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Mã lớp học phần</label>
                            <select name="mahp" id="mahp-add" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}-
                                        {{ $term->tenmh }} - {{ $term->tengv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" style="margin-bottom:30px">
                            <label for="description">Mã số sinh viên</label>
                            <input required type="text" name="masv" class="form-control" id="masv-add" list="listsv-add"
                                placeholder="Nhập mã sinh viên">

                            <datalist id="listsv-add">
                                @foreach ($students as $student){
                                    <option value="{{ $student->masv }}">{{ $student->masv }}-
                                        {{ $student->tensv }}</option>
                                    }
                                @endforeach
                            </datalist>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 1</label>
                                <input style="width:40px;" name="tuan1" type="checkbox" class="form-control"
                                    id="tuan1-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px; justify-items: flex-end">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 2</label>
                                <input style="width:40px;" name=" tuan2" type="checkbox" class="form-control"
                                    id="tuan2-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 3</label>
                                <input style="width:40px;" name="tuan3" type="checkbox" class="form-control"
                                    id="tuan3-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 4</label>
                                <input style="width:40px;" name=" tuan4" type="checkbox" class="form-control"
                                    id="tuan4-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 5</label>
                                <input style="width:40px;" name="tuan5" type="checkbox" class="form-control"
                                    id="tuan5-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 6</label>
                                <input style="width:40px;" name=" tuan6" type="checkbox" class="form-control"
                                    id="tuan6-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 7</label>
                                <input style="width:40px;" name="tuan7" type="checkbox" class="form-control"
                                    id="tuan7-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 8</label>
                                <input style="width:40px;" name=" tuan8" type="checkbox" class="form-control"
                                    id="tuan8-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 9</label>
                                <input style="width:40px;" name="tuan9" type="checkbox" class="form-control"
                                    id="tuan9-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 10</label>
                                <input style="width:40px;" name=" tuan10" type="checkbox" class="form-control"
                                    id="tuan10-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 11</label>
                                <input style="width:40px;" name="tuan11" type="checkbox" class="form-control"
                                    id="tuan11-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 12</label>
                                <input style="width:40px;" name=" tuan12" type="checkbox" class="form-control"
                                    id="tuan12-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 13</label>
                                <input style="width:40px;" name="tuan13" type="checkbox" class="form-control"
                                    id="tuan13-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 14</label>
                                <input style="width:40px;" name=" tuan14" type="checkbox" class="form-control"
                                    id="tuan14-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 15</label>
                                <input style="width:40px;" name="tuan15" type="checkbox" class="form-control"
                                    id="tuan15-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 16</label>
                                <input style="width:40px;" name=" tuan16" type="checkbox" class="form-control"
                                    id="tuan16-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 17</label>
                                <input style="width:40px;" name="tuan17" type="checkbox" class="form-control"
                                    id="tuan17-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 18</label>
                                <input style="width:40px;" name=" tuan18" type="checkbox" class="form-control"
                                    id="tuan18-add">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 19</label>
                                <input style="width:40px;" name="tuan19" type="checkbox" class="form-control"
                                    id="tuan19-add">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 20</label>
                                <input style="width:40px;" name=" tuan20" type="checkbox" class="form-control"
                                    id="tuan20-add">
                            </div>
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
                            <label for="description">Tên học phần</label>
                            <select name="mahp" id="mahp-edit" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}-
                                        {{ $term->tenmh }} - {{ $term->tengv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Tên sinh viên</label>
                            <select name="masv" id="masv-edit" class="form-control" required="required">
                                @foreach ($students as $student){
                                    <option value="{{ $student->masv }}">{{ $student->masv }}-
                                        {{ $student->tensv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 1</label>
                                <input style="width:40px;" name="tuan1" type="checkbox" class="form-control"
                                    id="tuan1-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px; justify-items: flex-end">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 2</label>
                                <input style="width:40px;" name=" tuan2" type="checkbox" class="form-control"
                                    id="tuan2-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 3</label>
                                <input style="width:40px;" name="tuan3" type="checkbox" class="form-control"
                                    id="tuan3-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 4</label>
                                <input style="width:40px;" name=" tuan4" type="checkbox" class="form-control"
                                    id="tuan4-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 5</label>
                                <input style="width:40px;" name="tuan5" type="checkbox" class="form-control"
                                    id="tuan5-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 6</label>
                                <input style="width:40px;" name=" tuan6" type="checkbox" class="form-control"
                                    id="tuan6-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 7</label>
                                <input style="width:40px;" name="tuan7" type="checkbox" class="form-control"
                                    id="tuan7-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 8</label>
                                <input style="width:40px;" name=" tuan8" type="checkbox" class="form-control"
                                    id="tuan8-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 9</label>
                                <input style="width:40px;" name="tuan9" type="checkbox" class="form-control"
                                    id="tuan9-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 10</label>
                                <input style="width:40px;" name=" tuan10" type="checkbox" class="form-control"
                                    id="tuan10-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 11</label>
                                <input style="width:40px;" name="tuan11" type="checkbox" class="form-control"
                                    id="tuan11-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 12</label>
                                <input style="width:40px;" name=" tuan12" type="checkbox" class="form-control"
                                    id="tuan12-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 13</label>
                                <input style="width:40px;" name="tuan13" type="checkbox" class="form-control"
                                    id="tuan13-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 14</label>
                                <input style="width:40px;" name=" tuan14" type="checkbox" class="form-control"
                                    id="tuan14-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 15</label>
                                <input style="width:40px;" name="tuan15" type="checkbox" class="form-control"
                                    id="tuan15-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 16</label>
                                <input style="width:40px;" name=" tuan16" type="checkbox" class="form-control"
                                    id="tuan16-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 17</label>
                                <input style="width:40px;" name="tuan17" type="checkbox" class="form-control"
                                    id="tuan17-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 18</label>
                                <input style="width:40px;" name=" tuan18" type="checkbox" class="form-control"
                                    id="tuan18-edit">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group" style="width:50%;display: flex; justify-content:center;">
                                <label style="width:60px; margin-right: 40px; margin-top:6px;" for="">Tuần 19</label>
                                <input style="width:40px;" name="tuan19" type="checkbox" class="form-control"
                                    id="tuan19-edit">
                            </div>
                            <div class="form-group"
                                style="width:50%;display: flex; justify-content:center; margin-right: 10px;">
                                <label style="width:60px;margin-right: 40px; margin-top:6px;" for="">Tuần 20</label>
                                <input style="width:40px;" name=" tuan20" type="checkbox" class="form-control"
                                    id="tuan20-edit">
                            </div>
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
    {{-- <img style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
        src="{{ $attendance->tuan20 == 'true' ? '/icons/check.png' : ($attendance->tuan20 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
        title="ngay" alt=""> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script type="text/javascript">
        function addText(tuan, ten, mahp, masv) {
            var id = `id = "${ten}-${mahp}-${masv}"`;
            var link = tuan == 'true' ? '/icons/check.png' : tuan == 'false' ? '/icons/nocheck.png' : '/icons/null.png';
            return `<img ${id} style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
    src="${link}" title="ngay" alt=""> `;
        }

        function getLink(data) {
            return data == 'true' ? '/icons/check.png' : data == 'false' ? '/icons/nocheck.png' : '/icons/null.png';
        }

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
                        //console.log(workbook);
                        workbook.SheetNames.forEach(sheet => {
                            let rowObject = XLSX.utils.sheet_to_row_object_array(workbook
                                .Sheets[sheet]);
                            console.log(rowObject);
                            // var arr = [];
                            // for (var i = 0; i < rowObject.length; i++) {
                            //     arr.push(rowObject[i]);
                            // }
                            // console.log(arr);
                            $.ajax({
                                type: 'post',
                                datatype: "JSON",
                                url: '/admin/attendance/addXLSX',
                                data: {
                                    arr: rowObject
                                },
                                success: function(response) {
                                    toastr.success(response.message)
                                    $('#modal-import').modal('hide');
                                    if (response.data == null) return;
                                    for (var i = 0; i < response.data.length; i++) {
                                        $('tbody').prepend(
                                            '<tr><td style="vertical-align: middle;" id = "mahp-' +
                                            response
                                            .data[i].mahp_id +
                                            '-' + response.data[i].masv +
                                            '" > ' +
                                            response.data[i].mahp_id +
                                            '</td><td style="vertical-align: middle;" id = "tenhp-' +
                                            response
                                            .data[i].mahp_id +
                                            '-' + response.data[i].masv +
                                            '" > ' +
                                            response.data[i].tenmh +
                                            '</td><td style="vertical-align: middle;" id = "magv-' +
                                            response
                                            .data[i]
                                            .mahp_id +
                                            '-' + response.data[i].masv_id +
                                            '" > ' +
                                            response.data[i].tengv +
                                            '</td><td style="vertical-align: middle;" id = "masv-' +
                                            response
                                            .data[i]
                                            .mahp_id +
                                            '-' + response.data[i].masv_id +
                                            '" > ' +
                                            response.data[i].tensv +
                                            '</td><td style="vertical-align: middle;" id = "namhoc-' +
                                            response
                                            .data[i]
                                            .mahp_id +
                                            '-' + response.data[i].masv_id +
                                            '" > ' +
                                            response.data[i].namhoc_id +
                                            '</td><td style="vertical-align: middle;" id = "masv-' +
                                            response
                                            .data[i]
                                            .mahp_id +
                                            '-' + response.data[i].masv_id +
                                            '" > ' +
                                            response.data[i].hocky_id +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan1,
                                                'tuan1',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan2,
                                                'tuan2',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan3,
                                                'tuan3',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan4,
                                                'tuan4',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan5,
                                                'tuan5',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan6,
                                                'tuan6',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan7,
                                                'tuan7',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan8,
                                                'tuan8',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan9,
                                                'tuan9',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan10,
                                                'tuan10',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan11,
                                                'tuan11',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan12,
                                                'tuan12',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan13,
                                                'tuan13',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan14,
                                                'tuan14',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan15,
                                                'tuan15',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan16,
                                                'tuan16',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan17,
                                                'tuan17',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan18,
                                                'tuan18',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan19,
                                                'tuan19',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td style="vertical-align: middle;">' +
                                            addText(response.data[i].tuan20,
                                                'tuan20',
                                                response.data[i].mahp_id,
                                                response.data[i].masv_id) +
                                            '</td><td><button data-url="/admin/attendance/edit/' +
                                            response
                                            .data[i]
                                            .mahp_id + '/' + response.data[i]
                                            .masv_id +
                                            '" type="button" ' +
                                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                                            '<button data-url="/admin/attendance/destroy/' +
                                            response.data[i]
                                            .mahp_id + '/' + response.data[i]
                                            .masv_id +
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

            // filter
            $(document).on('change', '#makhoa-filter, #namhoc-filter, #hocky-filter', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'put',
                    url: '/admin/attendance/filter',
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


            // năm học
            $(document).on('change', '#namhoc-add', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'put',
                    url: '/admin/attendance/namhoc',
                    data: {
                        namhoc: $('#namhoc-add').val(),
                        hocky: $('#hocky-add').val(),
                        khoa: $('#khoa-add').val()
                    },
                    success: function(response) {
                        console.log(response.data);
                        var $select = $('#mahp-add');
                        $select.find('option').remove();
                        $.each(response.data, function(key, value) {
                            $select.append('<option value=' + value.mahp + '>' + value
                                .mahp + '-' + value
                                .tenmh + '-' + value
                                .tengv +
                                '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })

            })
            // học kỳ
            $(document).on('change', '#hocky-add', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'put',
                    url: '/admin/attendance/hocky',
                    data: {
                        namhoc: $('#namhoc-add').val(),
                        hocky: $('#hocky-add').val(),
                        khoa: $('#khoa-add').val()
                    },
                    success: function(response) {
                        console.log(response.data);
                        var $select = $('#mahp-add');
                        $select.find('option').remove();
                        $.each(response.data, function(key, value) {
                            $select.append('<option value=' + value.mahp + '>' + value
                                .mahp + '-' + value
                                .tenmh + '-' + value
                                .tengv +
                                '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            })
            // khoa
            $(document).on('change', '#khoa-add', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'put',
                    url: '/admin/attendance/khoa',
                    data: {
                        namhoc: $('#namhoc-add').val(),
                        hocky: $('#hocky-add').val(),
                        khoa: $('#khoa-add').val()
                    },
                    success: function(response) {
                        console.log(response.data);
                        var $select = $('#mahp-add');
                        $select.find('option').remove();
                        $.each(response.data, function(key, value) {
                            $select.append('<option value=' + value.mahp + '>' + value
                                .mahp + '-' + value
                                .tenmh + '-' + value
                                .tengv +
                                '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })

            })


            $('#form-add').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        mahp: $('#mahp-add').val(),
                        masv: $('#masv-add').val(),
                        tuan1: $('#tuan1-add').prop("checked"),
                        tuan2: $('#tuan2-add').prop("checked"),
                        tuan3: $('#tuan3-add').prop("checked"),
                        tuan4: $('#tuan4-add').prop("checked"),
                        tuan5: $('#tuan5-add').prop("checked"),
                        tuan6: $('#tuan6-add').prop("checked"),
                        tuan7: $('#tuan7-add').prop("checked"),
                        tuan8: $('#tuan8-add').prop("checked"),
                        tuan9: $('#tuan9-add').prop("checked"),
                        tuan10: $('#tuan10-add').prop("checked"),
                        tuan11: $('#tuan11-add').prop("checked"),
                        tuan12: $('#tuan12-add').prop("checked"),
                        tuan13: $('#tuan13-add').prop("checked"),
                        tuan14: $('#tuan14-add').prop("checked"),
                        tuan15: $('#tuan15-add').prop("checked"),
                        tuan16: $('#tuan16-add').prop("checked"),
                        tuan17: $('#tuan17-add').prop("checked"),
                        tuan18: $('#tuan18-add').prop("checked"),
                        tuan19: $('#tuan19-add').prop("checked"),
                        tuan20: $('#tuan20-add').prop("checked"),
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-add').modal('hide');
                        $('tbody').prepend(
                            '<tr><td style="vertical-align: middle;" id = "mahp-' + response
                            .data.mahp_id +
                            '-' + response.data.masv + '" > ' +
                            response.data.mahp_id +
                            '</td><td style="vertical-align: middle;" id = "tenhp-' +
                            response
                            .data.mahp_id +
                            '-' + response.data.masv + '" > ' +
                            response.data.tenmh +
                            '</td><td style="vertical-align: middle;" id = "magv-' +
                            response
                            .data
                            .mahp_id +
                            '-' + response.data.masv_id + '" > ' +
                            response.data.tengv +
                            '</td><td style="vertical-align: middle;" id = "masv-' +
                            response
                            .data
                            .mahp_id +
                            '-' + response.data.masv_id + '" > ' +
                            response.data.tensv +
                            '</td><td style="vertical-align: middle;" id = "masv-' +
                            response
                            .data
                            .mahp_id +
                            '-' + response.data.masv_id + '" > ' +
                            response.data.namhoc_id +
                            '</td><td style="vertical-align: middle;" id = "masv-' +
                            response
                            .data
                            .mahp_id +
                            '-' + response.data.masv_id + '" > ' +
                            response.data.hocky_id +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan1, 'tuan1', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan2, 'tuan2', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan3, 'tuan3', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan4, 'tuan4', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan5, 'tuan5', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan6, 'tuan6', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan7, 'tuan7', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan8, 'tuan8', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan9, 'tuan9', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan10, 'tuan10', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan11, 'tuan11', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan12, 'tuan12', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan13, 'tuan13', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan14, 'tuan14', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan15, 'tuan15', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan16, 'tuan16', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan17, 'tuan17', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan18, 'tuan18', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan19, 'tuan19', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td style="vertical-align: middle;">' +
                            addText(response.data.tuan20, 'tuan20', response.data.mahp_id,
                                response.data.masv_id) +
                            '</td><td><button data-url="/admin/attendance/edit/' + response
                            .data
                            .mahp_id + '/' + response.data.masv_id + '" type="button" ' +
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Sửa</button>' +
                            '<button data-url="/admin/attendance/destroy/' + response.data
                            .mahp_id + '/' + response.data.masv_id +
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
                        console.log('response');
                        console.log(response.data.tuan1);

                        $('#mahp-edit').val(response.data.mahp_id);
                        $('#masv-edit').val(response.data.masv_id);
                        $('#tuan1-edit').prop("checked", response.data.tuan1 == 'true' ? true :
                            false);
                        $('#tuan2-edit').prop("checked", response.data.tuan2 == 'true' ? true :
                            false);
                        $('#tuan3-edit').prop("checked", response.data.tuan3 == 'true' ? true :
                            false);
                        $('#tuan4-edit').prop("checked", response.data.tuan4 == 'true' ? true :
                            false);
                        $('#tuan5-edit').prop("checked", response.data.tuan5 == 'true' ? true :
                            false);
                        $('#tuan6-edit').prop("checked", response.data.tuan6 == 'true' ? true :
                            false);
                        $('#tuan7-edit').prop("checked", response.data.tuan7 == 'true' ? true :
                            false);
                        $('#tuan8-edit').prop("checked", response.data.tuan8 == 'true' ? true :
                            false);
                        $('#tuan9-edit').prop("checked", response.data.tuan9 == 'true' ? true :
                            false);
                        $('#tuan10-edit').prop("checked", response.data.tuan10 == 'true' ?
                            true : false);
                        $('#tuan11-edit').prop("checked", response.data.tuan11 == 'true' ?
                            true : false);
                        $('#tuan12-edit').prop("checked", response.data.tuan12 == 'true' ?
                            true : false);
                        $('#tuan13-edit').prop("checked", response.data.tuan13 == 'true' ?
                            true : false);
                        $('#tuan14-edit').prop("checked", response.data.tuan14 == 'true' ?
                            true : false);
                        $('#tuan15-edit').prop("checked", response.data.tuan15 == 'true' ?
                            true : false);
                        $('#tuan16-edit').prop("checked", response.data.tuan16 == 'true' ?
                            true : false);
                        $('#tuan17-edit').prop("checked", response.data.tuan17 == 'true' ?
                            true : false);
                        $('#tuan18-edit').prop("checked", response.data.tuan18 == 'true' ?
                            true : false);
                        $('#tuan19-edit').prop("checked", response.data.tuan19 == 'true' ?
                            true : false);
                        $('#tuan20-edit').prop("checked", response.data.tuan20 == 'true' ?
                            true : false);
                        $('#form-edit').attr('data-url',
                            '{{ asset('/admin/attendance/edit') }}/' +
                            response.data.mahp_id + '/' + response.data.masv_id);
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
                        masv: $('#masv-edit').val(),
                        tuan1: $('#tuan1-edit').prop("checked"),
                        tuan2: $('#tuan2-edit').prop("checked"),
                        tuan3: $('#tuan3-edit').prop("checked"),
                        tuan4: $('#tuan4-edit').prop("checked"),
                        tuan5: $('#tuan5-edit').prop("checked"),
                        tuan6: $('#tuan6-edit').prop("checked"),
                        tuan7: $('#tuan7-edit').prop("checked"),
                        tuan8: $('#tuan8-edit').prop("checked"),
                        tuan9: $('#tuan9-edit').prop("checked"),
                        tuan10: $('#tuan10-edit').prop("checked"),
                        tuan11: $('#tuan11-edit').prop("checked"),
                        tuan12: $('#tuan12-edit').prop("checked"),
                        tuan13: $('#tuan13-edit').prop("checked"),
                        tuan14: $('#tuan14-edit').prop("checked"),
                        tuan15: $('#tuan15-edit').prop("checked"),
                        tuan16: $('#tuan16-edit').prop("checked"),
                        tuan17: $('#tuan17-edit').prop("checked"),
                        tuan18: $('#tuan18-edit').prop("checked"),
                        tuan19: $('#tuan19-edit').prop("checked"),
                        tuan20: $('#tuan20-edit').prop("checked")
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');

                        $('#mahp-' + response.data.mahp_id + '-' + response.data.masv)
                            .text(response.data.mahp_id)
                        $('#magv-' + response.data.mahp_id + '-' + response.data.masv)
                            .text(response.data.tengv)
                        $('#masv-' + response.data.mahp_id + '-' + response.data.masv)
                            .text(response.data.tensv)
                        $('#tuan1-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan1))
                        $('#tuan2-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan2))
                        $('#tuan3-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan3))
                        $('#tuan4-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan4))
                        $('#tuan5-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan5))
                        $('#tuan6-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan6))
                        $('#tuan7-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan7))
                        $('#tuan8-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan8))
                        $('#tuan9-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan9))
                        $('#tuan10-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan10))
                        $('#tuan11-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan11))
                        $('#tuan12-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan12))
                        $('#tuan13-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan13))
                        $('#tuan14-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan14))
                        $('#tuan15-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan15))
                        $('#tuan16-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan16))
                        $('#tuan17-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan17))
                        $('#tuan18-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan18))
                        $('#tuan19-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan19))
                        $('#tuan20-' + response.data.mahp_id + '-' + response.data.masv)
                            .attr('src', getLink(response.data.tuan20))
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
                            toastr.success('Xóa điểm danh thành công!')
                            _this.parent().parent().remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Xóa điểm danh thất bại!')
                        }
                    })
                }
            })
        })
    </script>
    {{-- Dùng để phân trang --}}
    {{-- {!! $faculty->links() !!} --}}
@endsection
