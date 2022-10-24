@extends('dashboard.templates.main')

@section('container')
    <div class="row">
        <div class="col-md-12 text-center">
            <button class="btn btn-success">User {{ $users->count() }}</button>
        </div>
    </div>
    <h4>User Table</h4>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Is Admin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- skip(1) --}}
                    @foreach ($users as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="" class="badge bg-primary text-white">Update</a>
                                <a href="" class="badge bg-danger text-white">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection