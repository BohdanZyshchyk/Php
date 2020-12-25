<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function Index(Request $request)
    {
        $tags = Tag::query()->get();
        $posts = Post::query()->get();
        return view('index',['tags'=>$tags, 'posts'=> $posts]);
    }
    public function  AddPost(Request $request)
    {
        $categories=Category::query()->get();

        $tags=Tag::query()->get();
        return view('addPost',['categories'=>$categories,'tags'=>$tags]);
    }

    public function  ShowPost($id)
    {
        $post=Post::query()->find($id);
        return view('showPost',['post'=>$post]);
    }

    public function UploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            //  Let's do everything here
            if ($request->file('file')->isValid()) {
                //
//                $validated = $request->validate([
//                    'name' => 'string|max:40',
//                    'file' => 'mimes:jpeg,png|max:1024',
//                ]);
                $extension = $request->file->extension();
                $name = sha1(microtime()) . "." . $extension;
                $request->file('file')->storeAs('/public', $name);

                $url = Storage::url($name);
                return response()->json(['link' => $url]);
            }
        }
    }


}
