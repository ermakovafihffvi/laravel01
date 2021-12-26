<!--<a href="{{ route('root') }}">Главная</a>
<a href="{{ route('news.news_list') }}">Новости</a>
<a href="{{ route('news.category.index') }}">Категории</a>
<a href="{{ route('about') }}">О нас</a>
<a href="{{ route('admin.index') }}">Админка</a><br>-->

<?use App\Models\Categories;
  use Illuminate\Support\Facades\Auth;
  /*$categories = new Categories;
  $categories = $categories->getCategories();*/
  $categories = Categories::all();
  $user = Auth::user();
  $u_role = $user ? $user->role : 0;
?>

<div class="menu_box">
<nav class="menu">
  <ul>
    <li class="menu-item"><a href="{{ route('root') }}">Главная</a></li>
    <li class="menu-item"><a href="{{ route('about') }}">О нас</a></li>
    <li class="menu-item">
      <a href="{{ route('news.news_list') }}">Новости</a>
      <?if($categories):?>
      <ul class="sub-menu">
        <?foreach($categories as $category):?>
        <li class="menu-item">
          <a href="{{ route('news.category.show', $category->slug) }}">
            <?=$category->title?>
          </a>
        </li>
        <?endforeach;?>
      </ul>
      <?endif;?>
    </li>
    <?if($u_role):?>
      <li class="menu-item"><a href="{{ route('admin.index') }}">Админка</a></li>
    <?endif;?>
  </ul>
</nav>
</div>


