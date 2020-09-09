@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Pagina's</div>
                        <a href="{{ route('beheer.pages.create') }}"><button type="button" class="btn btn-primary float-right">Nieuwe pagina aanmaken</button></a>
                    </div>

                    <div class="card-body">
                        @include('misc.flash-message')
                        <table class="table table-striped table">
                            <thead>
                            <tr>
                                <th scope="col">Pagina</th>
                                <th scope="col">Zichtbaarheid</th>
                                <th scope="col">URL</th>
                                <th scope="col">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->page_name }}</td>
                                    <td>{!! $page->page_hidden == 0 ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>' !!}</td>
                                    <td>{{ $page->page_slug }}</td>
                                    <td>
                                        <form method="GET" class="d-inline" action="{{ route('beheer.pages.edit', $page->id) }}">
                                            <button type="submit" class="btn btn-info">Wijzig</button>
                                        </form>
                                        <form method="POST" class="d-inline" action="{{ route('beheer.pages.delete', $page->id) }}">
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
