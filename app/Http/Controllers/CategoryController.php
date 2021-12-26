<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;
use App\Models\Preview;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {

        $categories = Categories::all();
        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function show($slug) {

        $category_id = Categories::query()->where('slug', $slug)->value('id');
        $category_title = Categories::query()->where('slug', $slug)->value('title');

        $news = News::query()->where('category_id', $category_id)->paginate(4);
        //dd($news);

        $preview = new Preview($news); 
        $preview_texts = $preview->makePTexts();

        return view('news.category', [
            'category' => $category_title,
            'news' => $news,
            'p_texts' => $preview_texts
        ]);
    }
}
