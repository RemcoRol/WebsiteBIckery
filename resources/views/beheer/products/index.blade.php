@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Producten</div>
                  <a href="{{ route('beheer.products.create') }}"><button type="button" class="btn btn-primary float-right">Nieuwe product aanmaken</button></a>
                </div>

                <div class="card-body">
                  @include('misc.flash-message')
                  <table class="table table-striped table">
                    <thead>
                      <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Plaatje</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Acties</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                      <tr>
                        <td>{{ $product->product_name }}</td>
                        <td><img src="{{asset($product->productImages[0]->product_image_url)}}" alt="profile Pic" height="200" width="200"></td>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>
                          <form method="GET" class="d-inline" action="{{ route('beheer.products.edit', $product->id) }}">
                            <button type="submit" class="btn btn-info">Wijzig</button>
                          </form>
                          <form method="POST" class="d-inline" action="{{ route('beheer.products.delete', $product->id) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Verwijder</button>
                          </form>
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
