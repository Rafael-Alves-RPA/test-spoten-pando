@extends('layouts.app')

@section('content')
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @elseif (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  <div class="container">
    <div class="card">
      <div class="card-header">Edit Banner:</div>
      <form class="p-3" action="{{ route('banners.editSave', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="description" class="col-form-label">Description:</label>
          <input type="text" value="{{ $banner->description }}" class="form-control" id="description" required
            name="description"></input>
        </div>
        <div class="row mb-3">
          <img class="col-auto" src="{{ asset('banner/' . $banner->banner) }}" width="100px" height="100px"
            alt="">
          <div class="col-auto">
            <label for="banner" class="col-form-label">Banner:</label>
            <input type="file" class="form-control" id="banner" name="banner" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
