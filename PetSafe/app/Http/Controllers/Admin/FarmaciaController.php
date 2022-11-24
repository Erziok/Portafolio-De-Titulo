<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Medicine\ActualizarMedicinaRequest;
use App\Http\Requests\Admin\Medicine\GuardarMedicinaRequest;
use App\Models\Benefit;
use App\Models\Medicine;
use App\Models\Specie;
use RealRashid\SweetAlert\Facades\Alert;

class FarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.farmacia.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benefits = Benefit::all();
        $species = Specie::all();
        return view('admin.farmacia.create', compact('benefits', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarMedicinaRequest $request)
    {
        if(Medicine::create($request->validated())) {
            Alert::toast('Medicamento creado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido guardar el medicamento', 'error');   
        }
        return redirect()->route('admin.medicine.index');
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
    public function edit(Medicine $medicine)
    {
        $species = Specie::all();
        $benefits = Benefit::all();
        return view('admin.farmacia.edit', compact('medicine', 'species', 'benefits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarMedicinaRequest $request, Medicine $medicine)
    {
        if ($medicine->update($request->validated())) {
            Alert::toast('Medicamento actualizado correctamente', 'success');    
        } else {
            Alert::toast('Oops... No se ha podido actualizar el medicamento', 'error');
        }
        return redirect()->route('admin.medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        if ($medicine->delete()) {
            Alert::toast('Medicamento eliminado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar el medicamento', 'error');    
        }
        return redirect()->route('admin.medicine.index');
    }
}
