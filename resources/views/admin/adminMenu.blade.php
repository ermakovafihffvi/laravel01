
<div class="left_menu_box">
    <ul class="left_menu">
        <li><a href="{{ route('admin.index') }}">Главная для админа</a></li>
        <li><a href="{{ route('admin.news.show') }}">Посмотреть/отредактировать все новости</a></li>
        <li><a href="{{ route('admin.news.create') }}">Добавить новость</a></li>
        <li><a href="{{ route('admin.categories.show') }}" name="addcategories">Посмотреть/редактировать категории</a></li>
        <li><a href="{{ route('admin.categories.create') }}">Добавить категорию</a></li>
        <li><a href="{{ route('admin.updateUsers') }}">CRUD юзеров</a></li>
        <li><a href="{{ route('admin.parserIndex') }}">Парсер новостей</a></li>
    </ul>
</div>
