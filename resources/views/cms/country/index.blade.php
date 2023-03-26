@extends('cms.parent')
@section('title','Index Country')

@section('main-title','Index Country')
@section('sub-title','index country')
@section('styles')

@endsection

@section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check">success</i> </h5>
    {{session('message')}}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
        <a class="btn btn-primary" href="{{route('countries.create')}}">Create</a>

            <div class="card-header">
                <h3 class="card-title">Data of Country</h3>

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
                            <th>Country Name</th>
                            <th>Code of Country</th>
                            <th>Setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $countries as $country)
                        <tr>
                            <td>{{$country->id}}</td>
                            <td>{{$country->country_name}}</td>
                            <td>{{$country->code}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('countries.edit',$country->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{route('countries.destroy',$country->id)}}" method="POST">
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
            {{ $countries->links() }}
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('scripts')

@endsection