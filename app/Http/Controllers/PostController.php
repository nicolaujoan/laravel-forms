<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return 'posts list: 0';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create(Request $request)
    {
        return view('welcome');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    */
    public function store(StorePostRequest $request)
    {
        $form_data = $request->all();  // get form data

        // 1) create and save Post model
        // $post = new Post;
        // $post->title = $form_data['title'];
        // $post->content = $form_data['content'];
        // $post->extract = $form_data['extract'];
        // $post->user_id = Auth::id();
        // $post->expirable = $form_data['expirable'] === 'on' ? true : false;
        // $post->comentable = $form_data['comentable'] === 'on' ? true : false;
        // $post->is_private = $form_data['access'] === 'private' ? true : false;
        // $is_saved = $post->save();

        // if ($is_saved) {
        //     echo '<h3>Post saved successfully!</h3>';
        // } else {
        //     echo '<h3>Cannot save post</h3>';
        // }

        // 2) need fillable properties for mass assignment
        
        try {
            $post = Post::create([
                'title' => $form_data['title'],
                'content' => $form_data['content'],
                'extract' => $form_data['extract'],
                'user_id' => Auth::id(),
                'expirable' => $form_data['expirable'] === 'on' ? true : false,
                'comentable' => $form_data['comentable'] === 'on' ? true : false,
                'is_private' => $form_data['access'] === 'private' ? true : false,
            ]);
            echo '<h3>Post saved successfully!</h3>';
        } catch (Exception $e) {
            echo '<h3>Cannot save post</h3>';
        }
 
        // 3) QueryBuilder

        // 4) Sentencia raw

        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}