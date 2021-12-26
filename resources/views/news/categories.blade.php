@extends('layouts.main')

@section('title', 'Категории')

@section('auth')
    @include('auth')
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category->slug) }}"><h2>{{ $category->title }}</h2></a>
    @empty
        Нет категорий
    @endforelse
@endsection