<h1>LIstado de Puntos de Intereses</h1>
<a href="#">Agregar Punto de Interes</a>
<ul>
    @foreach($interes as $interesT)
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