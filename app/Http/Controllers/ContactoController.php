<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;
use App\Mail\ConfirmacionMailable;
use App\Models\ContactMessage;

class ContactoController extends Controller
{
    /* ---------- Muestra el formulario ---------- */
    public function index()
    {
        return view('contacto.index');
    }

    public function store(Request $request)
{
        /* 1. Validación de datos */
        $datos = $request->validate([
            'nombre'  => 'required|min:3',
            'email'   => 'required|email',
            'mensaje' => 'required|min:10',
        ]);

        try {
            /* 2. Guardar en la tabla contact_messages */
            ContactMessage::create($datos);

            /* 3. Correo interno al equipo de soporte */
            Mail::to('soporte@uc.edu')
                ->send(new ContactanosMailable($datos));

            /* 4. Acuse de recibo al remitente */
            Mail::to($datos['email'])
                ->send(new ConfirmacionMailable($datos));

            /* 5. Mensaje flash de éxito */
            return back()->with('success', '¡Mensaje enviado y confirmación enviada a tu correo!');
        } catch (\Exception $e) {
            // Registrar el error y mostrar un mensaje al usuario
            \Log::error('Error al enviar correo: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Hubo un problema al enviar el mensaje: ' . $e->getMessage());
        }
    }

    /* ---------- Bandeja de entrada ---------- */
    public function inbox()
    {
        $mensajes = ContactMessage::latest()->paginate(10);

        return view('contacto.inbox', compact('mensajes'));
    }
}