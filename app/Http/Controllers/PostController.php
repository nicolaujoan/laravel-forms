<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->select('posts.*', 'users.name')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->get();
        return view('list-posts', ["posts" => $posts]);
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
        $form_data = $request->all();

        try {
            Post::create([
                'title' => $form_data['title'],
                'content' => $form_data['content'],
                'extract' => $form_data['extract'],
                'user_id' => Auth::id(),
                'expirable' => isset($form_data['expirable']) && $form_data['expirable'] === 'on' ? true : false,
                'comentable' => isset($form_data['comentable']) && $form_data['comentable'] === 'on' ? true : false,
                'is_private' => isset($form_data['access']) && $form_data['access'] === 'private' ? true : false,
            ]);
            return $this->index();
        } catch (Exception $e) {
            echo '<h3>Cannot save post</h3>';
        }
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
     */
    public function edit($id)
    {
        // find object by id
        $post = Post::query()->where('id', '=', $id)->first();

        if (!Gate::allows('update-post', $post)) {
            echo "<script>alert('You are not the owner of the post.')</script>";
            return $this->index();
        }

        return view('edit-post', ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $form_data = $request->all();

        $post = Post::where('id', $id)
            ->update([
                'title' => $form_data['title'],
                'content' => $form_data['content'],
                'extract' => $form_data['extract'],
                'user_id' => Auth::id(),
                'expirable' => isset($form_data['expirable']) && $form_data['expirable'] === 'on' ? true : false,
                'comentable' => isset($form_data['comentable']) && $form_data['comentable'] === 'on' ? true : false,
                'is_private' => isset($form_data['access']) && $form_data['access'] === 'private' ? true : false,
            ]);

        return $this->index();
    }

    /**
    * Remove the specified resource from storage.
    *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        try {

            $post = Post::query()->where('id', '=', $id)->first();
            
            if (!Gate::allows('delete-post', $post)) {
                echo "<script>alert('You are not the owner of the post.')</script>";
                return $this->index();
            }

            Post::destroy($id);
            return $this->index();
        } catch (Exception $e) {
            echo '<h3>Cannot destroy post</h3>';
        }
    }
}