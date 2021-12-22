@extends('admin.main2')
@section('content')
    <div class="container">
        <a href="#" style="margin:8px;" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm
            sinh viên điểm danh</a>
        <div class="table-responsive">
            <table style="text-align: center;" class="table table-hover"
                style="display: block; white-space:no-wrap;overflow-x:auto;">
                <thead>
                    <tr>
                        <th style="min-width: 150px;">Mã học phần</th>
                        <th style="min-width: 200px;">Tên giảng viên</th>
                        <th style="min-width: 200px;">Mã sinh viên</th>
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
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td style="vertical-align: middle;"
                                id=" mahp-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->mahp_id }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="magv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->tengv }}
                            </td>
                            <td style="vertical-align: middle;"
                                id="masv-{{ $attendance->mahp_id }}-{{ $attendance->masv_id }}">
                                {{ $attendance->tensv }}
                            </td>
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
                                    class="btn btn-warning btn-edit">Edit</button>
                                <button
                                    data-url="/admin/attendance/destroy/{{ $attendance->mahp_id }}/{{ $attendance->masv_id }}"
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
                <form action="" data-url="{{ route('attendance.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm điểm danh</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="description">Tên học phần</label>
                            <select name="mahp" id="mahp-add" class="form-control" required="required">
                                @foreach ($terms as $term){
                                    <option value="{{ $term->mahp }}">{{ $term->mahp }}-
                                        {{ $term->tenmh }} - {{ $term->tengv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Tên sinh viên</label>
                            <select name="masv" id="masv-add" class="form-control" required="required">
                                @foreach ($students as $student){
                                    <option value="{{ $student->masv }}">{{ $student->masv }}-
                                        {{ $student->tensv }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 1</label>
                            <input name="tuan1" type="checkbox" class="form-control" id="tuan1-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 2</label>
                            <input name="tuan2" type="checkbox" class="form-control" id="tuan2-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 3</label>
                            <input name="tuan3" type="checkbox" class="form-control" id="tuan3-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 4</label>
                            <input name="tuan4" type="checkbox" class="form-control" id="tuan4-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 5</label>
                            <input name="tuan5" type="checkbox" class="form-control" id="tuan5-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 6</label>
                            <input name="tuan6" type="checkbox" class="form-control" id="tuan6-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 7</label>
                            <input name="tuan7" type="checkbox" class="form-control" id="tuan7-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 8</label>
                            <input name="tuan8" type="checkbox" class="form-control" id="tuan8-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 9</label>
                            <input name="tuan9" type="checkbox" class="form-control" id="tuan9-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 10</label>
                            <input name="tuan10" type="checkbox" class="form-control" id="tuan10-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 11</label>
                            <input name="tuan11" type="checkbox" class="form-control" id="tuan11-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 12</label>
                            <input name="tuan12" type="checkbox" class="form-control" id="tuan12-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 13</label>
                            <input name="tuan13" type="checkbox" class="form-control" id="tuan13-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 14</label>
                            <input name="tuan14" type="checkbox" class="form-control" id="tuan14-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 15</label>
                            <input name="tuan15" type="checkbox" class="form-control" id="tuan15-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 16</label>
                            <input name="tuan16" type="checkbox" class="form-control" id="tuan16-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 17</label>
                            <input name="tuan17" type="checkbox" class="form-control" id="tuan17-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 18</label>
                            <input name="tuan18" type="checkbox" class="form-control" id="tuan18-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 19</label>
                            <input name="tuan19" type="checkbox" class="form-control" id="tuan19-add">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 20</label>
                            <input name="tuan20" type="checkbox" class="form-control" id="tuan20-add">
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
                        <div class="form-group">
                            <label for="">Tuần 1</label>
                            <input name="tuan1" type="checkbox" class="form-control" id="tuan1-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 2</label>
                            <input name="tuan2" type="checkbox" class="form-control" id="tuan2-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 3</label>
                            <input name="tuan3" type="checkbox" class="form-control" id="tuan3-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 4</label>
                            <input name="tuan4" type="checkbox" class="form-control" id="tuan4-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 5</label>
                            <input name="tuan5" type="checkbox" class="form-control" id="tuan5-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 6</label>
                            <input name="tuan6" type="checkbox" class="form-control" id="tuan6-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 7</label>
                            <input name="tuan7" type="checkbox" class="form-control" id="tuan7-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 8</label>
                            <input name="tuan8" type="checkbox" class="form-control" id="tuan8-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 9</label>
                            <input name="tuan9" type="checkbox" class="form-control" id="tuan9-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 10</label>
                            <input name="tuan10" type="checkbox" class="form-control" id="tuan10-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 11</label>
                            <input name="tuan11" type="checkbox" class="form-control" id="tuan11-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 12</label>
                            <input name="tuan12" type="checkbox" class="form-control" id="tuan12-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 13</label>
                            <input name="tuan13" type="checkbox" class="form-control" id="tuan13-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 14</label>
                            <input name="tuan14" type="checkbox" class="form-control" id="tuan14-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 15</label>
                            <input name="tuan15" type="checkbox" class="form-control" id="tuan15-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 16</label>
                            <input name="tuan16" type="checkbox" class="form-control" id="tuan16-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 17</label>
                            <input name="tuan17" type="checkbox" class="form-control" id="tuan17-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 18</label>
                            <input name="tuan18" type="checkbox" class="form-control" id="tuan18-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 19</label>
                            <input name="tuan19" type="checkbox" class="form-control" id="tuan19-edit">
                        </div>
                        <div class="form-group">
                            <label for="">Tuần 20</label>
                            <input name="tuan20" type="checkbox" class="form-control" id="tuan20-edit">
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
    {{-- <img style="display: inline-block; width:24px; height:100%; vertical-align: middle;"
        src="{{ $attendance->tuan20 == 'true' ? '/icons/check.png' : ($attendance->tuan20 == 'false' ? '/icons/nocheck.png' : '/icons/null.png') }}"
        title="ngay" alt=""> --}}
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
                            'data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                            '<button data-url="/admin/attendance/destroy/' + response.data
                            .mahp_id + '/' + response.data.masv_id +
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
