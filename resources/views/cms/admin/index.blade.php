@extends('cms.parent')
@section('title','Index Admin')

@section('main-title','Index Admin')
@section('sub-title','index admin')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
        <a class="btn btn-primary" href="{{route('admins.create')}}">Create</a>

            <div class="card-header">

                <h3 class="card-title">Data of Admin</h3>

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
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->user ? $admin->user->firstname : "Null"}}</td>
                            <td>{{$admin->user ? $admin->user->lastname : "Null"}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->user ? $admin->user->mobile : "Null"}}</td>
                            <td>{{$admin->user ? $admin->user->image : "Null"}}</td>
                            <td>{{$admin->user ? $admin->user->gender : "Null"}}</td>
                            <td>{{$admin->user ? $admin->user->status : "Null"}}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admins.edit',$admin->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admins.destroy',$admin->id)}}" method="POST">
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
           
            {{ $admins->links() }}
 <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('scripts')

@endsection