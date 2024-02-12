<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View
    {
        $categories = Category::all();

        return view('posts.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request): Post // в переменную дата прийдут только валидированные данные // ?? если есть дата дескриптион то пиши дескриптион иначе нулл // save соранение в базу данных
    {

        dd($request);

        $data = $request->validated(); // все что проверенно из реквеста сохраняем в массив дата

        $image = $data['poster'];
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move(
            storage_path() . '/app/public/posts/posters',
            $imageName
        );

        $post = new Post();

        $post->name        = $data['name'];
        $post->description = $data['description'] ?? null;
        $post->content     = $data['content'];
        $post->poster      = $imageName;

        $post->save();


        if (isset($data['categories_ids'])) {
            $category = Category::find($data['categories_ids']);
            $post->categories()->attach($category->id);
        }

        if (isset($data['posts_ids'])) {
            $post = Post::find($data['posts_ids']);
            $post->posts()->attach($post->id);
        }





        // attach привязать
        // detach отвязать
        // sync ?????


        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): Post
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): ?bool
    {
        return $post->delete();
    }
}
