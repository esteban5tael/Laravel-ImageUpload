@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1>{{ config('app.name') }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Image</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $image->name }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <br>
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}"
                                class="rounded mx-auto d-block" width="200" height="200">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
