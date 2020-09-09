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
                        <label>Zichtbaarheid:</label>
                        <select class="custom-select" name="category_hidden">
                            <option value="0" @if ($category->category_hidden === 0) selected @endif>Zichtbaar</option>
                            <option value="1" @if ($category->category_hidden === 1) selected @endif>Verborgen</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Categorie naam:</label>
                      <input type="text" name="category_name" value="{{ $category->category_name ? $category->category_name : old('category_name') }}" class="form-control" placeholder="Categorie naam">
                    </div>
                    <div class="form-group">
                      <label>Categorie type:</label>
                      <select class="form-control" name="category_type">
                        <option value="0" @if ($category->category_type === 0) selected @endif>Brands</option>
                        <option value="1" @if ($category->category_type === 1) selected @endif>Kerst</option>
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
