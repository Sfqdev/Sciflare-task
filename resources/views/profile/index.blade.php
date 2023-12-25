@extends('layouts.main')

@section('container')
   
<div class="container">
    <div class="card">
        <div class="card-header">Profile</div>
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="small text-secondary">Name</div>
                    <h5>{{$profile->username}}</h5>
                </div>
                <div class="col-md-6">
                <div class="small text-secondary">Organization</div>
                   <h5>{{$profile->name}}</h5>
                </div>
                <div class="col-md-6">
                <div class="small text-secondary">Role</div>
                    <h5>{{$profile->role}}</h5>
                </div>
                <div class="col-md-6">
                <div class="small text-secondary">Address</div>
                    <h5>{{$profile->address}}</h5>
                </div>
                <div class="col-md-6">
                <div class="small text-secondary">Country</div>
                    <h5>{{$profile->country}}</h5>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection