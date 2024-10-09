<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $title = $request->input('title');
        if($title){
           if($user->isAdmin){
                $posts = Post::search($title)->paginate(10);
           }
           else{
                $posts = Post::ownPosts($user->id)
                ->search($title)
                ->paginate(10);
           }
        }
        else{
            if($user && $user->isAdmin){
                $posts = Post::paginate(10);
            }
            else{
                $posts = Post::ownPosts($user->id)->paginate(10);
            }
        }
        return view('Posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'title'=>'required|string',
            'tags'=>'string',
            'content'=>'string|required'
        ]);

        $validatedData['user_id']=Auth::user()->id;


        try{
            Post::create($validatedData);
            return redirect()->back()->with('success', 'Post sikeresen létrehozva!');
        }
        catch(\Exception $e){
          return redirect()->back()->with('error', 'Hiba történt a Post létrehozása során: ' . $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData=$request->validate([
            'title'=>'required|string',
            'tags'=>'string',
            'content'=>'string|required'
        ]);

        $validatedData['user_id']=Auth::user()->id;


        try{
            $post->update($validatedData);
            return redirect()->back()->with('success', 'Post sikeresen frissítve!');
        }
        catch(\Exception $e){
          return redirect()->back()->with('error', 'Hiba történt a Post frissítése során: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
       try{
        $post->delete();
        return redirect()->back()->with('success', 'Post sikeresen törölve!');
       }
       catch(\Exception $e){
        return redirect()->back()->with('error', 'Hiba történt a Post törlése során: ' . $e->getMessage());
      }
    }
}
