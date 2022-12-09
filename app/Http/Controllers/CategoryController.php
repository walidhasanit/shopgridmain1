<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    private $categories;

    public function index()
    {
        return view('admin.category.index');
    }
    public function create(Request $request)
    {
        Category::getNewCategory($request);
        return redirect()->back()->with('message', 'category all info successfully');
    }
    public function manage()
    {
        $this->categories = Category::all();
        return view('admin.category.manage', ['categories' => $this->categories]);
    }
    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit', ['category' => $this->category]);
    }
    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/manage-category')->with('message', 'update category  info successfully');
    }
    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('message', 'delete category  info successfully');

    }
}
