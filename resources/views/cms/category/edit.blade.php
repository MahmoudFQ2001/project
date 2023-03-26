@extends('cms.parent')
@section('title','Create Category')

@section('main-title','Create Category')
@section('sub-title','create category')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('categories.update',$categories->id)}}">
        @csrf
        @method('PUT')
            <div class="form-group col-md-12">
                <label for="name">Category Name</label>
                <input type="text" value="{{$categories->name}}" class="form-control" name="name" id="name" placeholder="Enter Name of Category">

            </div>
            <div class="form-group col-md-12">
                <label for="description">Description</label>
                <textarea type="text" rows="4"colms="50" class="form-control" name="description" id="description">{{$categories->description}}</textarea>
            </div>
            </div>
      
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')

@endsection