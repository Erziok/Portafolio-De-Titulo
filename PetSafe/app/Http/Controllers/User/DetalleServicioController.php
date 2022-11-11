<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ComentarioRequest;
use App\Models\Comment;
use App\Models\Medicine;
use App\Models\Publication;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function index ($id) 
    {
        $objects = Service::with(['user', 'type'])->where('id', $id)->get();
        $schedule = Schedule::with(['service'])->where('service_id', $id)->get();
        return view('user.detalle-servicio', compact('objects', 'schedule'));
    }
}
