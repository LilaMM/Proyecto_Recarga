@extends('registros.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Registro</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('registros.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Player:</strong>
                {{ $registro->id_player }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Banco:</strong>
                {{ $registro->id_banco }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto:</strong>
                {{ $registro->monto }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comprobante:</strong>
                <img src="/image/{{ $registro->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection