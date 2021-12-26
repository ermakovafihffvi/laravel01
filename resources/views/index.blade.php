@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('auth')
    @include('auth')
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h2>Главная</h2>
<p>Добро пожаловать!</p>
@endsection

<?// if($errors): dd($errors);?>
        <!--<div style="position: absolute; top:30%; right:20%;"> <p>{{}}</p></div>-->
<?//endif;?>