<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $user = Auth::user();
        return view('backend.category.index', compact('categories', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('backend.category.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/category-images', $imageName);

        $category = new Category();
        $category->name = $request->input('name');
        $category->image = $imageName;
        $category->status = $request->has('status');
        $category->save();

        return redirect('/categories')->with('add', 'Category Added!');
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
        $category = Category::find($id);
        $user = Auth::user();
        return view('backend.category.edit', compact('category', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'nullable|boolean',
        ]);

        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $categoryImage = $category->image;
            File::delete('storage/category-images/' . $categoryImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/category-images', $imageName);

            $data['image'] = $imageName;
        }
        // dd($data);
        $category->update($data);

        return redirect('/categories')->with('add', 'Category Updated!');
    }

    public function updateStatus(Category $category)
    {
        $category->status = $category->status === 1 ? 0 : 1;
        $category->save();

        return redirect()->back()->with('add', 'Category status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $categoryImage = $category->image;
        File::delete('storage/category-images/' . $categoryImage);
        $category->delete();

        return back()->with('del', 'Category Deleted');
    }
}
