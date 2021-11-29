@extends('admin.main')

@section('head')
    <script src='/ckeditor/ckeditor.js'></script>
@endsection

@section('content')
<form action="" method="post">
    <div class="card-body">

      <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên danh mục">
      </div>

      <div class="form-group">
        <label for="parent_id">Danh mục</label>
        <select class="form-control" name="parent_id" id="parent_id">
            <option value="0">Danh mục cha</option>
            @foreach($menus as $child)
            <option value="{{$child->id}}">{{ $child->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
        </textarea>
      </div>

      <div class="form-group">
        <label for="content">Mô tả chi tiết</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10">
        </textarea>
      </div>

      <div class="form-group">
        <label for="content">Kích hoạt</label>
        
        <div class="form-group">
            <div class="custom-control custom-radio">
              <input class="custom-control-input" value="1" type="radio" id="active" name="active">
              <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" value="0" type="radio" id="noactive" name="active" checked="">
              <label for="noactive" class="custom-control-label">Không</label>
            </div>
          </div>
      </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
