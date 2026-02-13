@extends('layouts.myapp')
@section('title', 'Add Student')
@section('content')
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
  <select name="major_id" class="form-control mb-2" required>
    <option disabled  value="">Select Service</option>
    @foreach($majors as $m)
    <option value="{{ $m->id }}">{{ $m->title }}</option>
    @endforeach
  </select>
  <input type="file" name="image" class="form-control mb-3" required>
  <button type="submit" class="btn btn-primary">Save Student</button>
</form>
@endsection