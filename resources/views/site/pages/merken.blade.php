@extends('layouts.clients')

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 pr-0 pl-0">
                <div class="over-ons-parallax">

                </div>
                <div>
                    <h2 class="bickery-red text-center mt-5">Bickery Food Group B.V.</h2>
                    <h1 class="text-center font-weight-bold mt-3">{{ __('site.merken.merken') }}</h1>

                    <div class="row mt-5">

                        @foreach($brands as $brand)
                            @foreach($brand->images as $images)
                            <div class="col-3 pl-0 pr-0 my-auto">
                                <div class="brand-container brand-container-{{$brand->brand_color}} align-middle">
                                    <img class="mx-auto d-block brands-logo-image" src="{{ asset($images->brand_image_logo) }}" alt=" {{ $brand->brand_name }} logo">
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
