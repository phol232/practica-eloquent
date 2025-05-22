<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    /**
     * Create a new message instance.
     *
     * @param array $mailData
     * @return void
     */
    public function __construct(array $mailData)
    {
        $this->datos = [
            'nombre' => $mailData['nombre'],
            'email' => $mailData['email'], 
            'mensaje' => $mailData['mensaje'],
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Nuevo mensaje de contacto') 
            ->view('emails.contactanos')
            ->with('datos', $this->datos);
    }
}