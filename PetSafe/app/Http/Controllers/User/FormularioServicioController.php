<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Service;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\FormularioServicioRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FormularioServicioController extends Controller
{
    public function __construct(){
        $this->middleware('isBeingApproved');
    }
    public function index()
    {
        $types = Type::all();
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
            'type_id' => $request->type_id,
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
        return redirect()->route('servicios');
    }
}
