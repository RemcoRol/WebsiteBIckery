@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Merk aanmaken</div>
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
                        <form onsubmit="{{ route('beheer.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Zichtbaarheid:</label>
                                <select class="custom-select" name="brand_hidden">
                                    <option value="0">Zichtbaar</option>
                                    <option value="1">Verborgen</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Merk naam:</label>
                                <input type="text" name="brand_name" value="{{ old('brand_name') }}"
                                       class="form-control" placeholder="Merk naam">
                            </div>

                            <div class="form-group">
                                <label>Categorie:</label>
                                <select class="form-control" name="categories_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Merk achtergrond kleur:</label>
                                <select class="form-control" name="brand_color">
                                    <option value="green">
                                        Groen
                                    </option>
                                    <option value="blue">
                                        Blauw
                                    </option>
                                    <option value="purple">
                                        Paars
                                    </option>
                                    <option value="cyan">
                                        Licht blauw
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Logo:</label>
                                <input type="file" name="brand_logo_image" value="{{ old('brand_logo_image') }}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Sfeerafbeelding:</label>
                                <input type="file" name="brand_image" value="{{ old('brand_image') }}"
                                       class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
