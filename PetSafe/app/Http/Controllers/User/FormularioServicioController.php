<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Service;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\FormularioServicioRequest;
use App\Http\Requests\User\EditarServicioRequest;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class FormularioServicioController extends Controller
{
    public function __construct(){
        $this->middleware('isBeingApproved');
    }
    public function index()
    {
        $types = ServiceType::all();
        return view('user.formulario-servicio')->with(compact('types'));
    }

    public function registerService(FormularioServicioRequest $request)
    {
        $statusService = 1;
        if (auth()->user()->role_id == 2) {
            $statusService = 3;
        }

        $fileRoute = 'images/services_img/';
        $userImage = $request -> file('photo');

        $imageName = time().'-'.$userImage->getClientOriginalName();
        $imageUpload = $fileRoute;

        $userImage->move($imageUpload, $imageName);

        // Creating a new service in DB        
        $service = Service::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
            'photo'=> $imageUpload.$imageName,
            'active'=> $statusService,
            'service_type_id' => $request->service_type_id,
            'user_id' => Auth::user()->id,
        ]);

        // Creating a new schedule in DB
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
                'service_id' => $service->id,
            ]);
        }
        Alert::toast('Servicio creado correctamente', 'success');
        if ($statusService == 3) {
            return redirect()->route('perfil');
        }
        return redirect()->route('servicios');
    }

    public function editService(Service $service)
    {
        $schedules = $service->schedule()->get();
        $types = ServiceType::all();
        // dd($schedules->toArray());
        return view('user.editar-servicio', compact('service', 'schedules', 'types'));
    }

    public function updateService(EditarServicioRequest $request, Service $service)
    {
        // Parte de armado... quizas... solo quizas

        // Actualizar servicio
        if ($request->hasFile('photo')) {
            $fileRoute = 'images/services_img/';
            $serviceImage = $request -> file('photo');
            $imageName = time().'-'.$serviceImage->getClientOriginalName();

            //Eliminacion e inserción
            File::delete($service->photo);
            
            $imageUpload = $fileRoute;
            $serviceImage->move($imageUpload, $imageName);

            // Creating a new service in DB 
            if($service->update($request->only(['name', 'address', 'phone', 'email', 'description', 'service_type_id', 'user_id']) + ["photo" => $imageUpload.$imageName, 'user_id' => auth()->id()])){
                Alert::toast('Servicio actualizado correctamente', 'success');
            }
            else{
                Alert::toast('Oops... no se ha podido actualizar el servicio', 'error');
                
                // return al index
                return redirect()->route('servicios');
            }
        }
        // Creating a new service in DB 
        elseif($service->update($request->only(['name', 'address', 'phone', 'email', 'description', 'service_type_id', 'user_id']) + ['user_id' => auth()->id()])){
            Alert::toast('Servicio actualizado correctamente', 'success');
        }
        else{
            Alert::toast('Oops... no se ha podido actualizar el servicio', 'error');
            
            // return al index
            return redirect()->route('servicios');
        }

        // Actualizar horarios
        if (Schedule::where('service_id', $service->id)->delete()) {
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
                    'service_id' => $service->id,
                ]);
            }
            Service::where('id', $service->id)->update(array('active' => 1));
            Alert::toast('Servicio actualizado correctamente', 'success');
            
            // return al index
            return redirect()->route('servicios');
        }
        Alert::toast('Oops... ha ocurrido un error al intentar actualizar la agenda', 'error');
        
        // return al index
        return redirect()->route('servicios');
    }
}
