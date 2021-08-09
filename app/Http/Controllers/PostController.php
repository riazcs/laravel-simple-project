<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function index()
    {
        $posts = Post::latest()->paginate(5);
    
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'descr' => 'required',
            'file' => 'required|image|mimes:png,jpg|max:2048',
        ]);
  
        $input = $request->all();
        if ($image = $request->file('file')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }
    
        Post::create($input);
     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }
     
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
     
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'descr' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('file')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
          
        $post->update($input);
    
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }
  
    public function destroy(Post $post)
    {
        $post->delete();
     
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
