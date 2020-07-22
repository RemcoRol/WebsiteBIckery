@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Categorie aanpassen</div>
                </div>
                <div class="card-body">
                  <form action="{{ route('beheer.categories.update', $category->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label>Categorie naam:</label>
                      <input type="text" name="category_name" value="{{ $category->category_name ? $category->category_name : old('category_name') }}" class="form-control" placeholder="Categorie naam">
                    </div>
                    <div class="form-group">
                      <label>Categorie type:</label>
                      <select class="form-control" name="category_type">
                        <option value="0">Brands</option>
                        <option value="1">Kerst</option>
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
