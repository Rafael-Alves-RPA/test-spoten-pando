<div>
  <a class="btn btn-primary" href="{{ route('banners.edit', ['id' => $id]) }}">
    {{ __('Edit') }}
  </a>
  <form action="{{ route('banners.delete', ['id' => $id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this banner?')"
      class="btn btn-danger z-4">Delete</button>
  </form>
</div>
