<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\SearchRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class ServicioController extends Controller
{
    public function index()
    {
        $datos = Service::with(['user'])->latest()->get()->paginate(Config::get('petsafe-web-config.paginateServicesBy'));
        return view('user.servicios', compact('datos'));
    }

    public function serviceSearch(SearchRequest $request) {
        $valor = preg_replace("/[^A-Za-z0-9 ]/", '', $request->field);
        if (isset($_GET['field'])) {
            $datos = Service::where('description', 'like','%'.e($valor).'%')
            ->orWhere('name', 'like', '%' . e($valor) . '%')
            ->with('user')
            ->get()
            ->paginate(Config::get('petsafe-web-config.paginateServicesBy')); 

            $datos->appends($request->all());
            return view('user.servicios', compact('datos', 'valor'));
        } else {
            return redirect()->route('servicios'); 
        }
    }

    public function serviceFilter(FilterRequest $request) {
        if (isset($_GET['filter'])) {
            $datos = Service::where('type_id', e($request->filter))
            ->with('user')
            ->get()
            ->paginate(Config::get('petsafe-web-config.paginateServicesBy'));

            $datos->appends($request->all());
            return view('user.servicios', compact('datos'));
        }else {
            return redirect()->route('servicios');
        }
    }
}
