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
    <div class="news_list news_list_admin">
        @forelse($news as $item)
        <div class="list_item_admin">
            <!--<div class="item-back-1"></div>
            <div class="item-back-2"></div>-->
            <a href="{{ route('news.detail', $item->id) }}" class="item item_admin">
                <div class="img">
                    <img src="/storage/img/{{ $item->image }}" alt="noimg">
                </div>
                <div class="item-desc-block">
                    <h4>{{ $item->title }}</h4>
                    <p class="item-desc">
                        {{ $p_texts[$item->id] }}
                    </p>
                </div>
            </a>
            <form class="update_box" action="{{ route('admin.news.destroy', $item) }}" method="post">
                <a class="btn btn-success" href="{{ route('admin.news.edit', $item) }}">edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">delete
                </button>
            </form>
        </div>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
    {{$news->links('vendor.pagination.my_pagination')}}
</div>
@endsection