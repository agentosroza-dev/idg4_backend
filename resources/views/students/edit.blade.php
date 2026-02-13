@extends('layouts.myapp')
@section('title', 'Edit Student')
@section('content')
<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <input type="text" name="name" class="form-control mb-2" value="{{ old('name', $student->name) }}">
  <select name="major_id" class="form-control mb-2" required>
    @foreach($majors as $m)
    <option value="{{ $m->id }}" {{ $m->id == $student->major_id ? 'selected' : '' }}>{{$m->title }}</option>
    @endforeach
  </select>
  @if ($student->image)
  <div class="mb-2">
    <label>Current Image:</label><br><img src="{{ asset('storage/' . $student->image) }}" width="600">
  </div>
  @else No Image
  @endif
  <div class="mb-3"> <label>Upload New Image:</label> <input type="file" name="image" class="form-control"></div>
  <button class="btn btn-success">Update Student</button>
</form>
@endsection