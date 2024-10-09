@extends('layout')

@if (isset($readonly))
    @section('heading')
    <h3 class="mt-2 text-center">
        User Details
    </h3>
    @endsection
@endif

@if (isset($users))
    @section('heading')
    <h3 class="mt-2 text-center">
        Update User
    </h3>
    @endsection
@endif

@section('heading')
    <h3 class="mt-2 text-center">
        Add New User
    </h3>
@endsection

@push('style')
    <style>
        .w-20 {
            width: 20%;
        }
    </style>
@endpush
@php
    $readonlyStr = isset($readonly) ? "readonly='true'" : "";
@endphp
@section('content')
    <div class="w-50 mx-auto">
        <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>
        <form action="{{ isset($users) && $users->id ? route('user.update', $users->id) : route('user.store') }}" method="POST">
            @csrf
            @if (isset($users))
                @method('PUT')
            @endif
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend w-20">
                    <span class="input-group-text" id="basic-addon1">Name<span style="color:red;font-size:20px;"> *</span></span>
                </div>
                <input id="user_name" name="user_name" type="text" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1" value="{{ old('user_name', isset($users) ? $users->user_name : '') }}" {{$readonlyStr}}>
            </div>
            {{--  --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend w-20">
                    <span class="input-group-text" id="basic-addon1">City<span style="color:red;font-size:20px;"> *</span></span>
                </div>
                <input id="user_city" name="user_city" type="text" class="form-control" placeholder="City" aria-label="Username"
                    aria-describedby="basic-addon1" value="{{ old('user_city', isset($users) ? $users->user_city : '') }}" {{$readonlyStr}}>
            </div>
            {{-- --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend w-20">
                    <span class="input-group-text" id="basic-addon1">Gender<span style="color:red;font-size:20px;"> *</span></span>
                </div>
                <div class="form-control d-flex align-items-center">
                @if (isset($readonly))
                    <div class="form-check form-check-inline">
                        {{ isset($users) ? $users->user_gender : '' }}
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_gender" id="male" value="Male" 
                            {{ (old('user_gender', isset($users) ? $users->user_gender : null) == 'Male') ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_gender" id="female" value="Female" 
                            {{ (old('user_gender', isset($users) ? $users->user_gender : null) == 'Female') ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_gender" id="other" value="Other" 
                            {{ (old('user_gender', isset($users) ? $users->user_gender : null) == 'Other') ? 'checked' : '' }}>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                @endif                    
                </div>
            </div>
            @if (!isset($readonly))
               @if (isset($users))
                    <button type="submit" class="btn btn-success text-center">Update</button>
               @else
                    <button type="submit" class="btn btn-success text-center">Create</button>                   
               @endif 
            @endif 
        </form>
    </div>
@endsection
