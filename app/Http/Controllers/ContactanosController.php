<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\StoreContactanosRequest; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactanosController extends Controller
{
    public function index(): View
    {
        return view('contactanos.index');
    }

    public function store(Request $request): RedirectResponse 
    {

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            // 'asunto' => 'required|string|max:255', // El PDF no lo incluye en el form, pero sí en el Mailable
            'mensaje' => 'required|string|min:10',
        ]);

        // El PDF no tiene campo 'asunto' en el formulario, pero sí en el Mailable.
        // Si deseas un asunto dinámico desde el formulario, añádelo a la validación y al formulario.
        // Por ahora, lo pasaremos como un array que podría incluir un asunto fijo o datos del form.
        $mailData = [
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'mensaje' => $validatedData['mensaje'],
            'asunto' => 'Nuevo Mensaje de Contacto de ' . $validatedData['nombre'], // Asunto para el email
        ];


        try {
            // El PDF envía a 'marana@edu.pe'. Es mejor hacerlo configurable.
            $recipientEmail = config('mail.admin_contact_email', 'admin@example.com');
            Mail::to($recipientEmail)->send(new ContactanosMailable($mailData));

            return redirect()->route('contactanos.index')
                             ->with('success_message', '¡Mensaje enviado con éxito! Gracias por contactarnos.');
                             // El PDF usa with('info', 'Mensaje Enviado')

        } catch (\Exception $e) {
            \Log::error('Error al enviar correo de contacto: ' . $e->getMessage(), ['data' => $validatedData]);
            return redirect()->route('contactanos.index')
                             ->withInput()
                             ->with('error_message', 'Hubo un problema al enviar tu mensaje. Por favor, inténtalo más tarde.');
        }
    }
}