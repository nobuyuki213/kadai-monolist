<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // User が want または heve している item 達を取得
    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('type')->withTimestamps();
    }
    
    // userがWANTしているitemたちを取得
    public function want_items()
    {
        return $this->items()->where('type', 'want');
    }
    
    // User が want を実行するメソッド
    public function want($itemId)
    {
        // 既に want しているかの確認
        $exits = $this->is_wanting($itemId);
        
        if($exits) {
            // 既に want していれば何もしない
            return false;
        } else {
            // want していなければ want する
            $this->items()->attach($itemId, ['type' => 'want']);
            return true;
        }
    }
    
    // User が want を解除実行するメソッド
    public function dont_want($itemId)
    {
        // 既に want しているかの確認
        $exits = $this->is_wanting($itemId);
        
        if ($exits) {
            // 既に want していれば want を外す
            \DB::delete("DELETE FROM item_user WHERE user_id = ? AND item_id = ? AND type = 'want'", [\Auth::user()->id, $itemId]);
        } else {
            // want であれば何もしない
            return false;
        }
    }
    
    // 既に want しているかの確認実行メソッド
    public function is_wanting($itemIdOrCode)
    {
        if (is_numeric($itemIdOrCode)) {
            $item_id_exists = $this->want_items()->where('item_id', $itemIdOrCode)->exists();
            return $item_id_exists;
        } else {
            $item_code_exists = $this->want_items()->where('code', $itemIdOrCode)->exists();
            return $item_code_exists;
        }
    }
    
    
    
    /*
    * have 機能の実装はここから
    */
    
    // user が have している itemたち を取得
    public function have_items()
    {
        return $this->items()->where('type', 'have');
    }

    // user が have を実行するメソッド
    public function have($itemId)
    {
        //既に have しているかの確認
        $exits = $this->is_having($itemId);
        
        if ($exits) {
            //既に have していれば何もしない
            return false;
        } else {
            // have していなければ have する
            $this->items()->attach($itemId, ['type' => 'have']);
            return true;
        }
    }
    
    // User が have を解除実行するメソッド
    public function dont_have($itemId)
    {
        // 既に have しているかの確認
        $exits = $this->is_having($itemId);
        
        if ($exits) {
            // 既に have していれば have を外す
            \DB::delete("DELETE FROM item_user WHERE user_id = ? AND item_id = ? AND type = 'have'", [\Auth::user()->id, $itemId]);
        } else {
            // have であれば何もしない
            return false;
        }
    }
    
    // 既に have しているかの確認実行メソッド
    public function is_having($itemIdOrCode)
    {
        if (is_numeric($itemIdOrCode)) {
            $item_id_exists = $this->have_items()->where('item_id', $itemIdOrCode)->exists();
            return $item_id_exists;
        } else {
            $item_code_exists = $this->have_items()->where('code', $itemIdOrCode)->exists();
            return $item_code_exists;
        }
    }
}
