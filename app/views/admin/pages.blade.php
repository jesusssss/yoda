@extends('admin.layout.main')

@section('title')
    Pages
@stop

@section('content')

<ul class="nav nav-tabs">
    <li class="active">
        <a href="#all" data-toggle="tab">All pages</a>
    </li>
    <li>
        <a href="#create" data-toggle="tab">Create page</a>
    </li>
    <li>
        <a href="#sort" data-toggle="tab">Sort pages</a>
    </li>
    <li style="visibility: hidden;">
        <a href="#edit" data-toggle="tab">Edit page</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="all">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Active
                    </th>
                    <th>
                        Order
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $d)
                <tr data-pageid="{{ $d->getId() }}" class="pageSelector">
                    <td>
                        {{ $d->getName() }}
                    </td>
                    <td>
                        {{ $d->getActive() }}
                    </td>
                    <td>
                        {{ $d->getSort() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="create">
        <form action="{{ URL::route('admin-page-create') }}" method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Active
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="pagename"/>
                        </td>
                        <td>
                            <input type="hidden" name="pageactive" value="0"/>
                            <input type="checkbox" name="pageactive" value="1"/>
                        </td>
                    </tr>
                </tbody>
             </table>
            <input type="submit" class="submit" value="Create page"/>
            {{ Form::token() }}
        </form>
    </div>
    <div class="tab-pane fade" id="sort">
        Sort pages
    </div>
</div>
@stop