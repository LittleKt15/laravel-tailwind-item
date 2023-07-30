<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $items = Item::where('status', 1)->get();
        return view('frontend.index', compact('categories', 'items'));
    }

    public function selectedCategory($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $items = $category->items()->where('status', '1')->get();
        return view('frontend.category', compact('categories', 'category', 'items'));
    }

    public function search(Request $request, $id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $name = "%" . $request->item_name . "%";
        $items = $category->items()->where('item_name', 'like', $name)->get();

        return view('frontend.category', compact('categories', 'category', 'items'));
    }

    public function detail($id)
    {
        $item = Item::find($id);
        $category = $item->category ?? null;
        return view('frontend.detail', compact('category', 'item'));
    }
}
