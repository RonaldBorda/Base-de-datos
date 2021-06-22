@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administrar partidos</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#modalAgregar">
        <i class="fas fa-user fa-sm text-white-50"></i> Agregar partido
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
                <td>Fecha</td>
                <td>Hora</td>
                <td>Pais A</td>
                <td>Pais B</td>
                <td>Puntuación A</td>
                <td>Puntuación B</td>
                <td>Bandera A</td>
                <td>Bandera B</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach($partidos as $partido)
            <tr>
                <td>{{$partido->id}}</td>
                <td>{{$partido->fecha}}</td>
                <td>{{$partido->hora}}</td>
                <td>{{$partido->paisA}}</td>
                <td>{{$partido->paisB}}</td>
                <td>{{$partido->puntuacionA}}</td>
                <td>{{$partido->puntuacionB}}</td>
                <td>{{$partido->banderaA}}</td>
                <td>{{$partido->banderaB}}</td>
                <td>

                    <button class="btn btn-round btnEditar" 
                        data-id="{{$partido->id}}" 
                        data-fecha="{{$partido->fecha}}"
                        data-hora="{{$partido->hora}}"
                        data-paisA="{{$partido->paisA}}"
                        data-paisB="{{$partido->paisB}}"
                        data-puntuacionA="{{$partido->puntuacionA}}"
                        data-puntuacionB="{{$partido->puntuacionB}}"
                        data-banderaA="{{$partido->banderaA}}"
                        data-banderaB="{{$partido->banderaB}}"
                        



                        data-toggle="modal" data-target="#modalEditar">
                        <i class="fa fa-edit"></i>
                    </button>

                    <button class="btn btn-round btnEliminar" data-id="{{$partido->id}}" data-toggle="modal"
                        data-target="#modalEliminar">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form action="{{url('/admin/admPartido',['id'=>$partido->id])}}" method="POST" id="formEli_{{$partido->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$partido->id}}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal agregar-->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar partido</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/admPartido" method="POST">
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
                        <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">
                    </div>
                    <div class="form-group">
                        <input type="time" class="form-control" name="hora" value="{{ old('hora') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="paisA" placeholder="Pais A"
                            value="{{ old('paisA') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="paisB" placeholder="Pais B"
                            value="{{ old('paisB') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="puntuacionA" placeholder="Puntuación A"
                            value="{{ old('puntuacionA') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="puntuacionB" placeholder="Puntuación B"
                            value="{{ old('puntuacionB') }}">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imgPaisA" value="{{ old('imgPaisA') }}">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imgPaisB" value="{{ old('imgPaisB') }}">
                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Elimiar partido</h5>
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

<!-- Modal editar-->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar partido</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/admPartido/edit" method="POST">
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
                    <input type="hidden" name="id" id="idEdit">
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" id="fechaEdit">
                    </div>
                    <div class="form-group">
                        <input type="time" class="form-control" name="hora" value="{{ old('hora') }}" id="horaEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="paisA" placeholder="Pais A"
                            value="{{ old('paisA') }}" id="paisAEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="paisB" placeholder="Pais B"
                            value="{{ old('paisB') }}" id="paisBEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="puntuacionA" placeholder="Puntuación A"
                            value="{{ old('puntuacionA') }}" id="puntuacionAEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="puntuacionB" placeholder="Puntuación B"
                            value="{{ old('puntuacionB') }}" id="puntuacionBEdit">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imgPaisA" value="{{ old('imgPaisA') }}" id="imgPaisAEdit">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imgPaisB" value="{{ old('imgPaisB') }}" id="imgPaisBEdit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var idEliminar=0;
    $(document).ready(function () {
        @if($message = Session::get('ErrorInsert'))
            $("#modalAgregar").modal('show');
        @endif
        $(".btnEliminar").click(function(){
            idEliminar=$(this).data('id');
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });
        $(".btnEditar").click(function(){
            $("#idEdit").val($(this).data('id'));
            $("#fechaEdit").val($(this).data('fecha'));
            $("#horaEdit").val($(this).data('hora'));
            $("#paisAEdit").val($(this).data('paisa'));
            $("#paisBEdit").val($(this).data('paisb'));
            $("#puntuacionAEdit").val($(this).data('puntuaciona'));
            $("#puntuacionBEdit").val($(this).data('puntuacionb'));
            $("#imgPaisAEdit").val($(this).data('banderaa'));
            $("#imgPaisBEdit").val($(this).data('banderab'));
        });
    });
</script>
@endsection
