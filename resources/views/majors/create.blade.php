@extends('layouts.myapp')
@section('title', 'Add Major')
@section('content')
<form action="{{ route('majors.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="text" name="title" class="form-control mb-2" placeholder="title" required>
  <button type="submit" class="btn btn-primary">Save Major</button>
</form>
@endsection
