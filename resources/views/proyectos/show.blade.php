@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Estudiante: </strong>{{ $reconocimiento['estudiante_id'] }}</h3>
            <h4><strong>Actividad: </strong>
                {{$reconocimiento['actividad_id']}}
            </h4>
            <h4><strong>Documento: </strong>{{ $reconocimiento['documento'] }}</h4>
            <p><strong>Fecha: </strong>
                <ul>
                    @foreach ($reconocimiento['fecha'] as $indice => $metadato)
                    <li>{{ $indice }}: {{ $metadato }}</li>
                    @endforeach
                    </ul>
            </p>
            <p><strong>Docente: </strong>
                {{ $reconocimiento['docente_validador']}}
            </p>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Reconocimiento
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}">
                Volver al listado de Reconocimientos
            </a>


        </div>
    </div>

@endsection
