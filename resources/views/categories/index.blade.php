@extends('layouts.app')

@section('content')

    <div>
        <a href="/categories/create/{{ $site_id }}" class="btn btn-primary">Добавить категорию</a>
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
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name}}</td>
                <td>{{ $category->url }}</td>
                <td class="text-center">
                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <form action="/categories/{{ $category->id }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" role="button" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection