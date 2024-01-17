<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function addCategory() {
        return view('layouts.admin.Categories.addCategory',['categories'=>Category::all()]);
    }
    public function createCategory(Request $request){
        $title=$request->input("title");
        $Category=Category::where('title',$title)->get();
        if (count($Category)>0) {
            // $message= 'This category already exists';
            return redirect()->route('admin.category.addCategory')->with('success','This category already exists'); 
        }
        $category = new Category();
        $category->title = $request->input('title');
        $category->user_id = auth()->user()->id;

        $category->save();
        // $message= 'Category added successfully';
        return redirect()->route('admin.category.addCategory')->with('success','Category added successfully'); 
     }
     public function editCategory($id)
     {
      $category = Category::findorfail($id);
      return view("layouts.admin.Categories.editCategory", ['category'=>$category],['categories'=>Category::all()]);
     }
     public function updateCategory(Request $request,$id)
     {
      $title=$request->input("title");
      $category=Category::findorfail($id);
      if($category->title==$title){
        //   $message="No changes occur";
          return redirect()->route("admin.category.addCategory")->with("success",'No changes occur');
      }
      else{
          $category->title= $title;
          $category->save();
          $message= 'Category updated successfully';
          return redirect()->route("admin.category.addCategory")->with("success",'Category updated successfully');
  
      }
     }
     public function deleteCategory($id)
     {
          $category=Category::find($id);
          $category->delete();
        //   $message= 'Category deleted successfully';
          return redirect()->route("admin.category.addCategory")->with("success",'Category deleted successfully');
     }
}
