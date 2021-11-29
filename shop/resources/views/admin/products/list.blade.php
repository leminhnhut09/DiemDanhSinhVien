@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">Id</th>
                <th>Ten san pham</th>
                <th>Danh muc</th>
                <th>Gia goc</th>
                <th>Gia khuyen mai</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width:200px">&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                {{-- <td>{{$product->menu->name}}</td> --}}
                <td>{{$product->menu_id}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                {{-- HTML --}}
                <td> {!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td> 
                    <a class="btn btn-primary"href="/admin/products/edit/{{$product->id}}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-danger" href="#" onclick="removeRow({{$product->id}}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Dùng để phân trang --}}
    {!! $products->links() !!}
@endsection