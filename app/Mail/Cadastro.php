<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Cadastro extends Mailable
{
    use Queueable, SerializesModels;
    public $data; // Defina a propriedade $data

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data; // Atribua os dados à propriedade $data

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cadastro')
            ->with('data', $this->data); // Passe os dados para a visualização do e-mail
    }
}
