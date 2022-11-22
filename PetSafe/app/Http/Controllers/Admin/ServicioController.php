<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ActualizarServicioRequest;
use App\Http\Requests\Admin\Service\GuardarServicioRequest;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with(['user', 'type'])->get();
        return view('admin.servicios.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.servicios.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarServicioRequest $request)
    {
        if (Service::create($request->validated())) {
            toastr()->success('Servicio creado exitosamente', '¡Perfecto!');    
        } else {
            toastr()->error('El Servicio no se ha podido guardar', 'Oops...');
        }
        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $types = Type::all();
        return view('admin.servicios.edit', compact('service','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarServicioRequest $request, Service $service)
    {
        if ($service->update($request->validated())) {
            toastr()->success('Servicio actualizado exitosamente', '¡Perfecto!');    
        } else {
            toastr()->error('El Servicio no se ha podido actualizar', 'Oops...');
        }
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if ($service->delete()) {
            toastr()->success('Servicio eliminado exitosamente', '¡Perfecto!');
        } else {
            toastr()->error('El Servicio no se ha eliminar guardar', 'Oops...');    
        }
        return redirect()->route('admin.service.index');
    }
}
