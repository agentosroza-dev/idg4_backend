@extends('layouts.myapp')
@section('title', 'students')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>
<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Major</th>
    <th>Image</th>
    <th>Actions</th>
  </tr>
  @foreach ($students as $s)
  <tr>
     <td>
      @if ($s->image)
      <img src="{{ asset('storage/' . $s->image) }}" width="80">
      @else
      No Image
      @endif
    </td>
    <td>{{ $s->name }}</td>
    <td>{{ $s->major->title }}</td>
    <td>
      <a href="{{ route('students.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('students.destroy', $s->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
<div class="mt-3">
  {{ $students->links('pagination::bootstrap-5') }}
</div>
@endsection


