@extends('layouts.admin_nav')

{{-- Admin panel | Rates --}}
@section('content')
@if (auth()->user()->is_admin == 1)
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>
                        API Refresh
                    </h5>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                        <a class="btn btn-primary m-2" href="{{ route('api.load') }}">
                            Load API
                        </a> 
               
                        <a class="btn btn-primary m-2" href="{{ route('api.refresh') }}">
                            Refresh API
                        </a>            
                </div>
                <div class="card-body d-flex flex-column">
                    <a class="btn btn-transparent" href="{{route('admin.rates')}}">
                        See All Rates
                    </a>
                    <a class="btn btn-transparent" href="{{ route('admin.users') }}">
                        See All Users
                    </a>
                </div>
                <div class="card-body">
                    <h5>Filters:</h5>
                    <form action="{{ URL::current() }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary mb-3 mt-3" value="Filter">
                        <div class="form-group mb-2">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Rate name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" id="value" name="value" class="form-control" placeholder="Rate value">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    Rates
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">@sortablelink('id','#')</th>
                                <th scope="col">@sortablelink('name','name')</th>
                                <th scope="col">@sortablelink('value','value')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rates as $rate)
                                <tr>
                                    <th scope="row">{{$rate->id}}</th>
                                    <td>{{$rate->name}}</td>
                                    <td>{{$rate->value}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    {{-- {{ $rates->withQueryString()->links() }} --}}

                    <p>
                        Displaying {{$rates->count()}} of {{ $rates->total() }} rate(s).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
