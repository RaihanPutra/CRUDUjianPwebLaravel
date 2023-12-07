@extends('layouts.dashboard.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data</h1>
  </div>

  <div class="table-responsive">
    <a href="/dashboard/data/create" class="btn btn-primary mb-3">Create Data</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Age</th>
          <th scope="col">Address</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->age }}</td>
                <td>{{ $data->address }}</td>
                <td>
                    <a href="/dashboard/data/{{ $data->id }}" class="badge bg-info">
                    <span data-feather="eye"></span></a>
                    <a href="{{route('dashboard.data.edit', compact('data'))}}" class="badge bg-warning">
                    <span data-feather="edit"></span></a>
                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal{{$data->id}}">
                    <span data-feather="x-circle"></span></button>
                    {{-- Modal Delete --}}
            <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1"
                aria-labelledby="deleteModal{{$data->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalTitle{{$data->id}}">Delete data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            Are You Sure want to delete data with name <strong>{{ $data->name }}</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            
                            <form action="{{route('dashboard.data.destroy', compact('data'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>

@endsection