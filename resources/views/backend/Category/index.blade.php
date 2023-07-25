@extends('backend.layout')
@section('title')
    {{$title}}
@endsection
@section('link_page')
    <a href="{{route('admin.category.index')}}" class="nav-link">{{$title}}</a>

@endsection
@section('content')
    @if(session('msg') )
        <li style="color: red ;display: block ">  {{ session('msg') }}</li>
    @else

    @endif
    <div>
        <a class="btn btn-primary" href="{{route('admin.category.add')}}" role="button"
           style="float: right;margin-right: 29px;margin-bottom: 12px; margin-top: 12px;">Add</a>
    </div>
    @if(count($list) != 0 )
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Aciton</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 1;
            ?>
            @foreach($list as $item)
                <tr>
                    <td scope="row">{{++$i }}</td>
                    <td scope="row">{{$item->name}}</td>
                    <td scope="row">{{$item->slug}}</td>
                    <td scope="row">{{$item->description}}</td>
                    <td>
                        <img src="{{asset('assets/upload/category/'.$item->image)}}" style="width: 200px">
                    </td>
                    <td>
                        <a href="{{route('admin.category.edit',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('admin.category.delete',['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <p class="h2" style="align-self: center;margin-top: 12px">Not data</p>

    @endif
    <div>
        {{ $list->links() }}
    </div>

@endsection
