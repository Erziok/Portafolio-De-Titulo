<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publication\ActualizarPublicacionRequest;
use App\Http\Requests\Admin\Publication\GuardarPublicacionRequest;
use App\Models\Category;
use App\Models\Publication;
use RealRashid\SweetAlert\Facades\Alert;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::with(['user', 'category'])->get();
        return view('admin.publicaciones.index', compact('publications'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.publicaciones.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPublicacionRequest $request)
    {
        if (Publication::create($request->validated())) {
            Alert::toast('Publicación creada correctamente', 'success');
        }else {
            Alert::toast('Oops... No se ha podido guardar la publicación', 'error');    
        }
        return redirect()->route('admin.publication.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $categories = Category::all();
        return view('admin.publicaciones.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPublicacionRequest $request, Publication $publication)
    {
        if ($publication->update($request->validated())) {
            Alert::toast('Publicación actualizada correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido actualizar la publicación', 'error');    
        }
        return redirect()->route('admin.publication.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        if ($publication->delete()) {
            Alert::toast('Publicación eliminada correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar la publicación', 'error');    
        }
        return redirect()->route('admin.publication.index');
    }
}
