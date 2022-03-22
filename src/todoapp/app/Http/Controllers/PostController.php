<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();
        $user = Auth::user();
        return view('post.index', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }

    public function new() {
        return view('post.new');
    }

    public function create(Request $request) {
        $task = $request->input('task');
        $limit = $request->input('date');
        $status = $request->input('status');
        $user_id = Auth::id();
        Post::insert([
            "task" => $task,
            "limit" => $limit,
            "user_id" => $user_id,
            "status" => $status,
        ]);
        return redirect(route('post'));
    }

    public function show(Request $request) {
        $task_data = Post::where('id', $request->id );
        if(!$task_data->exists()) {
            abort(404);
        }
        $task = $task_data->first();

        $user_data = User::where('id', $task->user_id);
        if(!$user_data->exists()) {
            abort(404);
        }
        $user = $user_data->first();

        return view('post.show', [
            'task' => $task,
            'user' => $user,
        ]);
    }

    public function edit(Request $request) {
        $task_data = Post::where('id', $request->id);
        if(!$task_data->exists()) {
            abort(404);
        }
        $task = $task_data->first();
        return view('post.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request) {
        if(!empty(Post::find($request->id))) {
            $task = $request->input('task');
            $limit = $request->input('date');
            $status = $request->input('status');
            Post::find($request->id)->update([
                "task" => $task,
                "limit" => $limit,
                "status" => $status,
            ]);
            return redirect(route('post.show', ['id' => $request->id]));
        } else {
            abort(404);
        }
    }

    public function destroy(Request $request) {
        if(!empty(Post::find($request->id))) {
            $task = Post::find($request->id)->delete();
        }
        return redirect(route('post'));
    }
}
