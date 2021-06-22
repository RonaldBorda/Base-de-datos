@extends('layouts.layout')
@section('content')
@section('title','Qatar 2022')
    <main>
        <section class="container">
            <h3>Sudamerica Partidos</h3>
            
            @foreach($partidos as $partido)
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th colspan="3">Fecha: {{$partido->fecha}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;" rowspan="2">
                            {{$partido->hora}} Hora local<br><br>
                                <img src="{{asset('images/ELIMINATORIAS.png')}}" width="180px" alt="">
                        </td>
                        <td style="text-align: center;" colspan="2">Final del partido</td>
                    </tr>
                    <tr>
                        <td style="font-size:25px; text-align:center;" width="900px" height="100" rowspan="2">{{$partido->paisA}} {{$partido->puntuacionA}}-{{$partido->puntuacionB}} {{$partido->paisB}}</td>
                    </tr>
                </tbody>
            </table><br>
            @endforeach

        </section>
    </main>
@endsection
   





