@extends('layout.main')
@section('content')

@if(isset($content))
    @foreach($content as $c)
        {{ $c['content'] }}
    @endforeach
@endif


@stop