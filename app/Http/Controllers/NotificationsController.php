<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Regresar las notificaciones del usuario logueado
        $notificaciones = auth()->user()->unreadNotifications;

        //Mark the notifications with leading


        //Regresar vista
        return view('notificaciones.index', compact('notificaciones'));
    }
}
