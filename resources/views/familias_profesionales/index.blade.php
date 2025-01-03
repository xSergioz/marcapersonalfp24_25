@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ($familiasProfesionales as $familiaProfesional)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>
            <header>
                <h3><strong>Nombre</strong> {{ $familiaProfesional->nombre }}</h3>
            </header>
            <ul>
                <li>Código: {{ $familiaProfesional->codigo }}</li>
            </ul>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\FamiliaProfesionalController::class, 'getShow'], ['id' => $familiaProfesional->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
