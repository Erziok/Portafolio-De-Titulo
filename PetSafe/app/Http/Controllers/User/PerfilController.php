<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SearchRequest;
use App\Models\Publication;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class PerfilController extends Controller
{
    public function index()
    {
        $datos = User::withCount([
            'publication' => function ($q) {
                $q->where('active', '<', 2);
            }, 
            'favourite',
            'service' => function ($q) {
                $q->where('active', '<', 2);
            }
        ])
        ->where('id', auth()->id())
        ->get()
        ->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
        
        $serviciosPendientes = Service::where('user_id', auth()->id())->where('active', 3)->first();
        
        if (!empty($serviciosPendientes)) {
            $mensajeRevision = "Recientemente has ingresado un servicio y este está pendiente de confirmación. Por el momento, no podrás crear nuevos servicios hasta que se tome una decisión respecto a tu solicitud.";
            return view('user.perfil', compact('datos', 'mensajeRevision'));
        }
        $serviciosRechazados = Service::where('user_id', auth()->id())->where('active', 4)->first();
        if(!empty($serviciosRechazados)) {
            $serviciosRechazados->update(['active'=>5]);
            $mensajeRechazo = "Recientemente has ingresado un servicio el cual fue rechazado tras la revisión de nuestro equipo. De todas formas, puedes volver a intentarlo siendo mas cuidadoso con el contenido que ingresas a PetSafe.";
            return view('user.perfil', compact('datos', 'mensajeRechazo'));
        }
        return view('user.perfil', compact('datos'));
    }

    public function myPublications()
    {
        $datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->where('user_id', auth() -> id())->where('active','<',2)->get()->paginate(Config::get('petsafe-web-config.paginateServicesBy')); 
        return view('user.mis-publicaciones', compact('datos'));
    }
    public function myServices()
    {
        $serviciosPendientes = false;
        if (sizeOf(Service::where('user_id', auth()->id())->where('active', 3)->get()) >= 1) {
            $serviciosPendientes = true;
        }
        $datos = Service::with(['user'])->where('user_id', auth()->id())->latest()->get()->where('active','<',2)->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
        return view('user.mis-servicios', compact('datos', 'serviciosPendientes'));
    }
    public function myFavourites()
    {
        $datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->whereRelation('favourite', 'user_id', auth() -> id())->get()->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
        return view('user.mis-favoritos', compact('datos'));
    }
}
