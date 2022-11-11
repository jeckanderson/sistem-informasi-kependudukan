@extends('dashboard.templates.main')

@section('container')
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="/dashboard/user/create" class="btn btn-success">User {{ $users->count() }}</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h4 class="border-bottom mb-3">User Akses</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level Akses</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- skip(1) --}}
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="/dashboard/user/{{ $item->id }}/edit" class="badge bg-primary text-white">Update</a>
                                <form action="/dashboard/user/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger text-white border-0" onclick="return confirm('yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection