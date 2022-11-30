<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssociationController extends Controller
{
    public function index() {
        $solicitudes = Service::with(['type', 'user'])->where('active', 3)->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function approveRequest(Service $service, User $user) {
        if ($service->update(['active'=>1]) && $user->update(['role_id'=>3])) {
            Alert::toast('Solicitud aprobada correctamente', 'success');
        }else {
            Alert::toast('Oops... No se pudo aprobar esta solicitud', 'error');
        }
        return redirect()->route('admin.association.index');
    }
    public function denyRequest(Service $service) {
        if ($service->update(['active'=> 4 ])) {
            Alert::toast('Solicitud rechazada correctamente', 'success');
        }else {
            Alert::toast('Oops... No se pudo rechazar esta solicitud', 'error');
        }
        return redirect()->route('admin.association.index');
    }
    public function getRequests($id) {
        $solicitudes = Service::with(['user', 'type', 'schedule'])->where('id', $id)->get();
        return response(compact('solicitudes'));
    }
}
