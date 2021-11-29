@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">Id</th>
                <th>Tieu de</th>
                <th>Link</th>
                <th>Anh</th>
                <th>Trang thai</th>
                <th>Update</th>
                <th style="width:200px">&nbsp;</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                {{-- <td>{{$product->menu->name}}</td> --}}
                <td>{{$slider->url}}</td>
                <td> <a href="{{$slider->thumb}}" target="_blank"><img src="{{$slider->thumb}}" height="40px" alt=""></a></td>
                {{-- HTML --}}
                <td> {!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td> 
                    <a class="btn btn-primary"href="/admin/sliders/edit/{{$slider->id}}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-danger" href="#" onclick="removeRow({{$slider->id}}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Dùng để phân trang --}}
    {!! $sliders->links() !!}
@endsection