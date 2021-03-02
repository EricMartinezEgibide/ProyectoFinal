@extends('layouts.layoutProyecto')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Charts</h1>

        <input type="hidden" id="tareasTotales" value="{{sizeof($listaTareas)}}">
        <input type="hidden" id="tareasAcabadas" value="{{sizeof($tareasAcabadas)}}">
        <input type="hidden" id="tareasEnProgreso" value="{{sizeof($tareasEnProgreso)}}">

        <input type="hidden" id="tareasPorUsuario" value="{{json_encode($tareasPorUsuario)}}">





        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Datos simples
            </div>

            <div class="row p-2">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center pl-2 pr-2">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Usuarios
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{sizeof($listaUsuarios)}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center pl-2 pr-2">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Mensajes
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{sizeof($listaComentarios)}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center pl-2 pr-2">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Archivos
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{sizeof($listaArchivos)}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center pl-2 pr-2">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tareas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{sizeof($listaTareas)}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Tareas por usuario
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Tareas - En progreso / Finalizadas
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                </div>
            </div>
        </div>
    </div>
@endsection

