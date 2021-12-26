<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link) {
        /*$xml = XMLParser::load($link);
        $data = $xml->parse([
            //'title' => ['uses' => 'channel.title'],
            //'link' => ['uses' => 'channel.link'],
            //'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category,author]'
            ],
        ]);

        $reverseData['news'] = array_reverse($data['news']);
        //проверка что такой новости ещё нет по дате
        $lastInBase = News::select('created_at')->latest()->first();
        //if($lastInBase){ 
        $lastNewsTime = $lastInBase->created_at->format('U');
        //} else { //на случай если база новостей ещё пуста
        // $lastNewsTime = strtotime('2021-12-10 00:00:00');
        //}
        

        foreach ($reverseData['news'] as $newsItem) {
            if(strtotime($newsItem['pubDate'] > $lastNewsTime)){
                // Получить категорию (с id)
                // при необходимости добавить категорию в БД
                $categories = Categories::all();
                $idCat = 0;
                for($i = 0; $i < count($categories); $i++){
                    if($newsItem['category'] == $categories[$i]->title){
                        $idCat = $categories[$i]->id;
                    }
                }
                if($idCat == 0){
                    $newsCategory = new Categories;
                    $newsCategory->title = $newsItem['category'];
                    $newsCategory->slug = "empty_slug"; //потом вообще убрать
                    $newsCategory->save();
                }

                // получить новость
                // добавить id категории в новость
                $pieceOfNews = new News;
                $pieceOfNews->title = $newsItem['title'];
                $pieceOfNews->author = $newsItem['author'] ?: 'lenta';
                $pieceOfNews->text = $newsItem['description'];
                $pieceOfNews->created_at = $newsItem['pubDate'];
                $pieceOfNews->category_id = $idCat;
                $pieceOfNews->save(); 
            }

        }*/
        $xml = XMLParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);
        foreach ($data['news'] as $news) {
            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
            }
            $category = Category::query()->firstOrCreate([
                'title' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'isPrivate' => false,
                'image' => $news['enclosure::url'],
                'category_id' => $category->id,
            ]);


        }
    }
}