@extends('layouts.main')


@section('container')
    
<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating my-2">
                    {{-- <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror --}}
                </div>
                <div class="form-floating my-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <select name="organization_id" id="organization" class="form-control @error('organization') is-invalid @enderror">
                        @foreach($orgnizations as $org)
                        <option value="{{$org->id}}">{{$org->name}}</option>
                        @endforeach
                    </select>
                    <label for="organization">Organization</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <label for="Role">Role</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        
                <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login!</a></small>
        </main>
    </div>
</div>
@endsection