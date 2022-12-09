<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    private $categories;
    private $sub_category;
    private $sub_categories;

    public  function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.index', ['categories' => $this->categories]);
    }
    public  function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'sub-category all info successfully');
    }
    public function manage()
    {
        $this->sub_categories = SubCategory::all();
        return view('admin.sub-category.manage', ['sub_categories' => $this->sub_categories]);
    }
    public  function edit($id)
    {
        $this->categories = Category::all();
        $this->sub_category = SubCategory::find($id);
        return view('admin.sub-category.edit', ['categories' => $this->categories, 'sub_category' =>$this->sub_category]);
    }
    public  function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/manage-sub-category')->with('message', 'update sub-category  info successfully');

    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-sub-category')->with('message', 'delete sub-category  info successfully');

    }
}
