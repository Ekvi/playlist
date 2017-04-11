@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Обновить категорию</h2>
                </div>
                <div class="panel-body">
                    <form method="post" action="/categories/{{ $category->id }}" class="clearfix">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="название" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="url">Ссылка</label>
                            <input type="text" class="form-control" name="url" id="url"  placeholder="ссылка" value="{{ $category->url }}">
                        </div>
                        <input type="hidden" name="site_id" value="{{ $category->site_id }}">
                        <button type="submit" class="btn btn-primary pull-right">Обновить</button>
                    </form>
                </div>
                <div class="panel-footer">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection