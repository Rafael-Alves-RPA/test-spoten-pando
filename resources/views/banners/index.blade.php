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
      <div class="card-header">Manage Banners</div>
      <div class="d-flex justify-content-end position-relative z-3">
        <button type="button" class="btn btn-primary position-absolute top-50 end-0 m-3" data-bs-toggle="modal"
          data-bs-target="#exampleModal" data-bs-whatever="@mdo">Create New</button>
      </div>
      <div class="card-body">
        {{ $dataTable->table() }}
      </div>
    </div>
  </div>
@endsection



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create new banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/banners/new" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="banner" class="col-form-label">Banner:</label>
            <input type="text" class="form-control @error('banner') is-invalid @enderror" id="banner"
              name="banner" required placeholder="https://unsplash.com/photos">
            @error('banner')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="description" required name="description"></input>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
  {{ $dataTable->scripts() }}
@endpush
