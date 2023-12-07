@extends('layouts.dashboard.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Data</h1>
  </div>

  <form action="{{route('dashboard.data.store')}}" method="POST" >
    @csrf
    <div class=" form-group mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap">
      </div>
    <div class=" form-group mb-3">
        <label for="age" class="form-label">Umur</label>
        <input type="text" class="form-control" id="age" name="age" placeholder="Masukkan Umur">
      </div>
    <div class=" form-group mb-3">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <textarea class="form-control" id="address" rows="3" name="address" placeholder="Masukkan Alamat Lengkap"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection