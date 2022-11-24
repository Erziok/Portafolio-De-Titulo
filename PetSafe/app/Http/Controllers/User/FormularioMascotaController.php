<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormularioMascotaRequest;
use App\Models\Animal;
use App\Models\Specie;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
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
            'breed'=> $request->breed,
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
            'category_id'=> $request->category,
        ]);
        Alert::toast('Publicación creada correctamente', 'success');
        return redirect()->route('publicaciones');
    }
}
