<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       
        $notificaciones = Auth::user()->unreadNotifications;

        return view('notificaciones.index', [
           'notificaciones' => $notificaciones,
        ]);

    }
}
