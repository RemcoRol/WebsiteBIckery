@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Categoriën</div>
                  <a href="{{ route('beheer.categories.create') }}"><button type="button" class="btn btn-primary float-right">Nieuwe categorie aanmaken</button></a>
                </div>

                <div class="card-body">
                  @include('misc.flash-message')
                  <table class="table table-striped table">
                    <thead>
                      <tr>
                        <th scope="col">Categoriën</th>
                        <th scope="col">Merken</th>
                        <th scope="col">Type</th>
                        <th scope="col">Acties</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->merken->count() }}</td>
                        <td>{!! $category->category_type == 0 ? '<span class="badge badge-danger">Brands</span>' : '<span class="badge badge-success">Kerst</span>' !!}</td>
                        <td>
                          <form method="GET" class="d-inline" action="{{ route('beheer.categories.edit', $category->id) }}">
                            <button type="submit" class="btn btn-info">Wijzig</button>
                          </form>
                          <form method="POST" class="d-inline" action="{{ route('beheer.categories.delete', $category->id) }}">
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
