@extends('layouts.clients')

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 pl-0">
                <div class="row row-eq-height mh-100 mh-100vh">
                    @foreach($brands as $brand)
                        <div class="col-4 pr-0 pl-0 h-100 vh-100">
                            @foreach($brand->images as $images)
                                <img class="h-100 w-100"
                                     src="{{ asset($images->brand_image_tiny_url) }}"
                                     srcset="{{ asset($images->brand_image_large_url) }} 2400w, {{ asset($images->brand_image_medium_url) }} 1200w, {{ asset($images->brand_image_mobile_url) }} 600w"
                                     sizes="(min-width: 1200px) 50vw,
                                100vw">
                            @endforeach
                        </div>
                        <div class="col-8 pl-0 vertical-center brand-container-{{$brand->brand_color}}">
                            <div class="text-center brand-description-container">
                                <h1>{{ $brand->brand_name }}</h1>
                                <p class="text-left">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
