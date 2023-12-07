@extends('layouts.dashboard.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Data</h1>
  </div>

  <form action="{{route('dashboard.data.update', $data)}}" method="POST" >
    @csrf
    @method('PUT')
    <div class=" form-group mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name', $data->name) }}">
      </div>
    <div class=" form-group mb-3">
        <label for="age" class="form-label">Umur</label>
        <input type="text" class="form-control" id="age" name="age" placeholder="Masukkan Umur"  value="{{ old('age', $data->age) }}">
      </div>
    <div class=" form-group mb-3">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <textarea class="form-control" id="address" rows="3" name="address" placeholder="Masukkan Alamat Lengkap"  value="{{ old('address', $data->address) }}"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection