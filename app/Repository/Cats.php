<?php

namespace App\Repository;
use App\Models\Cat;

class Cats{

    CONST CACHE_KEY = 'CATS';

    public function getAll(){

        $seconds = 60*60;
        $key = "all";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey, $seconds, function () {
            $data = Cat::all();
            return response()->json($data);
        });
    }

    public function getCacheKey($key){
        $key = strtoupper($key);
        return self::CACHE_KEY . "$key";
    }
}
