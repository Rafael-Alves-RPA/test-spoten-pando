<div>
  <button type="button" class="btn btn-primary z-4" data-bs-toggle="modal" data-bs-target="#editBanner{{ $id }}"
    data-bs-whatever="@mdoa">Edit</button>
  <form action="{{ route('banners.delete', ['id' => $id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this banner?')"
      class="btn btn-danger z-4">Delete</button>
  </form>

</div>
<div class="modal fade" id="editBanner{{ $id }}" tabindex="-1" aria-labelledby="editBannerLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editBannerLabel">Edit banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/banners/{{ $id }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="editBanner" class="col-form-label">Banner:</label>
            <input value="{{ $banner }}" type="text" class="form-control @error('banner') is-invalid @enderror"
              id="editBanner" name="banner" required placeholder="https://unsplash.com/photos">
            @error('banner')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="editDescription" class="col-form-label">Description:</label>
            <input value="{{ $description }}" type="text" class="form-control" id="editDescription" required
              name="description"></input>
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
