@extends('layouts.admin')

@section('title')
    @parent Добавить категорию
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
    <form  method="POST" 
            action="{{ route('admin.categories.store')}}" 
            enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Slug" value="{{ old('slug') }}">
                @if ($errors->has('slug'))
                    @foreach($errors->get('slug') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
            </div>
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    @foreach($errors->get('title') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary addCat" value="Добавить категорию">Добавить категорию</button>
    </form>
</div>
@endsection