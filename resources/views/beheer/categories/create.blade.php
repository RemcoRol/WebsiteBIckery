@extends('layouts.beheer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-inline card-title">Categorie aanmaken</div>
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
                  <form onsubmit="{{ route('beheer.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Zichtbaarheid:</label>
                      <select class="custom-select" name="category_hidden">
                          <option value="0">Zichtbaar</option>
                          <option value="1">Verborgen</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Categorie naam:</label>
                      <input type="text" name="category_name" value="{{ old('category_type') }}" class="form-control" placeholder="Categorie naam">
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
