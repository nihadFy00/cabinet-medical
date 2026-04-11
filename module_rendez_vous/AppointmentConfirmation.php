<?php

namespace App\Mail;

use App\Models\Rendezvous;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Rendezvous $rendezvous) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre rendez-vous',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appointment.confirmation',
            with: [
                'rendezvous'  => $this->rendezvous,
                'patientNom'  => $this->rendezvous->patient->nom,
                'medecinNom'  => $this->rendezvous->medecin->nom,
                'dateRdv'     => $this->rendezvous->date_rdv,
                'motif'       => $this->rendezvous->motif,
            ],
        );
    }
}
