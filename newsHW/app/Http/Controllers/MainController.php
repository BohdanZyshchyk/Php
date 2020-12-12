<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Image;

class MainController extends Controller
{

    public function Index(Request $request)
    {
//        $categories = Category::query()->get();
//        dd($categories);

        $posts = Post::query()->get();
        //dd($posts);

//        $posts = Post::query()->with('Category')->get();
//        $category = $posts[0]->Category;
//        dd($category->name);

        //$posts = Post::query()->with('Tags')->get();

        //foreach ($posts[0]->Tags as $tag) {
        //    echo $tag->name. '<br />';
        //}

        //dd($posts);
        return view('post.index', ['posts'=> $posts,
            'title'=> 'Список постів']);
    }
    public function Create(Request $request)
    {

        $posts = Post::query()->paginate(10);
        $categories = Category::query()->get();
        // Post::query()->array_push($posts );
        return view('post.create', ['posts' => $posts, 'categories' => $categories, 'title' => 'Додати пост']);
    }

    public function Store(Request $request)
    {
         $request->validate([
             'title' => 'required',
             'description' => 'required',
             'description_short' => 'required',
             'url' => 'required',
             'id_category' => 'required'
         ]);
        // dd($request);
        $url='';
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image->extension();
                $name = sha1(microtime()) . "." . $extension;
                $request->image->storeAs('/public', $name);

                $url = Storage::url($name);

            }
        }

        Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'description_short' => $request->description_short,
            'url' => $url,
            'id_category' => $request->id_category
        ]);

        return redirect()->route('post.list')
            ->with('success', 'Post created successfully.');
    }

    public function UploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            //  Let's do everything here
            if ($request->file('file')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'file' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->file->extension();
                $name = sha1(microtime()) . "." . $extension;
                $request->file('file')->storeAs('/public', $name);

                $url = Storage::url($name);
                return response()->json(['link' => $url]);
            }
        }


    }

    public function List(Request $request)
    {
//        $categories = Category::query()->get();
//        dd($categories);
        $tag = new Tag();
        $tag->name="asdfadf";
        $tag->description= "555555";
        $tag->url= "7777";

        $tag->save();
        $posts = Post::query()->paginate(10);
        //dd($posts);

//        $posts = Post::query()->with('Category')->get();
//        $category = $posts[0]->Category;
//        dd($category->name);

        //$posts = Post::query()->with('Tags')->get();

        //foreach ($posts[0]->Tags as $tag) {
        //    echo $tag->name. '<br />';
        //}

        //dd($posts);
        return view('post.list', ['posts'=> $posts,
            'title'=> 'Список постів']);
    }
}
