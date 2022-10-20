@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Servicios en </h3>
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
                                        <h5>Fibra</h5>
                                        @php
                                        use App\Models\Fiber;
                                        $cant_fiber = Fiber::count();

                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_fiber}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/fibers" class="text-white">ver mas</a></p>
                                        
                                    </div>
                                </div>  
                            </div> 
                            
                            
                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Inalambrico</h5>
                                        @php
                                        use App\Models\Wireless;
                                        $cant_wireless = Wireless::count();

                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_wireless}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/wireless" class="text-white">ver mas</a></p>
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