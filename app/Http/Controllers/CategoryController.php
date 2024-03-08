<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manage(){

        $categories = Category::withCount('subCategories')->get();
        $categories = Category::all();
        return view('admin.pages.course.course_category', compact('categories'));
    }

    public function add(){
        $view = view('admin.components.category-form-modal')->render();
            return response()->json([
                'view' => $view]);
      
    }
    
    public function store(Request $request){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->total_course = $request->total_course;
        $category->save();
        return back()->with('notification', 'Category added successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        $view = view('admin.components.edit_category-form-modal',compact('category'))->render();
            return response()->json([
                'view' => $view]);
    }

    public function update(Request $request, $id)
    {
    $category =  Category::find($id);
    $category->category_name = $request->category_name;
    $category->total_course = $request->total_course;
    $category->save();
    return back()->with('notification', 'Category updated successfully');
    }

    public function delete($id)
    {

        $category = Category::find($id);
 
        $category->delete();
        return back()->with('notification', 'Category deleted');

    }

}