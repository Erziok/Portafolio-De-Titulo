<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Benefit\ActualizarBeneficioRequest;
use App\Http\Requests\Admin\Benefit\GuardarBeneficioRequest;
use App\Http\Requests\Admin\Benefit\GuardarBeneficioController;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits = Benefit::with(['user'])->get();
        return view('admin.beneficios.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.beneficios.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarBeneficioRequest $request)
    {
        Benefit::create($request->validated());
        return redirect()->route('admin.benefit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit)
    {
        $users = User::all();
        return view('admin.beneficios.edit', compact('benefit', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarBeneficioRequest $request, Benefit $benefit)
    {
        $benefit->update($request->validated());
        return redirect()->route('admin.benefit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        $benefit->delete();
        return redirect()->route('admin.benefit.index');
    }
}
