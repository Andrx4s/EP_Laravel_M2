<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Post\PostCreateValidation;
use App\Http\Requests\User\Post\PostUpdateValidation;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Вызов страницы с выводом по 15 постов
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::simplePaginate(15);
        return view('users.Post.index', compact('posts'));
    }

    /**
     * Вывод страницы создания поста
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $request->session()->flashInput([]);
        return view('users.Post.createOrUpdate');
    }

    /**
     * Функция валидации и создания поста
     * @param PostCreateValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCreateValidation $request)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        # public/sdfsdfsdfsd.jpg
        $photo = $request->file('photo_file')->store('public');
        # Explode => / => public/sdfsdfsdfsd.jpg => ['public', 'sdfsdfsdfsd.jpg']
        $validate['photo'] = explode('/',$photo)[1];
        $validate['user_id'] = Auth::user()->id;
        Post::create($validate);
        return back()->with(['success' => true]);
    }

    /**
     * Вызов страницы с просмотром одного поста
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('users.Post.show', compact('post'));
    }

    /**
     * Вызов страницы редактирования поста с проверкой пользователя что это его пост
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request,Post $post)
    {
        if($post->user_id != Auth::id()){
            return back();
        }
        $request->session()->flashInput($post->toArray());
        return view('users.Post.createOrUpdate', compact('post'));
    }

    /**
     * Функция для редактирования поста
     * @param PostUpdateValidation $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostUpdateValidation $request, Post $post)
    {
        if($post->user_id != Auth::id()){
            return back();
        }
        $validate = $request->validated();
        unset($validate['photo_file']);
        if ($request->hasFile('photo_file')){
            # public/sdfsdfsdfsd.jpg
            $photo = $request->file('photo_file')->store('public');
            # Explode => / => public/sdfsdfsdfsd.jpg => ['public', 'sdfsdfsdfsd.jpg']
            $validate['photo'] = explode('/',$photo)[1];
        }
        $post->update($validate);
        return back()->with(['success' => true]);
    }

    /**
     * Функция для удаления поста
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with(['successDestroy' => true]);
    }
}
