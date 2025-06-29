<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function index()
    {
        // $allPosts=[
        //     ['Id'=>1,'title'=>'php','posted by'=>'Ahmed','creat at'=>'2022-10-10 9:00:00'],
        //     ['Id'=>2,'title'=>'java','posted by'=>'Adham','creat at'=>'2012-1-9 8:00:00'],
        //     ['Id'=>3,'title'=>'html','posted by'=>'Salma','creat at'=>'2021-2-5 1:00:00'],
        //     ['Id'=>4,'title'=>'css','posted by'=>'Amir','creat at'=>'2000-5-3 7:00:00'],
        // ];

        $postsfromDB = Post::all();
        // dd($postsfromDB);
        return view('posts.index',['posts'=>$postsfromDB]);
    }


// route binding
    public function show(Post $post)
    {

        // $singlepost = [

        //     'Id' => 1,
        //     'title' => 'php',
        //     'posted by' => 'Ahmed',
        //     'description' => 'it a good language to learn',
        //     'creat at' => '2022-10-10 9:00:00'

        // ];

        // $singlepostfromDB = Post::find($postId);
        // $singlepostfromDB = Post::findOrFail($postId);
        // if(is_Null($singlepostfromDB)){
        //     return to_route('posts.index');

        // }


        return view('posts.show',['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        // dd($users);
        return view('posts.create',['users'=>$users]);

    }

    public function store()
    {
        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id']
        ]);
        // $data = $_POST ;
        // $data = request();
        // @dd($data->title,$data->all());
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        //insert date to table way-1

        // $post = new post;
        // $post->title = $title;
        // $post->description = $description;

        // $post->save();

//-----------------
    //insert date to table way-2
        post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
        ]);

        // return $data;
       return to_route('posts.index')->with('success', 'Post created successfully!');
 ;
    }

    public function edit(post $post)
    {
        $users = User::all();

        return view('posts.edit',['users'=>$users,'post'=>$post]);
    }

//-----------------------------------------------------------------

    public function update($postId)
    {

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $singlepostfromDB = Post::find($postId);
        $singlepostfromDB -> update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator
        ]);

        // return $data;
        return to_route('posts.show',$postId) ;
    }



    public function destroy($postId)
    {

        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        $post = Post::find($postId);
        $post->delete();

        return to_route('posts.index') ;
    }
}
