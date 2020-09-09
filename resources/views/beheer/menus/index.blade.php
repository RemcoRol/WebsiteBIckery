@extends('layouts.beheer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-inline card-title">Menu</div>
                        <a href="{{ route('beheer.menus.create') }}"><button type="button" class="btn btn-primary float-right">Nieuw menu item aanmaken</button></a>
                    </div>

                    <div class="card-body">
                        @include('misc.flash-message')
                        <ul id="tree-menu">
                            @foreach($menus as $menu)
                                <li>
                                    {{ $menu->menu_title }}
                                    @if(count($menu->childs))
                                        @include('beheer.menus.manageChild',['childs' => $menu->childs])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
