@extends('layouts.master')
@section('title')
    Create {{$title_singular}}
    @parent
@stop
@section('content')

            <h1 class="h3 mb-4 text-gray-800">Add {{$title_singular}}</h1>

            <div class="row">

                <div class="col-md-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                        </div> -->
                        <div class="card-body">
                            @include('shared.errors')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                @include('petitions._partials.tabs',[
                                'petition_documents_view'=>1,                                 
                                ])

                                    @include($directory.'_partials._form', [
                                        'url' => route($route_name.'.store'),
                                        'record' => null,
                                    ])

                                </div>
                            </div> <!-- row -->
                        </div>
                    </div>
                </div>
            </div>
        
@endsection

@section('javascript')
@include($directory.'_partials.js')
@endsection
