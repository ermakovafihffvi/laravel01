@extends('layouts.admin')

@section('title')
    @parent @if ($news->id) Изменить @else Добавить @endif
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
<?//dump($errors)?>
<div class="main_cnt">
    <h2>@if ($news->id) Изменить @else Добавить @endif новость</h2>
    <form  method="POST" 
            action="@if ($news->id){{ route('admin.news.update', $news) }}@else{{ route('admin.news.store') }}@endif" 
            enctype="multipart/form-data">
        @csrf
        @if ($news->id) @method('PUT') @endif
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="author" class="form-control" placeholder="Author" aria-label="Author" 
                        value="{{ old('author') ?? $news->author }}">
                @if ($errors->has('author'))
                    @foreach($errors->get('author') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
            </div>
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" 
                        value="{{ old('title') ?? $news->title }}">
                @if ($errors->has('title'))
                    @foreach($errors->get('title') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
            </div>
            <!--<div class="col">
                <input type="date" class="form-control" placeholder="date" aria-label="date" min="2021-11-06" max="2021-11-06">
            </div>-->
        </div>
        <div class="row mb-3">
            <div class="col">
                @if ($errors->has('category_id'))
                    @foreach($errors->get('category_id') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
                <select name="category_id" class="form-select" aria-label="Category">
                    <option selected>Category</option>
                    @foreach($categories as $item)
                        @if (old('category_id'))
                            <option
                                @if ($item->id == old('category_id')) selected @endif
                            value="{{ $item->id }}" > {{ $item->title }}
                            </option>
                        @else
                            <option
                                @if ($item->id == $news->category_id) selected @endif
                            value="{{ $item->id }}" > {{ $item->title }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    @if ($errors->has('isPrivate'))
                        @foreach($errors->get('isPrivate') as $error)
                            <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                        @endforeach
                    @endif
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" 
                        @if ($news->isPrivate == 1 || old('isPrivate')) checked @endif
                        name="isPrivate" value="1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Доступ по подписке?</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                @if ($errors->has('text'))
                    @foreach($errors->get('text') as $error)
                        <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                    @endforeach
                @endif
                <div class="form-floating">
                    <textarea style="height: 300px" wrap="soft"  name="text"  class="form-control" id="floatingTextarea2" aria-label="text">
                        {{ old('text') ?? $news->text}}
                    </textarea>
                    <label for="floatingTextarea2">Text... </label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <input type="file" name="image" value="{{ old('image') ?? $news->image }}">
                    @if ($errors->has('image'))
                        @foreach($errors->get('image') as $error)
                            <p style="color: red; font-size: 1em; line-height: 2em; margin-bottom: 0;">**{{ $error }}**</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" value="@if ($news->id){{__('admin.edit')}}@else{{__('admin.add')}}@endif новость"></button>
    </form>
</div>

@endsection