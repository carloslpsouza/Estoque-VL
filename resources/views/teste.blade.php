@extends('layouts.main')
@section('title', 'Welcome')
@section('content')
@foreach ($teste as $item)
    <p>{{dd($teste)}}</p>
@endforeach
@endsection