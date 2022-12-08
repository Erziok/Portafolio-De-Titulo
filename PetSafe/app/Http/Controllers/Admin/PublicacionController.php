<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publication\ActualizarPublicacionRequest;
use App\Http\Requests\Admin\Publication\GuardarPublicacionRequest;
use App\Models\Animal;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Specie;
use Illuminate\Support\Facades\File;
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
        $publications = Publication::with(['user', 'category', 'animal'])->get();
        return view('admin.publicaciones.index', compact('publications'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        $categories = Category::all();
        return view('admin.publicaciones.create', compact('categories', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPublicacionRequest $request)
    {
        $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
        if(!in_array($request->file('photo')->getClientOriginalExtension(), $allowedExtensions)) {
            return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
        }

        $fileRoute = "images/publications/";
        $publicationImage = $request->file('photo');
        $imageName = time().'-'.$publicationImage->getClientOriginalName();
        $imageUpload = $fileRoute;
        $publicationImage->move($imageUpload, $imageName);

        $animal = Animal::create($request->only(['name','breed_id', 'gender']));
        $publication = Publication::create($request->only(['title', 'category_id', 'incidentDate', 'description', 'active']) + ['photo'=> $imageUpload.$imageName, 'user_id'=>auth()->id(), 'animal_id'=>$animal->id]);
        
        Alert::toast('Publicación creada correctamente', 'success');
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
    public function edit(Publication $publication, Animal $animal)
    {
        $categories = Category::all();
        $species = Specie::all();
        return view('admin.publicaciones.edit', compact('publication', 'categories', 'animal', 'species'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPublicacionRequest $request, Publication $publication, Animal $animal)
    {
        if ($request->hasFile('photo')) {
            
            $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
            if(!in_array($request->file('photo')->getClientOriginalExtension(), $allowedExtensions)) {
                return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
            }

            $fileRoute = "images/publications/";
            $publicationImage = $request->file('photo');
            $imageName = time().'-'.$publicationImage->getClientOriginalName();
            //Eliminacion e inserción
            File::delete($publication->photo);

            $imageUpload = $fileRoute;
            $publicationImage->move($imageUpload, $imageName);

            $animal->update($request->only(['name','breed_id', 'gender']));
            $publication->update($request->only(['title', 'category_id', 'incidentDate', 'description', 'active']) + ['photo'=> $imageUpload.$imageName, 'user_id'=>auth()->id(), 'animal_id'=>$animal->id]);

            Alert::toast('Publicación actualizada correctamente', 'success');
            return redirect()->route('admin.publication.index');
        }
        $animal->update($request->only(['name','breed_id', 'gender']));
        $publication->update($request->only(['title', 'category_id', 'incidentDate', 'description', 'active']) + ['user_id'=>auth()->id(), 'animal_id'=>$animal->id]);
        
        Alert::toast('Publicación actualizada correctamente', 'success');
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
