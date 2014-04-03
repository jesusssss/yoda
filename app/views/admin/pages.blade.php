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
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="all">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Name <span class="small">(Page title)</span>
                    </th>
                    <th>
                        Active <span class="small">(Display in menu)</span>
                    </th>
                    <th>
                        Order <span class="small">(Hold and drag)</span>
                    </th>
                    <th>
                        Edit/Delete <span class="small">(Edit or delete page)</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $d)
                <tr data-pageid="{{ $d->getId() }}" class="pageSelector">
                    <td>
                        <input type="text" class="ajaxEdit" data-pageid="{{ $d->getId() }}" data-postto="{{ URL::route('admin-page-edit') }}" name="pageName" value="{{ $d->getName() }}"/>
                    </td>
                    <td>
                        <select class="ajaxEdit" data-pageid="{{ $d->getId() }}" data-postto="{{ URL::route('admin-page-edit') }}" name="" id="">

                            <option value="1" @if($d->getActive() == 1)) selected="selected" @endif>
                                Yes
                            </option>
                            <option value="0" @if($d->getActive() == 0)) selected="selected" @endif>
                                No
                            </option>

                        </select>
                    </td>
                    <td>
                        {{ $d->getSort() }}
                    </td>
                    <td>
                        {{ HTML::image('img/admin/editIcon.png', "Edit", array('class' => 'ckedit', 'data-pagename' => $d->getName())) }}
                        /
                        {{ HTML::image('img/admin/deleteIcon.png', "Delete", array('data-postto' => URL::route('admin-page-delete'), 'class' => 'ajaxEdit', 'data-pageid' => $d->getId())) }}
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
                            <input type="checkbox" checked="checked" name="pageactive" value="1"/>
                        </td>
                    </tr>
                </tbody>
             </table>
            <input type="submit" class="submit" value="Create page"/>
            {{ Form::token() }}
        </form>
    </div>
    <div id="stuff">
        {{ HTML::script("js/ckeditor/ckeditor.js") }}
        <textarea name="ck" id="ck" style="display: none;"></textarea>
        <script>
            $(function() {
                $(".ckedit").click(function() {
                    if(!CKEDITOR.instances.ck) {
                        CKEDITOR.replace("ck");
                    }
                    var pagename = $(this).data("pagename");
                    ajaxGet(pagename, '{{ URL::route('admin-page-get-content') }}');

                    function ajaxGet(name, postto) {
                        var result = "";
                        var data = {
                            name: name
                        }
                        $.ajax({
                            url: postto,
                            data: data,
                            type: 'POST'
                        }).done(function(data) {
                            CKEDITOR.instances.ck.setData(data[0].content);
                        });
                    }
                });
            });
        </script>
    </div>
</div>
@stop