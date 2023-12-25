@extends('layouts.main')
@section('container')

<div class="card">
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <div class="table-responsive small col-sm-8" style="width: 100%">
            <table class="table table-striped table-sm" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            @foreach ($users as $user)
                <tr>
                    @if ($user->name == 'master_admin')
                        @continue
                    @endif
                    <td scope="col">{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge text-bg-dark">{{ $user->role }}</span>
                    </td>
                    <td>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm py-0">Edit</a>
                    </td>
                </tr>
            @endforeach
            </table>
            </div>
    </div>
</div>



@endsection
