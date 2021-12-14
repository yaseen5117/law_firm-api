@extends('layouts.master')
@section('title')
    Edit {{$title_singular}}
    @parent
@stop
@section('content')

            <div class="row">

                <div class="col-md-12 col-lg-12">
                    <div class="box">

                        <div class="box-header">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <h3 class="box-title">Edit {{$title_singular}}</h3>
                                    <br/><br/>
                                    <p class="m-t-10">
                                        <a href="{{ route($route_name.'.index') }}" class="btn btn-default">Back to List</a>
                                    </p>
                                </div>

                            </div>
                        </div> <!-- box-header -->

                        <div class="box-body">

                            {{-- Errors and messages --}}
                            {{-- // Errors and messages --}}
                            @include('shared.errors')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    @include($directory.'_partials._form', [
                                        'url' => route($route_name.'.update', $record),
                                        'record' => $record,
                                    ])

                                </div>
                            </div> <!-- row -->

                        </div> <!-- /.box-body -->
                    </div>
                </div><!-- /.box-body -->
            </div>
        
@endsection

@section('javascript')
@include($directory.'_partials.js')
@endsection