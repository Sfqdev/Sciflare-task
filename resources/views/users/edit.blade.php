@extends('layouts.main')
@section('container')
 <div class="card">
     <div class="card-header">Edit Data</div>
     <div class="card-body">
        <form action="/users/{{ $user->id }}/update" method="post">
            @csrf
            <div class="table-responsive small">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table table-striped table-sm">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" value="{{ $user->name }}" class="form-control" name="name"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" value="{{ $user->email }}" class="form-control" name="email"></td>
                    </tr>
                    <tr>
                        <td>Organization</td>
                        <td>:</td>
                        <td>
                            <select name="organization_id" id="organization_id" class="form-control">
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}" @if($organization->id == $user->organization_id) selected @endif>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="role" value="{{$user->role}}" class="form-check-input" @if($user->role == 'admin') checked @endif>
                            <label class="form-check-label mx-2" for="defaultCheck1">
                                Admin
                            </label>
                            <input type="radio" name="role" value="user" class="form-check-input" @if($user->role == 'user') checked @endif>
                            <label class="form-check-label mx-2" for="defaultCheck1">
                                User
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit" class="btn btn-secondary btn-sm" name="submit">
                            <a href="{{ route('users') }}"><input type="submit" value="Cancel" class="btn btn-danger btn-sm" name="cancel"></a>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
     </div>
 </div>
{{-- {{ dd($users) }} --}}
@endsection
