<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QiitaApiController extends Controller
{
    protected function getIndex()
    {   
        $payload = [];
        // $curl = curl_init('https://qiita.com/api/v2/tags/新人プログラマ応援');
        $curl = curl_init('https://qiita.com/api/v2/items?page=1&per_page=100&query=tag:新人プログラマ応援');
        $option = [
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,//curlの結果を自動で表示させない
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer a0cd19f44535260ae5f8437fe3c5c78f8d62080b',
                'Content-Type: application/json',
            ],
        ];
        curl_setopt_array($curl, $option);
        $result = curl_exec($curl);
        curl_close($curl);
        $qiita_article_objects = json_decode($result);
        // var_dump($qiita_article_objects);
        foreach($qiita_article_objects as $qiita_article_object){
            var_dump($qiita_article_object->title);
            // var_dump($qiita_article_object->url);
        }
        return view('front.top')->with($payload);
    }
      
}
