<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class WelcomeController extends Controller
{
    // display a Top page view
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(20);
        
        return view('welcome', [
            'items' => $items
            ]);
    }
}
