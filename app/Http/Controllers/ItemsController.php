<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Item;

class ItemsController extends Controller
{
    // 楽天市場にある商品検索
    public function create()
    {
        $keyword = request()->keyword; // フォームから送信される検索ワードを取得
        $items = []; // view表示エラー回避のためitemsの初期化（空の配列）
        if ($keyword) {
            // 楽天APIを使用するための設定
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
            
            // 楽天市場での商品検索
            $rws_response = $client->execute('IchibaItemSearch', [
                'keyword' => $keyword,
                'imageFlag' => 1, // 1 : 商品画像ありの商品のみを検索対象とする
                'hits' => 20, // 1ページあたりの取得件数
                ]);
                
            // 扱いやすいように Item としてインスタンスを作成する（保存はしない）
            foreach ($rws_response->getData()['Items'] as $rws_item) {
                $item = new Item();
                $item->code = $rws_item['Item']['itemCode'];
                $item->name = $rws_item['Item']['itemName'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=128x128', '', $rws_item['Item']['mediumImageUrls'][0]['imageUrl']);
                $items[] = $item;
            }
        }
        
        return view('items.create', [
            'keyword' => $keyword,
            'items' => $items,
            ]);
    }
    
    public function show($id)
    {
        $item = Item::find($id);
        $want_users = $item->want_users()->get();
        
        return view('items.show', [
            'item' => $item,
            'want_users' => $want_users,
            ]);
    }
}
