@extends('layouts.myapp')
@section('title', 'Edit major')
@section('content')
<form action="{{ route('majors.update', $major->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <input type="text" name="title" class="form-control mb-2" value="{{ old('title', $major->title) }}">
<button class="btn btn-success">Update major</button>
</form>
@endsection
