@extends('cms.parent')
@section('title','Index Article')

@section('main-title','Index Article')
@section('sub-title','index article')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <a class="btn btn-primary" href="{{route('articles.create')}}">Create</a>

            <div class="card-header">

                <h3 class="card-title">Data of Article</h3>

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
                            <th>Article Name</th>
                            <th>Short Description</th>
                            <th>Setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>

                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->short_description}}</td>
                            
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('articles.edit',$article->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{route('articles.destroy',$article->id)}}" method="POST">
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
            {{ $articles->links() }}

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('scripts')

@endsection