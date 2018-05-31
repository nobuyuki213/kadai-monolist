<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;

class RankingController extends Controller
{
    // want ランキングの取得
    public function ranking()
    {
        $type = request()->type;
        
        $items = \DB::table('item_user')
                    ->join('items', 'item_user.item_id', '=', 'items.id')
                        ->select('items.*', \DB::raw('COUNT(*) as count'))
                        ->where('type', $type)
                        ->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url', 'items.created_at', 'items.updated_at')
                        ->orderBy('count', 'DESC')->take(10)->get();
        
        $type = studly_case($type);
        
        return view('ranking.ranking', [
            'items' => $items,
            'type' => $type,
            ]);
    }
}
