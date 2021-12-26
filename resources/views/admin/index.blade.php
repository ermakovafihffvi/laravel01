@extends('layouts.admin')

@section('title')
    @parent Главная
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
    <h2>Страница администратора</h2>
    <p>Добро пожаловать на страницу администратора!</p>
</div>

@endsection