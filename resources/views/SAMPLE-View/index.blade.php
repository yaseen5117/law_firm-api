@extends('layouts.master')
@section('title')
     {{$title_prural}}
    @parent
@stop
@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <h3 class="box-title">{{$title_prural}}</h3>
                                    <br/><br/>

                                    <p class="m-t-10">
                                        <a href="{{ route($route_name.'.create') }}" class="btn btn-success">Add {{$title_singular}}</a>
                                    </p>
                                </div>

                            </div>
                        </div> <!-- box-header -->

                        <div class="box-body">
                            @include('shared.errors')

                            

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    <table class="table table-hover normal-table">
                                        <thead>
                                        <tr>
                                            
                                            <th>Title</th>
                                            <th>Display Order</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($records as $record)
                                            <tr data-delete="{{ route($route_name.'.destroy', $record) }}">
                                                
                                                <td>{{ $record->title }}</td>
                                                <td>{{ $record->display_order }}</td>

                                                <td class="text-center">

                                                    <a href="{{ route($route_name.'.edit', $record) }}"><i
                                                                class="fa fa-pencil btn btn-primary btn-sm"></i></a>
                                                    <a href="#" data-delete-trigger><i
                                                                class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No data found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div> <!-- row -->
                            
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        
@endsection
