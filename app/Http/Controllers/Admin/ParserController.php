<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\RssList;
use App\Http\Requests\RssRequest;
use App\Services\XMLParserService;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function index() {
        $rsslist = RssList::all();
        //dd($rsslist); laravel может плюрализовать имя таблицы собака такая
        return view('admin.rsslist', [
            'rsslist' => $rsslist,
        ]);
    }

    public function create(RssList $rsslist) {

        return view('admin.addRss',[
            'rsslist' => $rsslist,
        ]);
    }

    public function store(RssRequest $request, RssList $rsslist) {
        $request->validated();
        $rsslist->fill($request->all())->save();
        return redirect()->route('admin.parserIndex')->with('success', 'Ссылка добавлена');
    }

    public function destroy(RssList $rsslist) {
        $rsslist->delete();
        return redirect()->route('admin.parserIndex')->with('success', 'Ссылка удалена');
    }

    public function parser(XMLParserService $parserService) {
        /*$rssLinks = [
            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
            ]; <--надо эту херню из бд подтягивать и делать массив*/
        $rsslist = RssList::all();    
        $start = microtime(true);

        foreach ($rsslist as $link) {
            //dd('in for');
            NewsParsing::dispatch($link);
            //$parserService->saveNews($link);
        }

        $end = microtime(true);
        dump($end - $start);
        return redirect()->route('admin.news.show');
    }
}
