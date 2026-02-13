@extends('layouts.myapp')
@section('title', 'majors')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="{{ route('majors.create') }}" class="btn btn-primary">Add majors</a>
</div>
<table class="table table-bordered">
  <tr>
    <th>title</th>
  </tr>
  @foreach ($majors as $s)
  <tr>
    <td>{{ $s->title }}</td>
    <td>
      <a href="{{ route('majors.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('majors.destroy', $s->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
<div class="mt-3">
  {{ $majors->links('pagination::bootstrap-5') }}
</div>
@endsection
