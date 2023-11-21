<?php

namespace App\Http\Controllers\Category;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Category/CategoryIndex', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Category/AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category_create = new Category();
        $category_create->name = $request->name;
        $category_create->description = $request->description;
        if($request->hasFile('image')){
            $file_name = Storage::put('/upload/category', $request->file('image'));
            $category_create->image = $file_name;
        }
        $category_create->save();
        return to_route('category.index');
    }

    public function get_all_categories()
    {
        $categories = Category::all();
        return response()->json($categories);
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
        $category_to_edit = Category::find($id);
        return Inertia::render('Category/EditCategory', [
            'category_to_edit' => [
                'data' => $category_to_edit,
                'image' => asset($category_to_edit->image)
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category_edit = Category::find($id);
        $data = json_decode($request->data);
        $category_edit -> name = $data->name;
        $category_edit -> description = $data->description;

        if($request->hasFile('image')){
            if (File::exists($category_edit->image)) {
                File::delete($category_edit->image);
            }
            $file_name = Storage::put('/upload/category', $request->file('image'));
            $category_edit->image = $file_name;
        }
        $category_edit->save();
        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (File::exists($category->image)) {
            File::delete($category->image);
        }
        $category->delete();
        return to_route('category.index');
    }
}
