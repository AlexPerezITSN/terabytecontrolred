@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar dispositivo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos!</strong>
                                        @foreach ($errors->all() as $error)
                                            <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" >$times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('fibers.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="name" style="height: 100px"></textarea>
                                            <label for="name">Nombre</label>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="ip">Direccion IP</label>
                                            <input type="text" name="ip" class="form-control">
                                        </div>
                                    </div>
                                    <input name="location_id" type="hidden" value="{{ $location->id}}"/>
                                    <button type="submit" class="btn btn-primary">Guadar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection