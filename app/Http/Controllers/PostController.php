<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function index() {
    $post = Post::all();
    return response() -> json($post);
  }

  public function create(Request $request) {
      $this -> validate($request, [
        'title' => 'required',
        'image' => 'required',
        'logo' => 'required',
        'description' => 'required',
      ]);
      $newPost = Post::create($request->all());
      if ($newPost) {
        return response() -> json([
          'status' => 'success',
          'newElementId' => $newPost
        ]);
      } else {
        return response()->json(['status' => 'fail']);
      }
  }

  public function remove(Request $request, $id) {
    $item = Post::find($id);
    $item -> delete();
    return response() -> json('Item with ' . $id . ' removed');
  }

  public function editPost(Request $request, $id) {
    $item = Post::find($id);
    $item -> title = $request -> input('title');
    $item -> description = $request -> input('description');
    $item -> image = $request -> input('image');
    $item -> logo = $request -> input('logo');
    $item -> text = $request -> input('text');
    $item -> save();

    return response() -> json('Item was updated');

  }

  public function getPost(Request $request, $id) {
    $item = Post::find($id);
    return response() -> json($item)
  }

}
