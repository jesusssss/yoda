@extends('admin.layout.main')

@section('title')
    Settings
@stop

@section('content')

<table class="table table-striped">
    <thead>
    <tr>
        <th>
            Username
        </th>
        <th>
            Delete
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr data-pageid="{{ $user->getId() }}">
        <td>
            {{ $user->getUsername() }}
        </td>
        <td>
            {{ HTML::image('img/admin/deleteIcon.png', "Delete", array('class' => 'ajaxEdit', 'data-pageid' => $user->getId(), 'data-postto' => URL::route('admin-user-delete'))) }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<form action="{{ URL::route('admin-user-create') }}" method="post">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Username
            </th>
            <th>
                Password
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input type="text" name="username"/>
            </td>
            <td>
                <input type="password" name="password"/>
            </td>
        </tr>
        </tbody>
    </table>
    <input type="submit" class="submit" value="Create User"/>
    {{ Form::token() }}
</form>


@stop