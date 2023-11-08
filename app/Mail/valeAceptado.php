<?php

namespace App\Mail;

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\valeCombustible;

class valeAceptado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $valesRegistrados = valeCombustible::all();
        $ultimoRegistro = valeCombustible::select('id')->orderBy('id', 'desc')->first();

        return $this->view('mail.valeAceptado', compact('valesRegistrados', 'ultimoRegistro'));
    }
}
