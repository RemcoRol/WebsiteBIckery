@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Product aanmaken</div>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                </div>

                <div class="card-body">
                  {{--
                  <product-creation v-bind:brands="{{ json_encode($brands) }}">

                  </product-creation>
                  --}}
                  <form onsubmit="{{ route('beheer.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Product naam:</label>
                      <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" placeholder="Product naam">
                    </div>
                    <div class="form-group">
                      <label>Merk:</label>
                      <select class="form-control" name="brand_id">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Plaatje:</label>
                      <input type="file" name="product_image" value="{{ old('product_image') }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Opslaan</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
