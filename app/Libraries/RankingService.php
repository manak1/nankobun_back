<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RankingService
{
    //keyの保存、閲覧数のインクリメント
    public function incrementViewRanking($id)
    {
        $key = "ranking-"."id:".$id;
        $value = Redis::get($key);

        if(empty($value)){
            Redis::set($key, "1");
            Redis::expire($key, 3600*24); 
        } else {
            Redis::set($key, $value + 1);
        }
    }

    //ランキング結果を配列で取得
    public function getRankingAll()
    {
        $keys = Redis::keys('ranking-*');
        $results = Array();

        if(empty($keys) != true){
            for($i = 0; $i < sizeof($keys); $i++){
                $id = explode(':', $keys[$i])[1];
                $point = Redis::get('ranking-id:'. $id);
                $results[$id] = $point;
            }
            arsort($results, SORT_NUMERIC);
        }
        return $results;
    }
}