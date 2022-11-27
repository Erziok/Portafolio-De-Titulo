<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Service;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\Service\GuardarServicioRequest;
use App\Http\Requests\Admin\Service\ActualizarServicioRequest;
use App\Http\Requests\admin\service\GuardarHorariosRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with(['user', 'type', 'schedule'])->get();
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
        // if (Service::create($request->validated())) {
        //     Alert::toast('Servicio creado correctamente', 'success');    
        // } else {
        //     Alert::toast('Oops... No se ha podido guardar el servicio', 'error');
        // }
        // return redirect()->route('admin.service.index');

        $fileRoute = 'images/services_img/';
        $userImage = $request -> file('photo');

        $imageName = time().'-'.$userImage->getClientOriginalName();
        $imageUpload = $fileRoute;

        $userImage->move($imageUpload, $imageName);

        // Creating a new service in DB        
        Service::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
            'photo'=> $imageUpload.$imageName,
            'active'=> $request->input('active', 2),
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
        ]);
        Alert::toast('Contraseña actualizada correctamente', 'success');
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
            Alert::toast('Servicio actualizado correctamente', 'success');    
        } else {
            Alert::toast('Oops... No se ha podido actualizar el servicio', 'error');
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
            Alert::toast('Servicio eliminado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar el servicio', 'error');   
        }
        return redirect()->route('admin.service.index');
    }

    public function createSchedules($service_id)
    {
        return view('admin.servicios.schedules-create', compact('service_id'));
    }

    public function storeSchedules(GuardarHorariosRequest $request)
    {
        $day = $request -> day;
        $startHour = $request -> startHour;
        $endHour = $request -> endHour;
        $newStartHour = array();
        $newEndHour = array();

        foreach ($startHour as $key => $value) {
            if ($startHour[$key] != null) {
                array_push($newStartHour, $startHour[$key]);
            }
            if ($endHour[$key] != null) {
                array_push($newEndHour, $endHour[$key]);
            }
        }

        foreach ($day as $key => $value) {
            Schedule::insert([
                'day' => $day[$key],
                'startHour' => $newStartHour[$key],
                'endHour' => $newEndHour[$key],
                'service_id' => $request->service_id,
            ]);
        }
        Service::where('id', $request->service_id)->update(array('active' => 1));
        Alert::toast('Horario guardado correctamente', 'success');
        return redirect()->route('admin.service.index');
    }

    public function editSchedules($service_id)
    {
        return view('admin.servicios.schedules-edit', compact('service_id'));
    }

    public function getSchedules($id)
    {
        $schedules = Schedule::where('service_id', $id)->get();
        return response(compact('schedules'));
    }
}
