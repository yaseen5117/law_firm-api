@extends('layouts.master')
@section('title')
     {{$title_prural}}
    @parent
@stop
@section('content')

            <h1 class="h3 mb-4 text-gray-800">{{$title_prural}}</h1>
            <p class="m-t-10">
                <a href="{{ route($route_name.'.create') }}" class="btn btn-success">Add {{$title_singular}}</a>
            </p>

            <div class="row">

                <div class="col-md-12 col-lg-12">
                    @include('shared.errors')
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover normal-table">
                                            <thead>
                                            <tr>
                                                
                                                <th>Title</th>
                                                <th>Client</th>
                                                <th>Court</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($records as $record)
                                                <tr data-delete="{{ route($route_name.'.destroy', $record) }}">
                                                    
                                                    <td>{{ $record->name }}</td>
                                                    <td>{{ $record->client_id }}</td>
                                                    <td>{{ $record->court_id }}</td>

                                                    <td class="text-center">

                                                        <a href="{{ route($route_name.'.edit', $record) }}"><i
                                                                    class="fa fa-pencil btn btn-primary btn-sm"></i></a>
                                                        <a href="#" data-delete-trigger  onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i
                                                                    class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                                            <form id="delete-form" method="POST" action="{{ url('petitions/'.$record->id.'') }}"  >
                                                               @method('DELETE')
                                                               @csrf
                                                            </form>
                                                    </td>
                                                </tr>
                                            
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <p>Showing {!! $records->firstItem() !!} to {!! $records->lastItem() !!} of {!! $records->total() !!}</p>
                                        {!! $records->appends(request()->except('page'))->links() !!}
                                    </div>
                                    

                                </div>
                            </div> <!-- row -->
                        </div>
                    </div>
                </div>
            </div>

            
        
@endsection
