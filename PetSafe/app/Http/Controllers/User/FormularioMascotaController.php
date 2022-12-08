<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditarMascotaRequest;
use App\Http\Requests\User\FormularioMascotaRequest;
use App\Models\Animal;
use App\Models\Specie;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class FormularioMascotaController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $species = Specie::all();
        return view('user.formulario-mascota')->with(compact('categories', 'species'));
    }

    public function getBreeds($id)
    {
        $data = Breed::where('specie_id', $id)->get();
        return response()->json($data);
    }

    public function registerPet(FormularioMascotaRequest $request)
    {

        // Problema con el nextId, si no hay al menos 1 registro en BD no sirve, revisar despúes

        // $nextId = Publication::orderBy('id','desc')->get('id')->first();

        // //folders for the publication images
        // $publicationFolder = 'publication-'.$nextId->id+1 .'/';

        //this is the variable for the route of photos

        $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
        if(!in_array($request->file('photo')->getClientOriginalExtension(), $allowedExtensions)) {
            return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
        }

        $fileRoute = "images/publications/";
        $publicationImage = $request -> file('photo');

        //the name for the images
        $imageName = time().'-'.$publicationImage->getClientOriginalName();
        // $imageUpload = $fileRoute.$publicationFolder; --> De momento no agregamos subcarpetas
        $imageUpload = $fileRoute;
        // //making the folder
        // mkdir($imageUpload,0700); --> Por el momento se guardarán las fotos en publications, sin subcarpetas
        //moving the image to the folder route
        $publicationImage->move($imageUpload, $imageName);

        $animal = Animal::create([
            'breed_id'=> $request->breed_id,
            'specie'=> $request->specie,
            'gender'=> $request->gender,
            'name'=> $request->name,
        ]);

        Publication::create([
            'title'=> $request->title,
            'incidentDate'=> $request->incidentDate,
            'description'=> $request->description,
            'active'=> $request->input('active', 1),
            'photo'=> $imageUpload.$imageName,
            // 'image'=> $request->image,
            'user_id' => Auth::user()->id,
            'animal_id' => $animal->id,
            'category_id'=> $request->category_id,
        ]);
        Alert::toast('Publicación creada correctamente', 'success');
        return redirect()->route('publicaciones');
    }

    public function editPet(Publication $publication, Animal $animal)
    {
        $this->authorize('publication.tasks', $publication);
        $categories = Category::all();
        $species = Specie::all();
        return view('user.editar-publicacion', compact('publication', 'categories', 'animal', 'species'));
    }

    public function update(EditarMascotaRequest $request, Publication $publication, Animal $animal)
    {
        //$this->authorize('publication.tasks', $publication);
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
            $publication->update($request->only(['title', 'category_id', 'incidentDate', 'description']) + ['photo'=> $imageUpload.$imageName, 'user_id'=>auth()->id(), 'animal_id'=>$animal->id]);

            Alert::toast('Publicación actualizada correctamente', 'success');
            return redirect()->route('publicaciones');
        }
        $animal->update($request->only(['name','breed_id', 'gender']));
        $publication->update($request->only(['title', 'category_id', 'incidentDate', 'description']) + ['user_id'=>auth()->id(), 'animal_id'=>$animal->id]);
        
        Alert::toast('Publicación actualizada correctamente', 'success');
        return redirect()->route('publicaciones');
    }
}
