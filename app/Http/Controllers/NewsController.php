<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Preview;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index(/*News $news, Preview $preview_texts*/)
    {
        //$news = DB::table('news')->get();
        $news = News::paginate(4);
        $preview = new Preview($news); 
        $preview_texts = $preview->makePTexts();
        return view('news.news_list', [
            'news' => $news,
            'p_texts' => $preview_texts
        ]);
    }

    public function show_detail(/*News $newsItem,*/ $id)
    {
        //return view('news.detail')->with('newsItem', $newsItem->getNewsById($id));
        //$newsItem = DB::table('news')->find($id); //getOne($id)
        $newsItem = News::query()->find($id);

        return view('news.detail')->with('newsItem', $newsItem);
    }
}
