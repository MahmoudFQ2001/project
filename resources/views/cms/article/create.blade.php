@extends('cms.parent')
@section('title','Create Article')

@section('main-title','Create Article')
@section('sub-title','create article')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Article</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('articles.store')}}">
        @csrf

        <div class="form-group col-md-12">
            <label for="category_id">Category Name</label>
            <select name="category_id" id='category_id' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="title">Article Name</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Name of Article">
        </div>
        <div class="form-group col-md-12">
            <label for="short_description">Article Short Description</label>
            <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter short description of Article">
        </div>
        <div class="form-group  col-md-12">
            <label for="full_description">Description</label>
            <textarea type="text" rows="4" colms="50" class="form-control" name="full_description" id="full_description"></textarea>
        </div>
</div>

<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
@endsection
@section('scripts')

@endsection