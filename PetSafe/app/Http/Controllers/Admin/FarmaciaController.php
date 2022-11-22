<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Medicine\ActualizarMedicinaRequest;
use App\Http\Requests\Admin\Medicine\GuardarMedicinaRequest;
use App\Models\Benefit;
use App\Models\Medicine;
use App\Models\Specie;
use Faker\Provider\Medical;
use Illuminate\Http\Request;

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
            toastr()->success('Medicamento creado exitosamente', '¡Perfecto!');
        } else {
            toastr()->error('El medicamento no se ha podido guardar', 'Oops...');    
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
            toastr()->success('Medicamento actualizado exitosamente', '¡Perfecto!');    
        } else {
            toastr()->error('El medicamento no se ha podido actualizar', 'Oops...');
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
            toastr()->success('Medicamento eliminado exitosamente', '¡Perfecto!');
        } else {
            toastr()->error('El medicamento no se ha podido eliminar', 'Oops...');    
        }
        return redirect()->route('admin.medicine.index');
    }
}
