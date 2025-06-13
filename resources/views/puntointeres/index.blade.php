<h1>Listado de Puntos de Intereses</h1>
<a href="{{ route('puntos.create') }}">Agregar Punto de Interes</a>
<ul>
    @foreach($puntos as $interesT)
        <li>
            {{$interesT->nombre}}
            {{$interesT->descripcion}}
            {{$interesT->categoria}}
            {{$interesT->imagen}}
            {{$interesT->latitud}}
            {{$interesT->longitud}}
        </li>
    @endforeach
</ul>