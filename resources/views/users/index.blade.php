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
                      
                        <div class="card-body">
                            
                            <form id="search_form">

                                    <div class='row'>    
                                        
                                        <div class=" col-lg-4">
                                            <div class="form-group">
                                                 
                                                <label class="font-weight-bold"> Name:</label>
                                                <input type='text' class="form-control" autocomplete="off" id="name" name="name" @if(isset(request()->name)) value="{{ request()->name }}" @endif  />  

                                            </div> 
                                        </div>
                                        
                                        <div class=" col-lg-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Email:</label>
                                                <input type='text' class="form-control" autocomplete="off" id="email" name="email" @if(isset(request()->email)) value="{{ request()->email }}" @endif  />
                                                    
                                            </div>
                                        </div>
                                        
                                        <div class=" col-lg-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Phone No:</label>
                                                <input type='text' class="form-control" autocomplete="off" id="phone" name="phone" @if(isset(request()->phone)) value="{{ request()->phone }}" @endif  />
                                                    
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">

                                        <div class="text-primary form-group col-lg-3">

                                                   <input type="submit"  class="btn btn-success mt-1" id="search_btn" value="Search" />
                                                   <a href="{{url('/users')}}" class="btn btn-danger mt-1">Reset</a>

                                        </div>

                                    </div>

                            </form>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover normal-table" @if(count(@$records) == 0) hidden @endif>
                                            <thead>
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($records as $record)
                                                <tr data-delete="{{ route($route_name.'.destroy', $record) }}">
                                                    
                                                    <td>{{ $record->first_name . ' ' . $record->last_name }}</td>
                                                    <td>{{ $record->email }}</td>
                                                    <td>{{ getRole($record->id) }}</td>

                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" data-id="{{$record->id}}" class="toggle-class" {{ $record->approval_status ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>

                                                    <td class="text-center">

                                                        <a href="{{ route($route_name.'.edit', $record) }}"><i
                                                                    class="fa fa-pencil btn btn-primary btn-sm"></i></a>
                                                        <a href="#" data-delete-trigger><i
                                                                    class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                                    </td>
                                                </tr>
                                            
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <p>Showing {!! $records->firstItem() !!} to {!! $records->lastItem() !!} of {!! $records->total() !!}</p>
                                        {!! $records->appends(request()->except('page'))->links() !!}
                                        
                                    </div>
                                    

                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            
        
@endsection
@section('javascript')
@include('users._partials.js')
@endsection