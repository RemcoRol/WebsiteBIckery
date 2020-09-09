@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Afbeelding aanmaken</div>
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
                        <form onsubmit="{{ route('beheer.images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Afbeelding titel:</label>
                                <input type="text" name="image_name" value="{{ old('image_name') }}" class="form-control" placeholder="Afbeelding naam">
                            </div>
                            <div class="form-group">
                                <label>Afbeelding alt text:</label>
                                <input type="text" name="image_alt_text" value="{{ old('image_alt_text') }}" class="form-control" placeholder="Afbeelding alt text">
                            </div>
                            <div class="form-group">
                                <label>Afbeelding:</label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pagina:</label>
                                <select class="form-control" name="page_id">
                                    <option value="0">Geen pagina</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->page_name }}</option>
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
