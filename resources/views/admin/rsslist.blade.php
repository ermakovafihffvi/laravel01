@extends('layouts.admin')

@section('title')
    @parent Добавить
@endsection

@section('auth')
    @include('auth')
@endsection

@section('menu')
    @include('menu')
@endsection

@section('adminMenu')
    @include('admin.adminMenu')
@endsection

@section('content')
<div class="main_cnt">
    <div class="">
        <a href="{{ route('admin.parser') }}">Начать парсинг</a>
        @forelse($rsslist as $item)
        <div class="">
            <p class="item-desc">
                {{ $item->url }}
            </p>
            <form class="update_box" action="{{ route('admin.parserDestroy', $item) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">delete
                </button>
            </form>
        </div>
        @empty
            <p>Нет ссылок для парсинга</p>
        @endforelse
        <a href="{{ route('admin.parserCreate') }}">Добавить ссылку для парсинга</a>
    </div>
</div>
@endsection