@extends('layouts.admin')

@section('content')
    <h1>Bienvendido {{ Auth::user()->name }}</h1>

@endsection