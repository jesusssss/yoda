@extends('layout.main')
@section('content')

    @foreach($content as $c)
        {{ $c['content'] }}
    @endforeach

@stop