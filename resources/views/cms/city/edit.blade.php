@extends('cms.parent')
@section('title','Edit')

@section('main-title','Edit City')
@section('sub-title','edit city')
@section('styles')

@endsection
@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="POST" action="{{route('cities.update',$cities->id)}}">
    @csrf
    @method('PUT')
  
    <div class="card-body">
                <div class="form-group" >
                  <label for="country_id">Country Name</label>
                  <select name="country_id" id='country_id' 
                  class="form-control " 
                  style="width: 100%;" >
                @foreach($countries as $country)  
                  <option value="{{$country->id}}">
                  {{$country->country_name}}
                  </option>             
                @endforeach
                </div>
      <div class="form-group">
      
        <label for="city_name">City Name</label>
        <input type="text" class="form-control" value="{{$cities->city_name}}" 
        name="city_name" id="city_name" placeholder="Enter Name of City">
      </div>
      <div class="form-group">
        <label for="street">Code of City</label>
        <input type="text" class="form-control" value="{{$cities->street}}" 
        name="street" id="street" placeholder="Enter street of City">
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