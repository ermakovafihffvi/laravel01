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
    <h2>Добавить ссылку</h2>
    <form  method="POST" 
            action="{{ route('admin.parserStore') }}" 
            enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="url" class="form-control" placeholder="Link" aria-label="Link" 
                        value="{{ old('url') }}">
                @if ($errors->has('url'))
                    @foreach($errors->get('url') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary" value="Добавить">Добавить</button>
    </form>
</div>

@endsection