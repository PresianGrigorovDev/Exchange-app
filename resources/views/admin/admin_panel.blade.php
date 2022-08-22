@extends('layouts.admin_nav')

{{-- Admin panel --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-auto">
                        Dashboard
                    </h5>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    @if ($rates == null)
                    <a class="btn btn-primary m-2" href="{{ route('api.load') }}">
                        Load API
                    </a> 
                    @else
                    <a class="btn btn-primary m-2" href="{{ route('api.refresh') }}">
                        Refresh API
                    </a>   
                    @endif              
                </div>
                <div class="card-body d-flex flex-column">
                    <a class="btn btn-transparent" href="{{ route('admin.rates') }}">
                        See All Rates
                    </a>
                    <a class="btn btn-transparent" href="{{ route('admin.users') }}">
                        See All Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
