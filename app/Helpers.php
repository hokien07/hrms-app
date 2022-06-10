<?php

use Illuminate\Support\Facades\Validator;

if (! function_exists('vaild_params')) {
    function vaild_params($rules, \Illuminate\Http\Request $request){
        $invalidKeys = Validator::make($request->all(), $rules)->errors()->toArray();
        $vaildParams = $request->only(array_filter(array_keys($rules), function($key) use ($invalidKeys){
            return strpos($key, '.') === false && !array_key_exists($key, $invalidKeys);
        }));
        array_walk($vaildParams, function(&$item, $key) use($invalidKeys){
            if(is_array($item)){
                $item = array_filter($item, function($subkey) use ($key, $invalidKeys){
                    return !array_key_exists("{$key}.{$subkey}", $invalidKeys);
                }, ARRAY_FILTER_USE_KEY);
            }
        });
        return $vaildParams;
    }
}
