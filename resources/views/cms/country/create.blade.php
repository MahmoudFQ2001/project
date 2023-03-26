@extends('cms.parent')
@section('title','Create Country')

@section('main-title','Create Country')
@section('sub-title','create country')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('countries.store')}}">
        @csrf
      

        <div class="card-body">
            <div class="form-group">
                <label for="country_name">Country Name</label>
                <input type="text" class="form-control @error('country_name') is-invalid @enderror" value="{{old('country_name') }}" name="country_name" id="country_name" placeholder="Enter Name of country">
                @error('country_name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="code">Code of Country</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" value="{{old('code') }}" name="code" id="code"  placeholder="Enter Code of Country">
                @error('code')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror 
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