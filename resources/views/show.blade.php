@extends('layouts.app')

@section('content')
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      @foreach ($banners as $key => $banner)
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="active"
          aria-current="true" aria-label="Slide {{ $key }}"></button>
      @endforeach
    </div>
    <div class="carousel-inner">
      @foreach ($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          <img src="{{ asset('banner/' . $banner->banner) }}" class="img-fluid p-4" style="width: 100%; height: 600px"
            alt="{{ $banner->description }}">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{ $banner->description }}</h5>
          </div>
        </div>
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection
