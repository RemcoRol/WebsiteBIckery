@extends('layouts.clients')

@section('content')
    <div class="container-fluid mt-5">
      <div class="row">
        @foreach ($categories as $category)
        <div class="col-3">
          <img src="" alt="">
        </div>
        <div class="col-9">
          
        </div>
        @endforeach
      </div>
    </div>
@endsection
