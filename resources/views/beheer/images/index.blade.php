@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Afbeeldingen</div>
                        <a href="{{ route('beheer.images.create') }}"><button type="button" class="btn btn-primary float-right">Nieuwe afbeelding aanmaken</button></a>
                    </div>

                    <div class="card-body">
                        @include('misc.flash-message')
                        <div class="row justify-content-center">
                            @foreach ($images as $image)
                                <div class="col-4">
                                    <div class="card w-100">
                                        <img class="card-img-top" src="{{ asset($image->image_original_url) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $image->image_title }}</h5>
                                            <p class="card-text">Voor pagina: {{ $image->page ? $image->page->page_name : 'Niet pagina relateerd' }}</p>
                                            <form method="GET" class="d-inline" action="{{ route('beheer.images.edit', $image->id) }}">
                                                <button type="submit" class="btn btn-info">Wijzig</button>
                                            </form>
                                            <form method="POST" class="d-inline" action="{{ route('beheer.images.delete', $image->id) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Verwijder</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
