@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Pagina aanmaken</div>
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
                        <form onsubmit="{{ route('beheer.pages.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Zichtbaarheid:</label>
                                <select class="custom-select" name="page_hidden">
                                    <option value="0">Zichtbaar</option>
                                    <option value="1">Verborgen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pagina naam:</label>
                                <input type="text" name="page_name" value="{{ old('page_name') }}" class="form-control" placeholder="Pagina naam">
                            </div>
                            <div class="form-group">
                                <label>Pagina title SEO:</label>
                                <input type="text" name="page_meta_title" value="{{ old('page_meta_title') }}" class="form-control" placeholder="Pagina titel SEO">
                            </div>
                            <div class="form-group">
                                <label>Pagina beschijving SEO:</label>
                                <input type="text" name="page_meta_description" value="{{ old('page_meta_description') }}" class="form-control" placeholder="Pagina beschijving SEO">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
