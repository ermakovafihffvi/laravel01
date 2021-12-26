<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/*use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Fasades\File;
use Illuminate\Support\Facades\Storage;*/

/*class News
{
    private $preview_texts = [];
    public function __construct(Categories $category)
    {
        $this->category = $category;
    }


    public function getNews()
    {
        return json_decode(Storage::get('/public/news.json'), true);

    }

    public function getNewsByCategorySlug($slug) {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id) {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
          return $this->getNews()[$id] ?? [];
    }
}*/

class News extends Model{
    
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

}