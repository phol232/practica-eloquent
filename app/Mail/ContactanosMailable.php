<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable implements ShouldQueue // Implementar ShouldQueue para colas
{
    use Queueable, SerializesModels;

    public array $data; // Para pasar los datos del formulario a la vista del email

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // El PDF usa un remitente fijo. Es mejor usar la config.
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [ // Para que al responder, la respuesta vaya al usuario
                new Address($this->data['correo'], $this->data['nombre'])
            ],
            // El PDF usa 'Contactanos Mailable' como asunto. Hacemos uno más dinámico.
            subject: $this->data['asunto'] ?? 'Nuevo Mensaje desde el Formulario de Contacto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contactanos', // Vista Blade para el email
            // Opcional: text: 'emails.contactanos-text' para versión texto plano
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}