<?php

namespace App\Models;

use Illuminate\Support\Str;

class Preview extends News
{
    private $preview_texts = [];

    /*public function makePTexts(){
        $news_list = //получить новости 
        foreach($news_list as $item){
            $this->preview_texts[$item['id']] = $this->TruncateText($item['text'], 15);
        }
        return $this->preview_texts;
    }*/
    function __construct($news){
        $this->news_list = $news;
    }

    public function makePTexts(){ 
        //dd($this->news_list[0]->text);
        foreach($this->news_list as $item){
            $this->preview_texts[$item->id] = $this->TruncateText($item->text, 15);
        }
        //dd($this->preview_texts);
        return $this->preview_texts;
    }
    
    private function TruncateText($strText, $intLen){
        if(mb_strlen($strText) > $intLen)
            return rtrim(mb_substr($strText, 0, $intLen), ".")."...";
        else
            return $strText;
    }
}