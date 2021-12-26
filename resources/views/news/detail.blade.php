@extends('layouts.main')

@section('title', 'Новость')

@section('auth')
    @include('auth')
@endsection

@section('menu')
    @include('menu')
@endsection

<?  use Illuminate\Support\Facades\Auth; ?>

@section('content')
    @if ($newsItem)
        <div class="newsItem" style="
                            box-shadow: 0 0 10px rgb(215 61 108 / 98%);
                            padding: 20px;
                            border-radius: 20px;
        ">
            <h2>{{ $newsItem->title}}</h2>
            @if (!$newsItem->isPrivate OR Auth::user() )
                <p>{{ $newsItem->text}}</p>
            @else
                Зарегистрируйтесь для просмотра
            @endif
        </div>
    @else
        Нет новости с таким id
    @endif
@endsection