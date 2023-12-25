@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <div class="table-responsive small">
            <table class="table table-striped table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Organization</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Users</th>
                    </tr>
                </thead>
            @foreach ($organizations as $organization)
                <tr>
                    {{-- @if ($user->name == 'master_admin')
                        @continue
                    @endif --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->category }}</td>
                    <td>{{ $organization->address }}</td>
                    <td>{{ $organization->country }}</td>
                    
                    <td>
                        <a href="/users/{{ $organization->id }}" class="btn btn-secondary btn-sm py-0">view</a>
                    </td>
                </tr>
            @endforeach
            </table>
            </div>
    </div>
</div>


@endsection