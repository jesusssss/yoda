@extends('admin.layout.main')

@section('title')
    Pages
@stop

@section('content')

<form action="{{ URL::route('admin-page-edit') }}" method="post">
    @foreach($data as $d)
    <label for="pagename">
        Name
    </label><br/>
    <input id="pagename" name="pagename" type="text" value="{{ $d->getName() }}" /><br/><br/>

    <label for="pageactive">Active</label>
    <input type="hidden" name="pageactive" value="0"/>
    <input type="checkbox" name="pageactive" @if($d->getActive() == 1) checked="checked" @endif value="1"/><br/><br/>

    <label for="pagecontent">Content</label><br/>
    <textarea name="pagecontent" id="pagecontent" cols="30" rows="10">
        {{ $d->getContent() }}
    </textarea>
    @endforeach
    <input type="submit" value="Update page"/>
    {{ Form::token() }}
</form>

@stop