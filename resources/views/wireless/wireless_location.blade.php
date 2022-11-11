@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fibra en {{$location->name}}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        @can ('crear-wireless')
                        <a class="btn btn-warning" href="{{ route('wireless.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#424242">
                                        <th style="display: none;">Id</th>
                                        <th style="color:#fff" >Nombre</th>
                                        <th style="color:#fff">IP</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                            @foreach ($wireless as $wireles)
                            <tr>
                                <td style="display: none;" >{{ $wireles->id }} </td>
                                <td>{{ $wireles->name }}</td>
                                <td>{{ $wireles->ip }} </td>
                                <td>
                                    <form action="{{ route('wireless.destroy',$wireles->id) }}" method="POST">
                                        @can('editar-wireless')
                                        <a class="btn btn-info" href="{{ route('wireless.edit',$wireles->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-wireless')
                                        <button type="submit" class="btn btn-danger" >Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                                {!! $wireles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection