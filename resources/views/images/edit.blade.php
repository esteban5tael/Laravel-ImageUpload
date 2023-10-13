@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1>{{ config('app.name') }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @error('image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Image</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('images.update', $image->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('images.form')

                        </form>
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
