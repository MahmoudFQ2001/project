@extends('cms.parent')
@section('title','Create City')

@section('main-title','Create City')
@section('sub-title','create city')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create City</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('cities.store')}}">
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
                <div class="form-group">
                    <label for="country_id">Country Name</label>
                    <select name="country_id" id='country_id' class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                

            <div class="form-group">
                <label for="city_name">City Name</label>
                <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter Name of City">

            </div>
            <div class="form-group">
                <label for="street">street</label>
                <input type="text" class="form-control" name="street" id="street" placeholder="Enter Code of City">
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