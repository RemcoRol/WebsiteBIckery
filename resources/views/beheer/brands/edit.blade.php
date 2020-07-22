@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Merk aanpassen</div>
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
                  <form action="{{ route('beheer.brands.update', $brand->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label>Categorie naam:</label>
                      <input type="text" name="brand_name" value="{{ $brand->brand_name ? $brand->brand_name : old('brand_name') }}" class="form-control" placeholder="Categorie naam">
                    </div>
                    <div class="form-group">
                      <label>Categorie:</label>
                      <select class="form-control" name="categories_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Opslaan</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
