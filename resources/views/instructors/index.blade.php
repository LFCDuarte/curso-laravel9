@extends('layouts.app')

@section('title', 'Listagem dos Professores')

@section('content')

<h1>
    Listagem dos Professor
    (<a href="{{route ('instructors.create')}}">+</a>)
</h1>

<form action="{{ route ('instructors.index') }}" method="get">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>

</form>

<ul>
    @foreach ($instructors as $instructor)
        <li>
            {{$instructor->name}} - 
            {{$instructor->email}} 
            |<a href="{{ route('instructors.edit', $instructor->id)}}">Editar</a>
            |<a href="{{ route('instructors.show', $instructor->id)}}">Detalhes</a>
        </li>
    @endforeach
</ul>
    
@endsection