@extends('layout.main')

@section('content')


<form action="{{ URL::route('account-create-post') }}" method="post" {{ (Input::old('email')) ? 'value="'.e(Input::old('email')).'"' : '' }} >
    Email: <input type="text" name="email" />
    @if($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br/>
    Username: <input type="text" name="username"/>
    @if($errors->has('username'))
        {{ $errors->first('username') }}
    @endif
    <br/>
    Password: <input type="password" name="password"/>
    @if($errors->has('password'))
        {{ $errors->first('password') }}
    @endif
    <br/>
    Password again: <input type="password" name="password_again"/>
    @if($errors->has('password_again'))
        {{ $errors->first('password_again') }}
    @endif
<br/><br/>

    <input type="submit" value="Create account"/>
    {{ Form::token() }}
</form>

@stop