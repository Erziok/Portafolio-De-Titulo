<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Service;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\service\ActualizarHorariosRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\Service\GuardarServicioRequest;
use App\Http\Requests\Admin\Service\ActualizarServicioRequest;
use App\Http\Requests\admin\service\GuardarHorariosRequest;
use Illuminate\Support\Facades\File;

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
        $fileRoute = 'images/services_img/';
        $serviceImage = $request -> file('photo');

        $imageName = time().'-'.$serviceImage->getClientOriginalName();
        $imageUpload = $fileRoute;

        $serviceImage->move($imageUpload, $imageName);

        // Creating a new service in DB 
        if(Service::create($request->only(['name', 'address', 'phone', 'email', 'description', 'type_id', 'user_id']) + ["photo" => $imageUpload.$imageName, 'user_id' => auth()->id(), 'active' => 2])){
            Alert::toast('Servicio guardado correctamente', 'success');
            return redirect()->route('admin.service.index')->with('message', 'El servicio se activará automaticamente cuando se añada una agenda.');
        }
        Alert::toast('Oops... no se ha podido guardar el servicio', 'error');
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
        if ($request->hasFile('photo')) {
            $fileRoute = 'images/services_img/';
            $serviceImage = $request -> file('photo');
            $imageName = time().'-'.$serviceImage->getClientOriginalName();

            //Eliminacion e inserción
            File::delete($service->photo);
            
            $imageUpload = $fileRoute;
            $serviceImage->move($imageUpload, $imageName);

            // Creating a new service in DB 
            if($service->update($request->only(['name', 'address', 'phone', 'email', 'description', 'type_id', 'user_id']) + ["photo" => $imageUpload.$imageName, 'user_id' => auth()->id(), 'active' => 2])){
                Alert::toast('Servicio guardado correctamente', 'success');
                return redirect()->route('admin.service.index');
            }
            Alert::toast('Oops... no se ha podido guardar el servicio', 'error');
            return redirect()->route('admin.service.index');

        }
        // Creating a new service in DB 
        if($service->update($request->only(['name', 'address', 'phone', 'email', 'description', 'type_id', 'user_id']) + ['user_id' => auth()->id(), 'active' => 2])){
            Alert::toast('Servicio guardado correctamente', 'success');
            return redirect()->route('admin.service.index');
        }
        Alert::toast('Oops... no se ha podido guardar el servicio', 'error');
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
        $service = Service::with(['schedule'])->where('id', $service_id)->first()->toArray();
        return view('admin.servicios.schedules-edit', compact('service'));
    }
    public function updateSchedules(ActualizarHorariosRequest $request)
    {
        if (Schedule::where('service_id', $request->service_id)->delete()) {
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
        Alert::toast('Oops... ha ocurrido un error al intentar actualizar la agenda', 'error');
        return redirect()->route('admin.service.index');
    }
    public function getSchedules($id)
    {
        $schedules = Schedule::where('service_id', $id)->get();
        return response(compact('schedules'));
    }
}
