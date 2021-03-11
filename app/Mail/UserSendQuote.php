<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSendQuote extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = 'Mensaje Recibido';
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //return $this->from(env('MAIL_FROM'), env('APP_NAME'))
          //          ->view('emails.user_password_recover')
            //        ->subject('Recuperar su contraseña')
              //      ->with($this->data);
                    return $this->view('emails.userquote')->with($this->data);

    }
}