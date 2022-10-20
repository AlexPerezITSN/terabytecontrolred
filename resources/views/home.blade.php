@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="row">                         
                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Usuarios</h5>
                                        @php
                                        use App\Models\User;
                                        $cant_usuarios = User::count();

                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">ver mas</a></p>
                                    </div>
                                </div>  
                            </div> 
                            
                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Roles</h5>
                                        @php
                                        use Spatie\Permission\Models\Role;
                                        $cant_roles = Role::count();
                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_roles}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/roles" class="text-white">ver mas</a></p>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Locations</h5>
                                        @php
                                        use App\Models\Lacations;
                                        $cant_local = User::count();

                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_local}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/locations" class="text-white">ver mas</a></p>
                                    </div>
                                </div>  
                            </div>

                            
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection