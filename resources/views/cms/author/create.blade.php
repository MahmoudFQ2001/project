@extends('cms.parent')
@section('title','Create Author')

@section('main-title','Create Author')
@section('sub-title','create author')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Author</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('authors.store')}}" enctype="multipart/form-data">
        @csrf
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

        <div class="row">
      
                <div class="form-group col-md-4">
                    <label for="country_id">Country Name</label>
                    <select name="country_id" id='country_id' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name of Author">
                </div>
                <div class="form-group col-md-4">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name of Author">
                </div>

            
        </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Name of Author">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Name of Author">
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password of Author">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Enter Password Name of Author">
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" id='gender' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="">Chose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status </label>
                    <select name="status" id='status' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="">Chose Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">In active</option>
                    </select>
                </div>
            </div>
                <div class="form-group col-md-12">
                    <label for="image">Image Of Author</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter image of Author">
                </div>
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