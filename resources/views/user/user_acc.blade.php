@extends('layouts.app')

{{-- User account --}}
@section('content')
<div class="container">
    <div class="row">
        {{-- User Dashboard --}}
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                   <h5 class="m-auto">
                    {{ $user->name}} info
                   </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <img 
                        class="w-50 rounded-circle mt-2 mb-2"
                        src="/storage/avatars/{{auth()->user()->avatar}}" 
                        alt="{{$user->avatar}}'s profile pic">
                        <h1>
                            {{$user->name}}
                        </h1>
                        <h6>
                            {{$user->email}}
                        </h6>
                    </div>
                </div>
                @if ($user->is_admin == 1)
                    <div class="card-body">    
                        <a href="{{ route('admin.page', $user->id) }}" class="btn btn-warning m-auto d-block">
                            Admin Panel
                        </a>
                    </div>
                @endif
            </div>
        </div>
        {{-- User settings --}}
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-auto">
                        {{auth()->user()->name}}'s settings
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $user->id)}}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{auth()->user()->name}}">
                          </div>

                          <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ auth()->user()->email }}">
                          </div>

                          <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                          </div>

                          <div class="form-group mb-3">
                            <label for="password_repeat">Repeat password</label>
                            <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="password">
                          </div>

                          <div class="form-group mb-3">
                            <label for="avatar">Default file input example</label>
                            <input class="form-control" type="file" id="avatar" name="avatar">
                          </div>

                          <input type="submit" class="btn btn-primary" value="Update Profile">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
