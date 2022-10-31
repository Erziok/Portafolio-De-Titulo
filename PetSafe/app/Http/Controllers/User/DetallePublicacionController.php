<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ComentarioRequest;
use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;

class DetallePublicacionController extends Controller
{
    public function index ($id) 
    {
        $objects = Publication::with(['user', 'category', 'animal', 'comment.child'])->where('id', $id)->get();
        return view('user.detalle-publicacion', compact('objects'));
    }

    public function storeComment (ComentarioRequest $request, Publication $object)
    {
        Comment::create($request->validated() + ['publication_id' => $object->id, 'user_id'=>auth()->id()]);
        return redirect()->back();
    }
    public function storeReply (ComentarioRequest $request, Publication $object, Comment $comment)
    {
        Comment::create($request->validated() + ['publication_id' => $object->id, 'user_id'=>auth()->id(), 'comment_id' => $comment->id]);
        return redirect()->back();
    }
}
