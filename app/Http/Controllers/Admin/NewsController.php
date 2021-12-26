<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;
use App\Models\Preview;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function index() {
        $news = News::paginate(4);
        $preview = new Preview($news); 
        $preview_texts = $preview->makePTexts();
        return view('admin.showAll', [
            'news' => $news,
            'p_texts' => $preview_texts
        ]);
    }

    public function create(News $news) {

        return view('admin.addNews',[
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function store(NewsRequest $request, News $news) {
        $request->validated();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }

        $news->fill($request->all())->save();


        return redirect()->route('admin.news.show')->with('success', 'Новость добавлена');
    }

    public function update(NewsRequest $request, News $news) {
        $request->validated();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }

        $news->fill($request->all())->save();


        return redirect()->route('admin.news.show')->with('success', 'Новость изменена');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news) {

        return view('admin.addNews',[
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }
}