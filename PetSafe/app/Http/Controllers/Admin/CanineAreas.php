<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use App\Models\CanineArea;
use App\Models\BenefitType;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\CanineZones\GuardarZonaRequest;
use App\Http\Requests\Admin\CanineZones\ActualizarZonaRequest;

class CanineAreas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canineAreas = CanineArea::all();
        return view('admin.zonas.index', compact('canineAreas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benefits = BenefitType::all();
        return view('admin.zonas.create', compact('benefits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarZonaRequest $request)
    {
        $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
        if(!in_array($request->file('photo')->getClientOriginalExtension(), $allowedExtensions)) {
            return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
        }

        $fileRoute = "images/canine-areas/";
        $areaImage = $request -> file('photo');
        $imageName = time().'-'.$areaImage->getClientOriginalName();
        $imageUpload = $fileRoute;
        $areaImage->move($imageUpload, $imageName);
        CanineArea::create($request->only(['title', 'comment', 'url', 'active', 'benefit_id']) + ["photo"=>$imageUpload.$imageName]);
        Alert::toast('Zona canina creada correctamente', 'success');
        return redirect()->route('admin.canineArea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CanineArea  $canineArea
     * @return \Illuminate\Http\Response
     */
    public function show(CanineArea $canineArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CanineArea  $canineArea
     * @return \Illuminate\Http\Response
     */
    public function edit(CanineArea $canineArea)
    {
        $benefits = BenefitType::all();
        return view('admin.zonas.edit', compact('benefits', 'canineArea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CanineArea  $canineArea
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarZonaRequest $request, CanineArea $canineArea)
    {
        if ($request->hasFile('photo')) {
            $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
            if(!in_array($request->file('photo')->getClientOriginalExtension(), $allowedExtensions)) {
                return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
            }
            $fileRoute = "images/canine-areas/";
            $areaImage = $request -> file('photo');
            $imageName = time().'-'.$areaImage->getClientOriginalName();

            //Eliminacion e inserción
            File::delete($canineArea->photo);

            $imageUpload = $fileRoute;
            $areaImage->move($imageUpload, $imageName);

            $canineArea->update($request->only(['title', 'comment', 'url', 'active', 'benefit_id']) + ["photo"=>$imageUpload.$imageName]);
        }
        $canineArea->update($request->only(['title', 'comment', 'url', 'active', 'benefit_id']));

        Alert::toast('Zona canina actualizada correctamente', 'success');
        return redirect()->route('admin.canineArea.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CanineArea  $canineArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(CanineArea $canineArea)
    {
        if ($canineArea->delete()) {
            Alert::toast('Zona canina eliminada correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar el beneficio', 'error');
        }
        return redirect()->route('admin.canineArea.index');
    }
}
