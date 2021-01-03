<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $input
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Mail
    {
        if ($this->input->mail_type == 'client-registration') {
            return $this->from(env('MAIL_FROM_APP'))
                ->view('client.mail.client-register')
                ->with([
                    'title' => 'registration verification',
                    'name' => $this->input->name,
                    'link' => $this->input->link,
                ]);
        }
        if ($this->input->mail_type == 'client-registration-fail') {
            return $this->from(env('MAIL_FROM_APP'))
                ->view('client.mail.client-register-failed')
                ->with([
                    'title' => 'registration notification',
                    'name' => $this->input->name,
                ]);
        }

        return $this->view('view.name');
    }
}
