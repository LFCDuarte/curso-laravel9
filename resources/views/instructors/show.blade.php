@extends('layouts.app')

@section('title', 'Listagem do Professor')

@section('content')

<h1>Listagem do Professor {{$instructor->name}}</h1>

<ul>
        
    <li> {{$instructor->name}} </li>
    <li> {{$instructor->email}} </li>
    <li> {{$instructor->created_at}}</li>

</ul>

<form action="{{ route('instructors.delete', $instructor->id)}}" method="POST">
    @method('DELETE')
    @csrf  
    <button type= "submit"> Deletar</button>

</form>

@endsection
