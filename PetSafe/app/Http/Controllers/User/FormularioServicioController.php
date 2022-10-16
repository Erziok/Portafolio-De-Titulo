<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormularioServicioRequest;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class FormularioServicioController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('user.formulario-servicio')->with(compact('types'));
    }

    public function registerService(FormularioServicioRequest $request)
    {
        Service::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'types_id' => $request->type,
            'users_id' => Auth::user()->id,
        ]);
        return redirect()->route('tiendas');
    }
}
