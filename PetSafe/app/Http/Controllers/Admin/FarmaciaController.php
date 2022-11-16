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
        Medicine::create($request->validated());
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
        $medicine->update($request->validated());
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
        $medicine->delete();
        return redirect()->route('admin.medicine.index');
    }
}
