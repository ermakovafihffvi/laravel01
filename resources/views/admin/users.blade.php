@extends('layouts.admin')

@section('title', 'Юзеры')

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
        <h2>Пользователи</h2>
            @forelse($users as $user)
                <div class="card-body">
                    {{ $user->name }}
                    @if ($user->role)
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Снять
                            админа</a>
                    @else
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить
                            админа</a>
                    @endif
                </div>
                @empty
                    <p>Нет пользователей</p>
            @endforelse
    </div>
@endsection
