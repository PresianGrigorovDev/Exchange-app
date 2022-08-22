@extends('layouts.app')

{{-- Main content --}}
@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <h1>{{auth()->user()->name}}'s dashboard</h1>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">        
                    <h1>{{ $chart->options['chart_title'] }}</h1>
                    {{-- {!! $chart->renderChartJsLibrary() !!} --}}
                    {{-- {!! $chart->renderJs() !!} --}}
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <h4>Filter Your Data</h4>
                            <form action="{{ route('filter.home') }}" method="POST">
                                @csrf
                                <input type="submit" class="btn btn-primary mb-3 mt-3" value="Filter">
                                <div class="form-group mb-2">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Rate name">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" id="value" name="value" class="form-control" placeholder="Rate value">
                                </div>
                            </form>

                            <h4>Export into csv</h4>
                            <a href="{{route('csv.export')}}" id="export" class="btn btn-success m-1" onclick="exportTasks(event.target);">Export</a>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <table class="table table.striped">
                                <thead>
                                    <tr>
                                        <td scope='col'>@sortablelink('id','#')</td>
                                        <td scope='col'>@sortablelink('name','name')</td>
                                        <td scope='col'>@sortablelink('value','value')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $rate)
                                        <tr>
                                            <th scope="row">{{$rate->id}}</th>
                                            <th>{{$rate->name}}</th>
                                            <th>{{$rate->value}}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Scripts --}}
@section('javascript')


{{-- Export to csv --}}
<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>
@endsection