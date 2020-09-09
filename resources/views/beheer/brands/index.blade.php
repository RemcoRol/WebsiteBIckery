@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Merken</div>
                  <a href="{{ route('beheer.brands.create') }}"><button type="button" class="btn btn-primary float-right">Nieuw merk aanmaken</button></a>
                </div>
                <div class="card-body">
                  @include('misc.flash-message')
                  <table class="table table-striped table">
                    <thead>
                      <tr>
                        <th scope="col">Merk</th>
                        <th scope="col">Zichtbaarheid</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Producten</th>
                        <th scope="col">Acties</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($brands as $brand)
                      <tr>
                        <td scope="col">{{ $brand->brand_name }}</td>
                        <td>{!! $brand->brand_hidden == 0 ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>' !!}</td>
                        <td scope="col">{{ $brand->categories->category_name }}</td>
                        <td scope="col">{{ $brand->products->count() }}</td>
                        <td>
                          <form method="GET" class="d-inline" action="{{ route('beheer.brands.edit', $brand->id) }}">
                            <button type="submit" class="btn btn-info">Wijzig</button>
                          </form>
                          <form method="POST" class="d-inline" action="{{ route('beheer.brands.delete', $brand->id) }}">
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
