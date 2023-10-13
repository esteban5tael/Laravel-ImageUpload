@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1>{{ config('app.name') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Image') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('images.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Actions</th>

                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>
                                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('images.show', $image->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('images.edit', $image->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"
                                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $image->id }}</td>

                                            <td>{{ $image->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $image->name }}" class="rounded mx-auto d-block"
                                                    width="50" height="50">

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $images->links() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
