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
    @forelse($categories as $item)
        <?dump($errors)?>
        <div class="category_item_admin" id="{{$item->id}}">
            <a href="{{ route('news.category.show', $item->slug) }}" class="item_title">
                <h2>{{ $item->title }}</h2>
            </a>
            <form class="update_box category_up_box" action="{{ route('admin.categories.destroy', $item) }}" method="post">
                <h4>Удалить категорию</h4>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">delete
                </button>
            </form>
            <form  method="POST" 
                action="{{ route('admin.categories.update', $item) }}" 
                enctype="multipart/form-data">
                <h4>Изменить название категории</h4>
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="title" class="form-control" 
                        placeholder="Title" aria-label="Title" 
                        value="{{ $item->title }}">
                        @if ($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col">
                        <input type="text" name="slug" class="form-control" 
                        placeholder="Slug" aria-label="Title" 
                        value="{{ $item->slug }}">
                    </div>
                    <input type="hidden" name="id" value="{{$item->id}}">
                </div>
                <button type="submit" class="btn btn-primary">Изменить категорию</button>
            </form>
        </div>
    @empty
        <p>Нет категорий</p>
    @endforelse
</div>

@endsection
