<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['code', 'name', 'url', 'image_url'];
    
    // item を wantまたはhaveしている user達を取得
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    // item を want している user達を取得
    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
}
