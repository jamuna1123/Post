<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index',compact('post'));
    }

 public function create()
    {
      
        return view('admin.post.create');
    }

     public function store(StorePost  $request)
    {
    
         $post = new Post();
        
         $post->title = $request->title;
          
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
          $post->image = 'images/'.$imageName;
   
         $post->desc = $request->desc;
         $post->save();
         return redirect()->route('post.index')
                         ->with('success', 'Post created successfully.');
    }



public function edit($id)
    {
       $post = Post::findOrFail($id);
   
        return view('admin.post.edit',compact('post'));
    }

      public function update(UpdatePost  $request, $id)
    {
    
        
        $post = Post::findOrFail($id);
         $post->title = $request->title;
          
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
          $post->image = 'images/'.$imageName;
   
         $post->desc = $request->desc;
         $post->save();
         return redirect()->route('post.index')
                         ->with('success', 'Post Update successfully.');
    }

 public function destroy($id)
    {
      Post::find($id)->delete();
        return redirect()->route('post.index')
                         ->with('success', 'Post deleted successfully');
    }
    

}
