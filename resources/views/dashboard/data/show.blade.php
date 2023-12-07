@extends('layouts.dashboard.main')

@section('content')

<div class="container">
    <h1>
        Nama : {{ $data->name }}
    </h1>
    <div class="mt-2">
        {{ $data->age }}
    </div>
    <div class="mt-2">
        {{ $data->address }}
    </div>
</div>
@endsection