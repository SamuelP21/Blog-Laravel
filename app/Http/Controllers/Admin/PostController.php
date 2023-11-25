<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $posts = Post::where('user_id', auth()->user()->id)->latest('id')->paginate(15); */
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //$categories = Category::pluck('name', 'id');
        $categories = Category::all();
        $tags = Tag::all();
        //return  $tags;
        return view('admin.post.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        /* return Storage::put('public/posts',$request->file('file')); */
        //return auth()->user()->id;
        // Obtén el ID del usuario autenticado
        $userId = auth()->user()->id;

        // Crea el post con los datos del formulario y asigna el usuario
        $post = new Post($request->all());
        $post->user_id = $userId;

        // Guarda el post
        $post->save();

        if ($request->file('file')) {
            $url = Storage::put('public/posts',$request->file('file'));
            $post->image()->create([
                'url' => $url,
            ]); // se guarda en la relacion que tiene post con img relacion uno a uno polimorfica
        }

        if ($request->tags){
            $post->tags()->attach($request->tags); //guardad con la relacion muchos a muchos que defimos en el modelo
        }

        return redirect()->route('dashboard');
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
    public function edit(Post $post)
    {
        $this->authorize('autor', $post);
        /* return $post; */
        $categories = Category::all();
        $tags = Tag::all();

        
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('autor', $post);

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts',$request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image()->update([
                    'url' => $url,
                ]); 
            }else{
                $post->image()->create([
                    'url' => $url,
                ]); // se guarda en la relacion que tiene post con img relacion uno a uno polimorfica
            }           
        }

         if ($request->tags){
            $post->tags()->sync($request->tags); //actualiza y sync se encarga de borrar y no guardar en caso de que exista
        } 

        return redirect()->route('admin.post.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$this->authorize('autor', $post);
    }
}
