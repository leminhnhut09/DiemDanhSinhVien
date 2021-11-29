@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">Id</th>
                <th>Name</th>
                <th>Action</th>
                <th>Update</th>
                <th style="width:200px">&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
            {!!
                \App\Helpers\Helper::menu($menus)
            !!}
        </tbody>
    </table>
@endsection