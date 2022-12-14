@extends('layouts.app')

@section('title', "Editar Usuário {$user->name}")

@section('content')

<h1>Editar Usuário {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error"> {{ $error }}></li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user->id) }}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="name" placeholder="Nome:" value="{{$user->name}}">
    <input type="email" name="email" placeholder="E-mail:"value="{{$user->email}}">
    <input type="int" name="cpf" placeholder="CPF:999.999.999-99"value="{{$user->cpf}}">
    <input type="password" name="password" placeholder="Senha:">
    <button type="submit">
        Enviar
@endsection
