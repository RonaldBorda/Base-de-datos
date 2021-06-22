@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administrar jugadores</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#modalJugadorAgregar">
        <i class="fas fa-user fa-sm text-white-50"></i> Agregar jugadores
    </a>
</div>

<div class="row">
    @if($message=Session::get('Listo'))
    <div class="col-12 alert alert-success alert-dismissable face show" role="alert">
        <h5>Resultado:</h5>
        <span>{{ $message }}</span>
    </div>
    @endif
    <table class="table col-12 table-responsive">
        <thead>
            <tr>
                <td>ID</td>
                <td>Pais</td>
                <td style="text-align: center">Jugador 1</td>
                <td style="text-align: center">Jugador 2</td>
                <td style="text-align: center">Jugador 3</td>
                <td style="text-align: center">Jugador 4</td>
                <td style="text-align: center">Jugador 5</td>
                <td style="text-align: center">Jugador 6</td>
                <td style="text-align: center">Jugador 7</td>
                <td style="text-align: center">Jugador 8</td>
                <td style="text-align: center">Jugador 9</td>
                <td style="text-align: center">Jugador 10</td>
                <td style="text-align: center">Jugador 11</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $jugadore)
            <tr>
                <td>{{$jugadore->id}}</td>
                <td>{{$jugadore->pais}}</td>
                <td>{{$jugadore->nombre1}}</td>
                <td>{{$jugadore->nombre2}}</td>
                <td>{{$jugadore->nombre3}}</td>
                <td>{{$jugadore->nombre4}}</td>
                <td>{{$jugadore->nombre5}}</td>
                <td>{{$jugadore->nombre6}}</td>
                <td>{{$jugadore->nombre7}}</td>
                <td>{{$jugadore->nombre8}}</td>
                <td>{{$jugadore->nombre9}}</td>
                <td>{{$jugadore->nombre10}}</td>
                <td>{{$jugadore->nombre11}}</td>
                <td>
                    <button class="btn btn-round btnEliminar" data-id="{{$jugadore->id}}" data-toggle="modal"
                        data-target="#modalEliminar">
                        <i class="fa fa-trash"></i>
                    </button>

                    <button class="btn btn-round btnEditarj" data-id="{{$jugadore->id}}" data-toggle="modal"
                        data-target="#modalEditarj">
                        <i class="fa fa-edit"></i>
                    </button>

                    <form action="{{url('/admin/admJugadores',['id'=>$jugadore->id])}}" method="POST"
                        id="formEli_{{$jugadore->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$jugadore->id}}">
                        <input type="hidden" name="_method" value="delete">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Agregar-->
<div class="modal fade" id="modalJugadorAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar partido</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/admJugadores" method="POST">
                @csrf
                <div class="modal-body">
                    @if($message=Session::get('ErrorInsert'))
                    <div class="col-12 alert alert-danger alert-dismissable face show" role="alert">
                        <h5>Advertencia:</h5>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais" placeholder="Pais"
                            value="{{ old('pais') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre1" placeholder="Jugador 1"
                            value="{{ old('nombre1') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre2" placeholder="Jugador 2"
                            value="{{ old('nombre2') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre3" placeholder="Jugador 3"
                            value="{{ old('nombre3') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre4" placeholder="Jugador 4"
                            value="{{ old('nombre4') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre5" placeholder="Jugador 5"
                            value="{{ old('nombre5') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre6" placeholder="Jugador 6"
                            value="{{ old('nombre6') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre7" placeholder="Jugador 7"
                            value="{{ old('nombre7') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre8" placeholder="Jugador 8"
                            value="{{ old('nombre8') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre9" placeholder="Jugador 9"
                            value="{{ old('nombre9') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre10" placeholder="Jugador 10"
                            value="{{ old('nombre10') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre11" placeholder="Jugador 11"
                            value="{{ old('nombre11') }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modalEditarj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar equipo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/admJugadores" method="POST">
                @csrf
                <div class="modal-body">
                    @if($message=Session::get('ErrorInsert'))
                    <div class="col-12 alert alert-danger alert-dismissable face show" role="alert">
                        <h5>Advertencia:</h5>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais" placeholder="Pais"
                            value="{{ old('pais') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre1" placeholder="Jugador 1"
                            value="{{ old('nombre1') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre2" placeholder="Jugador 2"
                            value="{{ old('nombre2') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre3" placeholder="Jugador 3"
                            value="{{ old('nombre3') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre4" placeholder="Jugador 4"
                            value="{{ old('nombre4') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre5" placeholder="Jugador 5"
                            value="{{ old('nombre5') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre6" placeholder="Jugador 6"
                            value="{{ old('nombre6') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre7" placeholder="Jugador 7"
                            value="{{ old('nombre7') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre8" placeholder="Jugador 8"
                            value="{{ old('nombre8') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre9" placeholder="Jugador 9"
                            value="{{ old('nombre9') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre10" placeholder="Jugador 10"
                            value="{{ old('nombre10') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre11" placeholder="Jugador 11"
                            value="{{ old('nombre11') }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elimiar equipo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
                <div class="modal-body">
                    <h5>¿Desea eliminar el registro de partido seleccionado?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
          
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    var idEliminar = 0;
    $(document).ready(function () {
        @if($message = Session::get('ErrorInsert'))
        $("#modalJugadorAgregar").modal('show');
        @endif
        $(".btnEliminar").click(function(){
            idEliminar=$(this).data('id');
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });
    });

</script>
@endsection
