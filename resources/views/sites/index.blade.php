@extends('layouts.app')

@section('content')

    <div>
        <a href="/sites/create" class="btn btn-primary">Добавить сайт</a>
    </div>
    <br>
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr class="table-header">
            <td>Название</td>
            <td>Ссылка</td>
            <td class="table-centred">Редактировать</td>
            <td class="table-centred">Удалить</td>
        </tr>
        </thead>
        <tbody>
        @foreach($sites as $site)
            <tr>
                <td>{{ $site->name}}</td>
                <td>{{ $site->url }}</td>
                <td class="text-center">
                    <a href="/sites/{{ $site->id }}/edit" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <form action="/sites/{{ $site->id }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" role="button" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </td>
                {{--<td class="text-center">
                    {{ Form::open(array('url' => '/admin/tags/' . $tag->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<i class="fa fa-times"></i>', ['class' => 'btn btn-danger btn-xs', 'role' => 'button', 'type' => 'submit']) }}
                    {{ Form::close() }}
                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection