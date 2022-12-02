<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\Schedule;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\ComentarioRequest;

class DetalleServicioController extends Controller
{
    public function index ($id) 
    {
        $services = Service::with(['user', 'type', 'schedule'])->where('id', $id)->get();
        //dd($services->toArray());
        return view('user.detalle-servicio', compact('services'));
    }

    public function destroy(Service $service)
    {
        if ($service->delete()) {
            Alert::toast('Publicación eliminada correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar la publicación', 'error');    
        }
        return redirect()->route('servicios');
    }
}
