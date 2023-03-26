@extends('cms.parent')
@section('title','Index Category')

@section('main-title','Index Category')
@section('sub-title','index category')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
        <a class="btn btn-primary" href="{{route('categories.create')}}">Create</a>

            <div class="card-header">

                <h3 class="card-title">Data of Category</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>description</th>
                            <th>Setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('categories.edit',$category->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-success">Info</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
           
            </div>
            {{ $categories->links() }}

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('scripts')

@endsection