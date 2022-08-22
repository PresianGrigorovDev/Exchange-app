@extends('layouts.admin_nav')

{{-- Admin panel | Users --}}
@section('content')
@if (auth()->user()->is_admin == 1)
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-auto">
                        Dashboard
                    </h5>
                </div>
                <div class="card-body d-flex flex-column align-items-center">               
                </div>
                <div class="card-body d-flex flex-column">
                    <a class="btn btn-transparent" href="{{ route('admin.rates') }}">
                        See All Rates
                    </a>
                    <a class="btn btn-transparent" href="#">
                        See All Users
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">profile pic</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">admin</th>
                                <th scope="col">banned</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row"><img class="w-25 rounded-circle" src="/storage/avatars/{{$user->avatar}}" alt=""></th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->is_admin == 1)
                                        <ion-icon name="shield-checkmark-outline" class="text-primary"></ion-icon>
                                    @else
                                        <ion-icon name="shield-checkmark-outline" class="text-seccondary"></ion-icon>
                                    @endif
                                </td>
                                    <td>
                                        @if ($user->is_banned == 1) 
                                        <ion-icon name="warning-outline" class="text-warning"></ion-icon> 
                                        @else
                                        <ion-icon name="warning-outline" class="text-seccondary"></ion-icon>
                                        @endif   
                                    </td>
                                    <td>
                                        @if (auth()->user()->id != $user->id)
                                        <a href="{{ route('user.delete', $user->id) }}">
                                            <ion-icon name="trash-outline" class="text-danger"></ion-icon>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
