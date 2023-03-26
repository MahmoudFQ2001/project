@extends('cms.parent')
@section('title','Index Author')

@section('main-title','Index Author')
@section('sub-title','index author')
@section('styles')

@endsection

@section('content')

<div class="row">
    
    <div class="col-12">
        <div class="card">

                <a class="btn btn-primary" href="{{route('authors.create')}}">Create</a>
            <div class="card-header">
                <h3 class="card-title">Data of Author</h3>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th>Article</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->user ? $author->user->firstname : "Null"}}</td>
                            <td>{{$author->user ? $author->user->lastname : "Null"}}</td>
                            <td>{{$author->email}}</td>
                            <td>{{$author->user ? $author->user->mobile : "Null"}}</td>
                            <td><img src="{{asset('imgs/'.$author->user->image)}}"width="50"highit="50" alt=""></td>
                            <td>
                                <a href="{{route('indexArticle',['id'=>$author->id])}}" class="btn btn-info">
                                    ({{$author->articles_count}})article/s</a>
                            </td>
                            <td>{{$author->user ? $author->user->gender : "Null"}}</td>
                            <td>{{$author->user ? $author->user->status : "Null"}}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{route('authors.edit',$author->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{route('authors.destroy',$author->id)}}" method="POST">
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
            {{ $authors->links() }}
            

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('scripts')

@endsection