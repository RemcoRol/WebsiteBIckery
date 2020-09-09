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
                        <form onsubmit="{{ route('beheer.menus.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Zichtbaarheid:</label>
                                <select class="custom-select" name="menu_hidden">
                                    <option value="0">Zichtbaar</option>
                                    <option value="1">Verborgen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Menu naam:</label>
                                <input type="text" name="menu_title" value="{{ old('menu_title') }}" class="form-control" placeholder="Menu naam">
                            </div>
                            <div class="form-group">
                                <label>Parent:</label>
                                <select class="form-control" name="menu_parent_id">
                                    <option selected disabled>Selecteer een hoofdmenu</option>
                                    @foreach($allMenus as $key => $value)
                                        <option value="{{ $key }}">{{ $value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bestemming:</label>
                                <select class="form-control" name="page_id">
                                    <option selected disabled>Selecteer een bestemming</option>
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
