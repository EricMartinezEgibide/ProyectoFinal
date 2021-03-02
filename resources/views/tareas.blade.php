@extends('layouts.layoutProyecto')

@section('content')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
  <main class="d-flex flex-column p-4 w-100">
      <div class="mb-3  d-flex justify-content-start justify-content-md-center w-100">
          <button type="button" class="btn text-uppercase w-25  justify-content-start btnEnviar btn-dark" data-toggle="modal" data-target="#exampleModal">
              Crear Tarea
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nueva Tarea</h5>
                      </div>
                      <div class="modal-body">
                          <div class="sn-field ">
                              <form id="formTarea" method="post" action="{{route('crearTareas')}}">
                              @csrf
                                  <input type="hidden" name="idP" value="{{$_COOKIE['idProyecto']}}">
                              <div class="modal-body">
                                  <!--FORMULARIO PARA LA CREACIÓN DE PROYECTOS-->
                                  <div class="form-group">
                                      <label for="exampleFormControlInput1">Título de la tarea</label>
                                      <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Tarea1">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Descripción</label>
                                      <textarea name="descripcion" class="form-control w-100" id="descripcion" rows="3"></textarea>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" class="btn btn-dark" value="Crear">
                              </div>
                              </form>



                          </div>

                      </div>

                  </div>
              </div>
          </div>


      </div>

      <div  id="contenedorTareas" class="d-flex justify-content-center flex-wrap w-100">
          @forelse($listatareas as $tarea)
              @if($tarea->estado==0)
              <div class="accordion-item tstyle tarea rounded" style="background:#ffde69" id="tarea{{$tarea->id}}">
                  <h2 class="accordion-header" >
                      <button class=" text-center accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#t{{$tarea->id}}" aria-expanded="false" aria-controls="t{{$tarea->id}}">
                          <p class=" text-uppercase">{{$tarea->titulo}}</p>
                      </button>
                  </h2>
                  <div id="t{{$tarea->id}}" class="accordion-collapse  rounded collapse" aria-labelledby="tarea{{$tarea->id}}" data-bs-parent="#contenedorTareas">
                      <div class="accordion-body w-100 d-flex flex-wrap p-2">

                          <div class="w-50 d-flex flex-column align-items-start align-items-md-center">
                              @if($tarea->estado==0)
                                  <div class="">
                                      <p><strong>Estado</strong>:<strong class="text-success">En proceso</strong></p>
                                  </div>

                              @else
                                  <div class="">
                                      <p class=>Estado: <strong class="text-danger">Finalizada</strong></p>
                                  </div>
                              @endif

                                  <P class="mb-1">Fecha-inicio: </P>
                                  <span class="mt-0">{{$tarea->created_at}}</span>

                          </div>



                          <div class="w-50 d-flex align-items-center flex-column">
                                  <p>Autor: {{$tarea->datosAutor['name']}}</p>
                              @if($tarea->estado==0)
                                  <P>Fecha-fin:<span>....</span></P>
                              @else
                                  <P class="mb-1">Fecha-fin: </P>
                                  <span class="mt-0">{{$tarea->fecha_vencimiento}}</span>

                              @endif
                          </div>


                          <div class="w-100 mt-3 mb-3">
                              <div class="w-50 d-flex flex-column align-items-start align-items-md-center">


                              <P class="mb-1">Descripcion: </P>
                              <span class="mt-0 mb-4 border-dark rounded">{{$tarea->descripcion}}</span>
                              </div>

                          </div>


                          <div class="w-50 justify-content-center p-1">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#listapart{{$tarea->id}}">
                                  Participantes
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="listapart{{$tarea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Lista de participantes de la tarea</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              @foreach($tarea->participantes as $participante)
                                                  <ul>
                                                      <li>{{$participante->name}}</li>
                                                  </ul>
                                              @endforeach
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                              <div class="w-50 d-flex justify-content-center p-1">
                                  <!-- Button trigger modal -->
                                  @if(auth()->user()->id==$tarea->datosAutor['id'])

                                  <button type="button"  class="btn w-75 btn-dark" data-toggle="modal" data-target="#modal{{$tarea->id}}">
                                      Añadir
                                  </button>

                              @endif

                                  <!-- Modal -->
                                  <div class="modal fade" id="modal{{$tarea->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Añadir participante a la tarea {{$tarea->id}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>


                                                  <div class="modal-body">
                                                      <!--FORMULARIO PARA LA CREACIÓN DE PROYECTOS-->
                                                      <div class="form-group d-flex">
                                                          <input type="hidden" id="pt}" value="{{$tarea->id}}" name="idTarea">
                                                          <select id="select{{$tarea->id}}" name="idUsuario" class="w-75 select">
                                                              @foreach($participantesProyecto as $p)
                                                                  <option value="{{$p->dt['id']}}">{{$p->dt['name']}}</option>

                                                              @endforeach
                                                          </select>
                                                          <button  class="btn btn-dark ml-2"  onclick="comprobarName()"  value="{{$tarea->id}}">Añadir</button>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                  </div>

                                          </div>
                                      </div>
                                  </div>

                                  @if($tarea->estado==0)

                                 @endif
                              </div>

                          <div class="w-50">
                              <form action="{{route('endTarea')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idT" value="{{$tarea->id}}">
                                  <button  class="btn  ml-1 btn-danger">finalizar</button>

                              </form>

                          </div>


                      </div>


                  </div>
              </div>



            @else
          <div class="accordion-item tstyle   rounded" style="background: lightgreen" id="tarea{{$tarea->id}}">
          <h2 class="accordion-header" >
              <button class=" text-center accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#t{{$tarea->id}}" aria-expanded="false" aria-controls="t{{$tarea->id}}">
                  <p class=" text-uppercase">{{$tarea->titulo}}</p>
              </button>
          </h2>
          <div id="t{{$tarea->id}}" class="accordion-collapse  rounded collapse" aria-labelledby="tarea{{$tarea->id}}" data-bs-parent="#contenedorTareas">
              <div class="accordion-body w-100 d-flex flex-wrap p-2">

                  <div class="w-50 d-flex flex-column align-items-start align-items-md-center">
                      @if($tarea->estado==0)
                          <div class="">
                              <p><strong>Estado</strong>:<strong class="text-success">En proceso</strong></p>
                          </div>

                      @else
                          <div class="">
                              <p class=><strong>Estado:</strong> <strong class="text-danger">Finalizada</strong></p>
                          </div>
                      @endif

                      <P class="mb-1"><strong>Fecha_inicio</strong> </P>
                      <span class="mt-0">{{$tarea->created_at}}</span>

                  </div>



                  <div class="w-50 d-flex align-items-center flex-column">
                      <p><strong>Autor:</strong>  {{$tarea->datosAutor['name']}}</p>
                      @if($tarea->estado==0)
                          <P><strong>Fecha_fin:</strong> <span>....</span></P>
                      @else
                          <P class="mb-1"><strong>Fecha_fin:</strong></P>
                          <span class="mt-0">{{$tarea->fecha_vencimiento}}</span>

                      @endif
                  </div>


                  <div class="w-100 mt-3 mb-3">
                      <div class="w-50 d-flex flex-column align-items-start align-items-md-center">

                      <P class="mb-1"><strong>Descripcion:</strong> </P>
                      <span class="mt-0 mb-4 border-dark rounded">{{$tarea->descripcion}}</span>
                      </div>

                  </div>


                  <div class="w-50 justify-content-center p-1">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#listapart{{$tarea->id}}">
                          Participantes
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="listapart{{$tarea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Lista de participantes de la tarea</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      @foreach($tarea->participantes as $participante)
                                          <ul>
                                              <li>{{$participante->name}}</li>
                                          </ul>
                                      @endforeach
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="w-50 d-flex justify-content-center p-1">
                      <!-- Button trigger modal -->
                      @if(auth()->user()->id==$tarea->datosAutor['id'])

                          <button type="button"  class="btn w-75 btn-dark d-none" data-toggle="modal" data-target="#modal{{$tarea->id}}">
                              Añadir
                          </button>

                      @endif

                  <!-- Modal -->
                      <div class="modal fade" id="modal{{$tarea->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Añadir participante a la tarea {{$tarea->id}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>



                                      <div class="modal-body">
                                          <!--FORMULARIO PARA LA CREACIÓN DE PROYECTOS-->
                                          <div class="form-group   d-flex">
                                              <input type="hidden" value="{{$tarea->id}}" name="idT">
                                              <input type="email" name="email" class="form-control"  placeholder="antonio@siwo.com">
                                              <button  class="btn btn-dark ml-2" onclick="comprobarName()"  value="Añadir"></button>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                      </div>

                              </div>
                          </div>
                      </div>

                      @if($tarea->estado==0)
                          <form action="{{route('endTarea')}}" method="POST">
                              @csrf
                              <input type="hidden" name="idT" value="{{$tarea->id}}">
                              <button  class="btn  ml-1 btn-danger">finalizar</button>

                          </form>
                      @endif
                  </div>


              </div>


          </div>
          </div>
           @endif

             @empty




          @endforelse



      </div>
      <div class="d-flex w-100 mb-4  mt-4 justify-content-end border-bottom border-dark">

          {{ $listatareas->links('pagination::bootstrap-4') }}

      </div>

  </main>

@endsection

