@extends('registros.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Registro</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('registros.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>!</strong> Hay algunos inconvenientes con los datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('registros.update',$registro->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id Player:</strong>
                    <input type="text" name="id_player" value="{{ $registro->id_player }}" class="form-control" placeholder="Id Player">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Banco:</strong>
                    <select class="form-control"  name="id_banco" id="id_banco">
                        <option selected>Selecciona Banco</option>            
                        @foreach ($bancos as $b)
                        <option value="{{$b->id}}" {{ $b->id == $registro->id_banco ? 'selected' : '' }}>{{ $b->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Motivo de la edicion:</strong>
                    <select class="form-control" name="id_razon_modificacion" id="id_razon_modificacion">
                        @foreach ($motivos as $m)
                        <option value="{{$m->id}}" {{ $m->id == $registro->id_razon_modificacion ? 'selected' : '' }}>{{ $m->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Monto:</strong>
                    <input type="number" name="monto" value="{{ $registro->monto }}" class="form-control" placeholder="Monto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comprobante:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Comprobante">
                    <img src="/image/{{ $registro->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
     
    </form>
@endsection