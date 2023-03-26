@extends('cms.parent')
@section('title','Edit Admin')

@section('main-title','Edit Admin')
@section('sub-title','edit admin')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Admin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('admins.update',$admins->id)}}">
        @csrf
        @method('PUT')
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="country_id">Country Name</label>
                <select name="country_id" id='country_id' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-4">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" value="{{$admins->user->firstname}}" name="firstname" id="firstname" placeholder="Enter First Name of Admin">
            </div>
            <div class="form-group col-md-4">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" value="{{$admins->user->lastname}}" name="lastname" id="lastname" placeholder="Enter Last Name of Admin">
            </div>
            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" value="{{$admins->user->mobile}}" name="mobile" id="mobile" placeholder="Enter Mobile Name of Admin">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{$admins->email}}" name="email" id="email" placeholder="Enter Email Name of Admin">
            </div>
            <div class="form-group col-md-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" value="{{$admins->password}}" name="password" id="password" placeholder="Enter Password of Admin">
            </div>
            <div class="form-group col-md-4">
                <label for="date_of_birth">Date Of Birth</label>
                <input type="date" class="form-control" value="{{$admins->user->date_of_birth}}" name="date_of_birth" id="date_of_birth" placeholder="Enter Password Name of Admin">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id='gender' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected >{{$admins->user->gender}}</option>
                    <option value="male">Male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status </label>
                <select name="status" id='status' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected >{{$admins->user->status}}</option>
                    <option value="active">Active</option>
                    <option value="inactive">In active</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="image">Image Of Admin</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter image of Admin">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')

@endsection