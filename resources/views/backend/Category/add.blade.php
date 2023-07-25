@extends('backend.layout')
@section('title')
    {{$title}}
@endsection
@section('link_page')
    <a href="{{route('admin.category.add')}}" class="nav-link">{{$title}}</a>

@endsection
@section('content')
    @foreach ($errors->all() as $error)
        <li style="color: red ;display: block ">{{ $error }}</li>
    @endforeach
    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name Cateogory</label>
            <span class="glyphicon glyphicon-star"></span>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter Name Cateogory">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Decription</label>
            <textarea class="form-control" name="decription" placeholder="Entent Decription"
                      id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="popular" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Popular</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="exampleInputEmail1"
                   aria-describedby="meta_title" placeholder="Enter Meta Title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Meta description</label>
            <input type="text" name="meta_descrip" class="form-control" id="exampleInputEmail1"
                   aria-describedby="meta_descrip" placeholder="Enter Meta Title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Meta keywords</label>
            <textarea class="form-control" name="meta_keywords" placeholder="Meta keywords"
                      id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image Category</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection
