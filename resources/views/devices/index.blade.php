@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dispositivos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        @can ('crear-local')
                        <a class="btn btn-warning" href="{{ route('devices.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#424242">
                                        <th style="display: none;">Id</th>
                                        <th style="color:#fff" >Nombre</th>
                                        <th style="color:#fff">IP</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                            @foreach ($devices as $device)
                            <tr>
                                <td style="display: none;" >{{ $device->id }} </td>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->ip }} </td>
                                <td>
                                    <form action="{{ route('devices.destroy',$device->id) }}" method="POST">
                                        @can('editar-local')
                                        <a class="btn btn-info" href="{{ route('devices.edit',$device->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-local')
                                        <button type="submit" class="btn btn-danger" >Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                                {!! $devices->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection