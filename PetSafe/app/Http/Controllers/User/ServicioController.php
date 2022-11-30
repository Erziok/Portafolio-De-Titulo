<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\SearchRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Config;

class ServicioController extends Controller
{
    public function index()
    {
        $serviciosPendientes = false;
        if (sizeOf(Service::where('user_id', auth()->id())->where('active', 3)->get()) >= 1) {
            $serviciosPendientes = true;
        }
        $datos = Service::with(['user'])->where('active', '<', 2)->latest()->get()->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
        return view('user.servicios', compact('datos', 'serviciosPendientes'));
    }

    public function serviceSearch(SearchRequest $request) {
        $serviciosPendientes = false;
        if (sizeOf(Service::where('user_id', auth()->id())->where('active', 3)->get()) >= 1) {
            $serviciosPendientes = true;
        }

        $valor = preg_replace("/[^A-Za-z0-9 ]/", '', $request->field);
        if (isset($_GET['field'])) {      
            $datos = Service::where('description', 'like','%'.e($valor).'%')
            ->orWhere(function ($query) use ($valor) {
                $query->where('name', 'like', '%' . e($valor) . '%')
                      ->where('active', '<', 2);
            })->get()->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
            $datos->appends($request->all());
            return view('user.servicios', compact('datos', 'valor', 'serviciosPendientes'));
        } else {
            return redirect()->route('servicios'); 
        }
    }

    public function serviceFilter(FilterRequest $request) {
        $serviciosPendientes = false;
        if (sizeOf(Service::where('user_id', auth()->id())->where('active', 3)->get()) >= 1) {
            $serviciosPendientes = true;
        }
        
        if (isset($_GET['filter'])) {
            $datos = Service::where('type_id', e($request->filter))
            ->where('active', '<', 2)
            ->with('user')
            ->latest()
            ->get()
            ->paginate(Config::get('petsafe-web-config.paginateServicesBy'));

            $datos->appends($request->all());
            return view('user.servicios', compact('datos', 'serviciosPendientes'));
        }else {
            return redirect()->route('servicios');
        }
    }
}
