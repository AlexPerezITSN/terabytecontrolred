@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fibra en </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        @can ('crear-fiber')
                        <a class="btn btn-warning" href="{{ route('fibers.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#424242">
                                        <th style="display: none;">Id</th>
                                        <th style="color:#fff" >Nombre</th>
                                        <th style="color:#fff">IP</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                            @foreach ($fibers as $fiber)
                            <tr>
                                <td style="display: none;" >{{ $fiber->id }} </td>
                                <td>{{ $fiber->name }}</td>
                                <td>{{ $fiber->ip }} </td>
                                <td>
                                    <form action="{{ route('fibers.destroy',$fiber->id) }}" method="POST">
                                        @can('editar-fiber')
                                        <a class="btn btn-info" href="{{ route('fibers.edit',$fiber->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-fiber')
                                        <button type="submit" class="btn btn-danger" >Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                                {!! $fibers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection