<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('author_id', Auth::user()->id);

        if (request('keyword')) {
            $posts->where('title', 'LIKE', '%' . request('keyword') . '%');
        }

        return view('dashboard.index', ['posts' => $posts->paginate(7)->withQueryString(), 'title' => 'Dashboard']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', ['title' => 'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'category_id' => 'required',
        //     'content' => 'required',
        // ]);

        Validator::make(
            $request->all(),
            [
                'title' => 'required|min:4|max:200',
                'category_id' => 'required',
                'content' => 'required|min:10'
            ],
            [
                'title.required'    => ':attribute tidak boleh kosong!',
                'category_id.required' => 'Pilih salah satu :attribute!',
                'content.required'  => ':attribute tidak boleh kosong!',
                'title.min'         => 'Title minimal 4 huruf',
                'content.min'       => 'Isi :attribute minimal 4 huruf',
                'title.max'         => 'Title maksimal 200 huruf',
                'content.max'       => 'Isi :attribute maksimal 200 huruf'
            ],
            [
                'title' => 'Title',
                'category_id' => 'Category',
                'content' => 'Content'
            ]
        )->validate();

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);

        return redirect('/dashboard')->with(['success' => '"' . Str::limit($request->title, 30) . '" berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post, 'title' => Str::limit($post->title, 10)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', ['post' => $post, 'title' => 'Edit ' . Str::limit($post->title, 10)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post, Request $request)
    {
        // validation
        Validator::make(
            $request->all(),
            [
                'title' => 'required|min:4|max:200',
                'category_id' => 'required',
                'content' => 'required|min:10'
            ],
            [
                'title.required'    => ':attribute tidak boleh kosong!',
                'category_id.required' => 'Pilih salah satu :attribute!',
                'content.required'  => ':attribute tidak boleh kosong!',
                'title.min'         => 'Title minimal 4 huruf',
                'content.min'       => 'Isi :attribute minimal 4 huruf',
                'title.max'         => 'Title maksimal 200 huruf',
                'content.max'       => 'Isi :attribute maksimal 200 huruf'
            ],
            [
                'title' => 'Title',
                'category_id' => 'Category',
                'content' => 'Content'
            ]
        )->validate();

        // update post
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);

        // redirect
        return redirect('/dashboard')->with(['success' => '"' . Str::limit($request->title, 40) . '" berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with(['deleted' => '"' . Str::limit($post->title, 50) . '" berhasil dihapus!']);
    }
}
