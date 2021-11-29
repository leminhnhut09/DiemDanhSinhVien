@extends('admin.main')

@section('content')
<form action="" method="post">
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="menu">Tiêu đề</label>
                <input type="text" name="name" value="{{ $slider->name }}" class="form-control"  placeholder="Nhập tên sản phẩm">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="menu">Đường dẫn</label>
                <input type="text" name="url" value="{{ $slider->url }}" class="form-control"  placeholder="Nhập tên sản phẩm">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="menu">Ảnh Sản Phẩm</label>
        <input type="file" name="file" class="form-control" id="upload">
        <div id="image_show">
            <a href="{{ $slider->thumb}}">
                <img src="{{ $slider->thumb}}" width="100px" alt="">
            </a>
        </div>
        <input type="hidden" value="{{ $slider->thumb}}" name="thumb" id="thumb">
    </div>

          <div class="form-group">
              <label for="menu">Sắp xếp</label>
              <input type="number" name="sort" value="{{ $slider->sort}}"  class="form-control" >
          </div>

  <div class="form-group">
      <label>Kích Hoạt</label>
      <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="active"
          {{ $slider->active == 1 ? "checked" : ""}}
          >
          <label for="active" class="custom-control-label">Có</label>
      </div>
      <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"  {{ $slider->active == 1 ? "checked" : ""}} >
          <label for="no_active" class="custom-control-label">Không</label>
      </div>
  </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cap nhat Slider</button>
    </div>
    @csrf
  </form>
@endsection
