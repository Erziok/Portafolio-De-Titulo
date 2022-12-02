<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Publication;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\ComentarioRequest;

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

    public function destroy(Publication $object)
    {
        if ($object->delete()) {
            Alert::toast('Publicación eliminada correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar la publicación', 'error');    
        }
        return redirect()->route('publicaciones');
    }
}
