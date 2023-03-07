@extends('layouts.main')
@section('title', 'Welcome')
@section('content')
@foreach ($teste as $item)
    <p>{{var_dump($item)}}</p>
@endforeach
@endsection