<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function manage()
    {
        $categories = Category::all();
        // $categories = Category::withCount('subCategories')->get();
        $subcategories = SubCategory::all();
        return view('admin.pages.course.course_sub_category', compact('subcategories','categories'));
    }

    public function add()
    {
        $categories = Category::all();

        $view = view('admin.components.sub-category-form-modal',compact('categories'))->render();
            return response()->json([
                'view' => $view]);
    }
    
    public function store(Request $request)
    {
        $category_count=0;
        $subcategory = new SubCategory();
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->parent_category = $request->parent_category;
        $subcategory->total_course = $request->total_course;
        $category=Category::find($request->parent_category);

        $category->total_sub_category =$category->total_sub_category+1;
        $category->save();
        return back()->with('notification', 'Sub Category added successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);

        $view = view('admin.components.edit_sub-category-form-modal',compact('categories','subcategory'))->render();
            return response()->json([
                'view' => $view]);
    }

    public function update(Request $request, $id)
    {
    $subcategory =  SubCategory::find($id);
    $subcategory->sub_category_name = $request->sub_category_name;
    $subcategory->parent_category = $request->parent_category;
    $subcategory->total_course = $request->total_course;
    $subcategory->save();
    return back()->with('notification', 'Sub Category updated successfully');
    }

    public function delete($id)
    {
    
        $subcategory = SubCategory::find($id);
        // return $subcategory;
        $subcategory->delete();
        return back()->with('notification', 'Sub Category deleted');

    }




}
