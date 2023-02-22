@extends('layouts.main')
@php
 $titulopadrao = 'Lista Produtos';   
@endphp

@section('title', $titulopadrao)
@section('content')
    <h2>{{$titulopadrao}}</h2>
@endsection