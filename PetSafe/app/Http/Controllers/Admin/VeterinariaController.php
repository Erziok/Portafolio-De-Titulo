<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Veterinary\ActualizarVeterinariaRequest;
use App\Http\Requests\Admin\Veterinary\GuardarVeterinariaRequest;
use App\Models\Benefit;
use App\Models\ClinicalProcedure;
use RealRashid\SweetAlert\Facades\Alert;

class VeterinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicalProcedures = ClinicalProcedure::with(['benefit'])->get();
        return view('admin.veterinaria.index', compact('clinicalProcedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benefits = Benefit::all();
        return view('admin.veterinaria.create', compact('benefits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarVeterinariaRequest $request)
    {
        if (ClinicalProcedure::create($request->validated())) {
            Alert::toast('Procedimiento creado correctamente', 'success');    
        } else {
            Alert::toast('Oops... No se ha podido guardar el procedimiento', 'error'); 
        }
        return redirect()->route('admin.veterinary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalProcedure $clinicalProcedure)
    {
        $benefits = Benefit::all();
        return view('admin.veterinaria.edit', compact('clinicalProcedure', 'benefits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarVeterinariaRequest $request, ClinicalProcedure $clinicalProcedure)
    {
        if ($clinicalProcedure->update($request->validated())) {
            Alert::toast('Procedimiento actualizado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido actualizar el procedimiento', 'error');    
        }
        return redirect()->route('admin.veterinaria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicalProcedure $clinicalProcedure)
    {
        if ($clinicalProcedure->delete()) {
            Alert::toast('Procedimiento eliminado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar el procedimiento', 'error');   
        }
        return redirect()->route('admin.veterinaria.index');
    }
}
