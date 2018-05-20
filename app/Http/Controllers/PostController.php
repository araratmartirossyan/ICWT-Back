<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'text' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);
        $newPost = Post::create($request->all());
        if ($newPost) {
            return response()->json([
                'status' => 'Item was created [id = ' . $newPost->id . ']',
                'new_item' => $newPost
            ]);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    public function remove(Request $request, $id)
    {
        $item = Post::find($id);
        $item->delete();
        return response()->json('Item with ' . $id . ' removed');
    }

    public function removeAll(Request $request) {
        $allPosts = Post::truncate();
        return response() -> json('All posts removed successfully and id set to 1');
    }

    public function editPost(Request $request, $id)
    {
        $changedItem = Post::find($id);
        $changedItem->title = $request->input('title');
        $changedItem->description = $request->input('description');
        $changedItem->text = $request->input('text');
        $changedItem->image = $request->input('image');
        $changedItem->logo = $request->input('logo');
        $changedItem->save();

        return response()->json([
            'status' => 'Item was updated',
            'changed_item' => $changedItem
        ]);

    }

    public function getPost(Request $request, $id)
    {
        $item = Post::find($id);
        return response()->json($item);
    }

}
