@extends('layouts.main')

@section('title', 'Новости')

@section('auth')
    @include('auth')
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Новости</h2>
    <?//dd($news);?>
    <div class="news_list">
        @forelse($news as $item)
        <div class="list_item">
            <div class="item-back-1"></div>
            <div class="item-back-2"></div>
            <a href="{{ route('news.detail', $item->id) }}" class="item">
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
        </div>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
    {{$news->links('vendor.pagination.my_pagination')}}
@endsection