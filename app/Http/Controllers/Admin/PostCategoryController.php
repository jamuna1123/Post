<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostCategory;
use App\Http\Requests\UpdatePostCategory;
use App\Models\PostCategory;
class PostCategoryController extends Controller
{
     public function index()
    {
        $postcategory = PostCategory::all();
        return view('admin.postcategory.index',compact('postcategory'));
    }

 public function create()
    {
      
        return view('admin.postcategory.create');
    }

     public function store(StorePostCategory  $request)
    {
    
         $postcategory = new PostCategory();
        
         $postcategory->title = $request->title;
             $postcategory->slug = $request->slug;
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
          $postcategory->image = 'images/'.$imageName;
   
         $postcategory->desc = $request->desc;
         $postcategory->save();
         return redirect()->route('postcategory.index')
                         ->with('success', 'Post Category created successfully.');
    }



public function edit($id)
    {
       $post = PostCategory::findOrFail($id);
   
        return view('admin.postcategory.edit',compact('postcategory'));
    }

      public function update(UpdatePostCategory  $request, $id)
    {
    
        
        $postcategory = PostCategory::findOrFail($id);
         $postcategory->title = $request->title;
          
          $postcategory->slug = $request->slug;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
          $postcategory->image = 'images/'.$imageName;
   
         $postcategory->desc = $request->desc;
         $postcategory->save();
         return redirect()->route('postcategory.index')
                         ->with('success', 'Post Category Update successfully.');
    }

 public function destroy($id)
    {
      PostCategory::find($id)->delete();
        return redirect()->route('postcategory.index')
                         ->with('success', 'Post Category deleted successfully');
    }
    
}
