@extends('cms.parent')
@section('title','Edit')

@section('main-title','Edit Country')
@section('sub-title','edit country')
@section('styles')

@endsection
@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="POST" action="{{route('countries.update',$countries->id)}}">
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
        <label for="country_name">Country Name</label>
        <input type="text" class="form-control" value="{{$countries->country_name}}" name="country_name" id="country_name" placeholder="Enter Name of country">
      </div>
      <div class="form-group">
        <label for="code">Code of Country</label>
        <input type="text" class="form-control" value="{{$countries->code}}" name="code" id="code" placeholder="Enter Code of Country">
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection
@section('scripts')

@endsection