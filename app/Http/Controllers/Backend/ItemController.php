<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);
        $user = Auth::user();
        return view('backend.item.index', compact('items', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('backend.item.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required|string',
            'item_condition' => 'required',
            'item_type' => 'required',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,jpg,png',
            'owner_name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $item = new Item();
        $item->item_name = $request->input('item_name');
        $item->category_id = $request->input('category_id');
        $item->price = $request->input('price');
        $item->description = $request->input('description');
        $item->item_condition = $request->input('item_condition');
        $item->item_type = $request->input('item_type');
        $item->status = $request->has('status') ? 1 : 0;
        $item->owner_name = $request->input('owner_name');
        $item->phone = $request->input('phone');
        $item->address = $request->input('address');
        $item->longitude = $request->input('longitude');
        $item->latitude = $request->input('latitude');
        $item->save();

        $images = $request->file('images');
        foreach ($images as $image) {
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/item-images', $imageName);

            ItemImage::create([
                'item_id' => $item->id,
                'image' => $imageName,
            ]);
        }

        return redirect('/items')->with('add', 'Item Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $user = Auth::user();
        return view('backend.item.edit', compact('item', 'categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required|string',
            'item_condition' => 'required',
            'item_type' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,jpg,png',
            'owner_name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $item = Item::find($id);
        $item->item_name = $request->input('item_name');
        $item->category_id = $request->input('category_id');
        $item->price = $request->input('price');
        $item->description = $request->input('description');
        $item->item_condition = $request->input('item_condition');
        $item->item_type = $request->input('item_type');
        $item->status = $request->has('status') ? 1 : 0;
        $item->owner_name = $request->input('owner_name');
        $item->phone = $request->input('phone');
        $item->address = $request->input('address');
        $item->longitude = $request->input('longitude');
        $item->latitude = $request->input('latitude');
        $item->save();

        if ($request->hasFile('images')) {
            $existingImages = $item->itemImages;

            foreach ($existingImages as $existingImage) {
                Storage::delete('public/item-images/' . $existingImage->image);
                $existingImage->delete();
            }

            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/item-images', $imageName);

                ItemImage::create([
                    'item_id' => $item->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect('/items')->with('add', 'Item Updated!');
    }

    public function updateStatus(Item $item)
    {
        $item->status = $item->status === 1 ? 0 : 1;
        $item->save();

        return redirect()->back()->with('add', 'Item status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);

        $existingImages = $item->itemImages;
        foreach ($existingImages as $existingImage) {
            Storage::delete('public/item-images/' . $existingImage->image);
            $existingImage->delete();
        }
        $item->delete();

        return back()->with('del', 'Item Deleted!');
    }
}
